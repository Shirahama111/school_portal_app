<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\Course;
use App\Models\Consultation;
use App\Models\School;
use App\Models\Classroom;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
            'schools' => School::all(),
            'classrooms' => Classroom::all(),
        ]);
    }

    public function editStudent(Request $request)//: View
    {

        $request->validate([
           'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string'],
        ]);

        $email = $request->email;

        // dd($password);
        $user = User::where(['email' => $email, 'position_id' => 2])->first();

        if($user == null)
        {
            return Redirect::to('/profile')->with('status', 'auth.false');
        }
        else if(!Hash::check($request->password, $user->password))
        {
            return Redirect::to('/profile')->with('status', 'auth.false');
        }

        $request->session()->put('auth.instructor', true);

        return view('profile.edit', [
        'user' => $request->user(),
        'schools' => School::all(),
        'classrooms' => Classroom::all(),
        'students' => User::where(['school_id' => $request->user()->school_id])->get()]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        // dd($request->school_id);
        //dd($request->old_school_id);

        // ユーザの所属学校が変更されたら相談と進路報告を削除
        if($request->school_id != $request->old_school_id){
            Consultation::where(['to' => $request->user()->id])->delete();
            Consultation::where(['from' => $request->user()->id])->delete();
            Course::where(['to' => $request->user()->id])->delete();
            Course::where(['from' => $request->user()->id])->delete();
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        
        Consultation::where(['to' => $request->user()->id])->delete();
        Course::where(['to' => $request->user()->id])->delete();
        
        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
