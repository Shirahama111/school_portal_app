<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class ScheduleController extends Controller
{
    public function index(Request $request): View
    {
        $event = [
            [
                'title' => '美容院',
                'description' => '人気の美容室予約取れた',
                'start' => '2021-09-10',
                'end'   => '2021-09-10',
            ],
            [
                'title' => 'シルバーウィーク旅行',
                'description' => '人気の旅館の予約が取れた',
                'start' => '2023-09-20 10:00:00',
                'end'   => '2023-09-22 18:00:00',
                'url'   => 'https://admin.juno-blog.site',
            ],
            [
                'title' => '給料日',
                'start' => '2021-09-30',
                'color' => '#ff44cc',
            ]
        ];

        return view('schedule')->with('event',json_encode($event, JSON_UNESCAPED_UNICODE));
    }

    public function getEvents(Request $request)
    {

        $user = [
            [
                'title' => $request->user()->name,
                'description' => '人気の美容室予約取れた',
                'start' => '2023-07-10',
                'end'   => '2023-07-10',
            ],
            [
                'title' => 'シルバーウィーク旅行',
                'description' => '人気の旅館の予約が取れた',
                'start' => '2023-07-20 10:30',
                'end'   => '2023-07-22 18:00:00',
                'url'   => '',
            ],
            [
                'title' => '給料日',
                'start' => '2023-07-10',
                'color' => '#ff44cc',
            ],
        ];

        return $user;
    }
}
