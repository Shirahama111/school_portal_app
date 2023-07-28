<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Schedule;
use Carbon\Carbon;

class ScheduleController extends Controller
{
    public function index(Request $request): View
    {


        return view('schedule');
    }

    public function store(Request $request): View
    {

        $request->validate([
            'start_date' =>  'required|date|after_or_equal:today', //start_dateが今日以降の日時かどうかチェック
            'end_date' => 'required|date|after_or_equal:start_date', //end_dateがstart_dateより後の日時かどうかをチェック
        ]);


        $start_date = new Carbon($request->start_date);
        $end_date = new Carbon($request->end_date);


        if($start_date->hour === 0 && $start_date->minute === 0){
            $start_date = $start_date->toDateString();
        }
        
        if($end_date->hour === 0 && $end_date->minute === 0){
            $end_date = $end_date->addDay()->toDateString();
        }



        Schedule::create([
            'user_id' => $request->user()->id,
            'school_id' => $request->user()->school_id,
            'classroom_id' => $request->user()->classroom_id,
            'title' => $request->title,
            'color' => $request->color,
            'description' => $request->description,
            'start_date' => $start_date,
            'end_date' => $end_date,
        ]);

        return view('schedule');
    }

    public function getEvents(Request $request)
    {

        $events = Schedule::where(['school_id' => $request->user()->school_id,'classroom_id' => $request->user()->classroom_id])->get();


        $schedules = array();

        foreach ($events as $event) {

                array_push($schedules,array(
                        'title' => $event->title,
                        'color' => $event->color,
                        'description' => $event->description,
                        'start' => $event->start_date,
                        'end' => $event->end_date,

                        //編集用
                        'access_user_id' => $request->user()->id,
                        'schedule_id' => $event->id,
                        'created_user_id' => $event->user_id,
                ));
            }

  

        return $schedules;

    }

    public function delete(Request $request)
    {

        Schedule::where(['id' => $request->schedule_id])->delete();

        return view('schedule');
    }
}
