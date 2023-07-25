<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\User;
use App\Models\Course;
use Carbon\Carbon;

class CourseController extends Controller
{
    public function index(Request $request): View
    {

        // 同校、同クラスの指導員を取得
        $instructors = User::where(['school_id' => $request->user()->school_id,
                                    'classroom_id' => $request->user()->classroom_id,
                                    'position_id' => 2])->get();

        //自分が送った進路を取得
        $fromCourse = Course::where(['from' => $request->user()->id])->first();

        //自分に送られてきた進路を取得
        $toCourses = Course::where(['to' => $request->user()->id])->get();

        return view('course')->with(['instructors' => $instructors,
                                    'fromCourse' => $fromCourse,
                                    'toCourses' => $toCourses]);
    }

    public function store(Request $request): View
    {

        $request->validate([
            'to_user_id' => ['required'],
            'from' => ['required', 'unique:'.Course::class],
        ]);

        

        $course = Course::create([
            'to' => $request->to_user_id,
            'from' => $request->user()->id,
            'company_name' => $request->company_name,
            'address' => $request->address,
            'content' => $request->content,
            'remarks' => $request->remarks,
            'date' => now(),
        ]);

        // // 同校、同クラスの指導員を取得
        // $instructors = User::where(['school_id' => $request->user()->school_id,
        //                             'classroom_id' => $request->user()->classroom_id,
        //                             'position_id' => 2])->get();

                                    
        // //自分が送った相談を取得
        // $fromConsultations = Consultation::where(['from' => $request->user()->id])->get();

        
        // //自分に送られてきた相談を取得
        // $toConsultations = Consultation::where(['to' => $request->user()->id])->get();
        
        // session()->flash('status', 'consultation.created');

        // return view('consultation')->with(['instructors' => $instructors,
        //                                     'fromConsultations' => $fromConsultations,
        //                                     'toConsultations' => $toConsultations]);

        //自分が送った進路を取得
        $fromCourse = Course::where(['from' => $request->user()->id])->first();

        //自分に送られてきた進路を取得
        $toCourses = Course::where(['to' => $request->user()->id])->get();

        
        // 同校、同クラスの指導員を取得
        $instructors = User::where(['school_id' => $request->user()->school_id,
                                    'classroom_id' => $request->user()->classroom_id,
                                    'position_id' => 2])->get();
        
        session()->flash('status', 'course.created');

        return view('course')->with(['instructors' => $instructors,
                                    'fromCourse' => $fromCourse,
                                    'toCourses' => $toCourses]);
    }
}
