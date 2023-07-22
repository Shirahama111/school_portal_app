<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Position;
use App\Models\Classroom;
use App\Models\School;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        $positions = Position::all();
        $classrooms = Classroom::all();
        $schools = School::all();

        return view('auth.register')
                ->with([
                    'positions' => $positions,
                    'classrooms' => $classrooms,
                    'schools' => $schools,
                ]);
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'position_id' => ['required'],
            'classroom_id' => ['required'],
            'school_id' => ['required'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'position_id' => $request->position_id,
            'classroom_id' => $request->classroom_id,
            'school_id' => $request->school_id,
        ]);

        event(new Registered($user));


        // Auth::login($user);

        return redirect(RouteServiceProvider::HOME)->with(['register_user' => $user,'password' => $request->password_confirmation]);
    }

    
}
