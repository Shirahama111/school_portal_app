<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\ClassSchedule;
use Carbon\Carbon;

class ScheduleController extends Controller
{
    public function index(Request $request): View
    {


        return view('schedule');
    }

    public function store(Request $request): View
    {

        // $request->user()->id;
        // $request->user()->school_id;
        // $request->user()->classroom_id;
        // $request->title;
        // $request->description;

        $start_date = new Carbon($request->start_date.$request->start_hour.':'.$request->start_minute);
        $end_date = new Carbon($request->end_date.$request->end_hour.':'.$request->end_minute);


        // dd([$start_date,$end_date]);

        ClassSchedule::create([
            'user_id' => $request->user()->id,
            'school_id' => $request->user()->school_id,
            'classroom_id' => $request->user()->classroom_id,
            'title' => $request->title,
            'description' => $request->description,
            'start_date' => $start_date,
            'end_date' => $end_date,
        ]);

        return view('schedule');
    }

    public function getEvents(Request $request)
    {

        $events = ClassSchedule::where(['school_id' => $request->user()->school_id,'classroom_id' => $request->user()->classroom_id])->get();



        $schedules = [
            [
                'title' => $request->user()->name,
                'description' => '人気の美容室予約取れた',
                'start' => '2023-07-10',
                'end'   => '2023-07-10',

                'create_user_id' => 2,
            ],
            [
                'title' => '旅行',
                'description' => '人気の旅館の予約が取れた',
                'start' => '2023-07-20 10:00',
                'end'   => '2023-07-25 18:00',
                'url'   => '',

                'create_user_id' => 2,
            ],
            [
                'title' => '給料日',
                'description' => '給料日だ',
                'start' => '2023-07-10',
                'color' => '#ff44cc',

                'create_user_id' => 2,
            ],
            // [
            //     'title' => $event->title,
            //     'description' => $event->description,
            //     'start' => $event->date." ".$event->start,
            //     'end'   => '2023-07-30'." ".'18:00',
            // ],
        ];

        foreach ($events as $event) {
                array_push($schedules,array(
                        'title' => $event->title,
                        'description' => $event->description,
                        'start' => $event->start_date,
                        'end' => $event->end_date,
                        'allDay' => true,

                        //編集用
                        'schedule_id' => $event->id,
                        'create_user_id' => $event->user_id,
                        'start_date' => $event->start_date,
                        'end_date' => $event->end_date,
                ));
            }

  

        return $schedules;

        // $event = ClassSchedule::where(['school_id' => $request->user()->school_id,'classroom_id' => $request->user()->classroom_id])->get();

        // return response()->json($event);
    }
}
