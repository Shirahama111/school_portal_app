<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\User;
use App\Models\Consultation;
use App\Http\Controllers\ConsultationController;
use Carbon\Carbon;

class ConsultationController extends Controller
{
    public function index(Request $request): View
    {

        // 同校、同クラスの指導員を取得
        $instructors = User::where(['school_id' => $request->user()->school_id,
                                    'classroom_id' => $request->user()->classroom_id,
                                    'position_id' => 2])->get();

        //自分が送った相談を取得
        $fromConsultations = Consultation::where(['from' => $request->user()->id])->get();

        //自分に送られてきた相談を取得
        $toConsultations = Consultation::where(['to' => $request->user()->id])->get();

        return view('consultation')->with(['instructors' => $instructors,
                                            'fromConsultations' => $fromConsultations,
                                            'toConsultations' => $toConsultations]);
    }

    public function store(Request $request): View
    {

        $request->validate([
            'to_user_id' => ['required'],
            'content' => ['required'],
        ]);

        $consultation = Consultation::create([
            'to' => $request->to_user_id,
            'from' => $request->user()->id,
            'content' => $request->content,
            'anonymity' => (bool)$request->anonymity,
            'date' => now(),
        ]);

        // 同校、同クラスの指導員を取得
        $instructors = User::where(['school_id' => $request->user()->school_id,
                                    'classroom_id' => $request->user()->classroom_id,
                                    'position_id' => 2])->get();

                                    
        //自分が送った相談を取得
        $fromConsultations = Consultation::where(['from' => $request->user()->id])->get();

        
        //自分に送られてきた相談を取得
        $toConsultations = Consultation::where(['to' => $request->user()->id])->get();
        
        session()->flash('status', 'consultation.created');

        return view('consultation')->with(['instructors' => $instructors,
                                            'fromConsultations' => $fromConsultations,
                                            'toConsultations' => $toConsultations]);
    }
}
