<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\EmergencyContact;

class EmergencyContactController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();

        //緊急連絡テーブルのuser_idとユーザーテーブルのidはリレーションしている
        //そのリレーション先のカラムで絞り込みをかけるときは以下のやり方
        $emergency_contacts = EmergencyContact::whereHas('user', function ($query) use ($user){
            $query->where(['school_id' => $user->school_id,'classroom_id' => $user->classroom_id]);
        })->orderBy('created_at', 'desc')->get();

        // dd($emergency_contacts);

        return view('emergency-contact')->with('emergency_contacts',$emergency_contacts);
    }

    public function store(Request $request)
    {
        $content = $request->content;
        $user_id = $request->user()->id;

        EmergencyContact::create([
            'user_id' => $user_id,
            'content' => $content,
        ]);

        return $this->index($request)->with('messege','送信しました');
    }

    public function delete(Request $request)
    {
        $emergency_contact_id = $request->emergency_contact_id;

        EmergencyContact::where('id',$emergency_contact_id)->delete();

        return $this->index($request)->with('messege','削除しました');
    }
}
