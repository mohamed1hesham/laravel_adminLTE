<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function attended_at(Request $request)
    {
        $user_id = Auth()->user()->id;
        $delay_time = "0";

        $time = now()->format('Y-m-d H:i:s');
        //dd($time);
        $date = now()->format('Y-m-d');
        if (now()->format('g') > 8) {
            $delay_time = now()->format('g') - 8;
        }

        Attendance::updateOrCreate([
            'user_id' => $user_id,
            'date' => $date
        ], [
            'user_id' => $user_id,
            'attended_at' => $time,
            'date' => $date,
            'delay_time' => $delay_time
        ]);
        return redirect()->back();
    }

    public function left_at(Request $request)
    {
        $user_id = Auth()->user()->id;
        $date_time = Carbon::now();

        $time = $date_time->format('H:i:s');

        $date = $date_time->format('Y-m-d');



        Attendance::updateOrCreate([
            'user_id' => $user_id,
            'date' => $date
        ], [
            'user_id' => $user_id,
            'left_at' => $time,
            'date' => $date
        ]);
        return redirect()->back();
    }

    public function report(Request $request)
    {
        $user_id = Auth()->user()->id;
        $date = explode("-", $request->date);
        //dd($date);
        //$data = auth()->user()->attendances()->where("date", 'LIKE', '2024-01%')->get();
        $data = auth()->user()->attendances()->whereYear("date", $date[0])->whereMonth("date", $date[1])->get();
        //dd($data);
        $users = User::with(["attendances" => function ($q) use ($date, $user_id) {
            //$q->whereYear("date", $date[0])->whereMonth("date", $date[1])
            $q->where("date", 'LIKE', $date)->where("user_id", $user_id);
        }])->get();
        //dd($users);

        return view('user.report', [
            'users' => $users,  'data' => $data,
        ]);
    }
}
