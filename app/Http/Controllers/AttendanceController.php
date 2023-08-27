<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Attendance;
use App\Models\User;
use Carbon\Carbon;



class AttendanceController extends Controller
{
    public function index(Request $request)
    {
        $instructors = User::where(['position_id' => 2,
        'school_id' => $request->user()->school_id,'classroom_id' => $request->user()->classroom_id])->get();

        return view('attendance')->with(['instructors' => $instructors]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'to_user_id' => ['required'],
        ]);

        // dd($request);

        $today = Carbon::today();
        $attendance = Attendance::whereDate('created_at',$today)->where('user_id',$request->user()->id)->first();

        $message = null;

        if($attendance == null)
        {
            Attendance::create([
                 'user_id' => $request->user()->id,
                'to_user_id' => $request->to_user_id,
                'condition' => $request->condition,
                'temperature' => $request->temperature,
                'remark' => $request->remark,
            ]);

            $message = '出席しました';
        }
        else{
            $message = '既に出席しています';
        }


        $instructors = User::where(['position_id' => 2,
        'school_id' => $request->user()->school_id,'classroom_id' => $request->user()->classroom_id])->get();

        return view('attendance')->with(['instructors' => $instructors,'created_massege' => $message]);
    }

    public function search(Request $request)
    {

        //指導員用
        //指定した年月日の自分宛の出席を取得
        $year = $request->year;
        $month = $request->month;

        if($request->date == 0){
            $attendances = Attendance::whereYear('created_at',$year)->whereMonth('created_at',$month)->where('to_user_id' , $request->user()->id)
                                ->orderBy('created_at', 'asc')->get();

            $search_date = $year.'年'.$month.'月';

            return view('attendance')->with(['attendances' => $attendances,'search_date' => $search_date]);
        }
        else {
            $date = new Carbon($year.'-'.$month.'-'.$request->date);

            $attendances = Attendance::whereDate('created_at',$date)->where('to_user_id' , $request->user()->id)
                                ->orderBy('created_at', 'asc')->get();

            //日付指定で検索した時だけ欠席者リストを作る

            //出席者のuser_idを取り出して配列を作る
            $attendance_users = array();
            foreach ($attendances as $attendance) {
                array_push($attendance_users,$attendance->user_id);
            }
            
            //自分のクラスに所属する生徒のuser_idをすべて取り出して配列を作る
            $users = User::where(['position_id' => 1,
            'school_id' => $request->user()->school_id,'classroom_id' => $request->user()->classroom_id])->get();

            $absence_users = array();
            foreach ($users as $user) {
                array_push($absence_users,$user->id);
            }

            //配列の差分(欠席者)を求める
            $absence_users = array_diff($absence_users,$attendance_users);

            //欠席者のユーザー情報を取得
            $absence_users = User::whereIn('id',$absence_users)->get();
            
            // dd($absence_users);

            $search_date = $year.'年'.$month.'月'.$request->date.'日';

            return view('attendance')->with(['attendances' => $attendances,'absence_users' => $absence_users,'search_date' => $search_date]);
        }

    }
}
