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
        $date_time = Carbon::now();
        $delay_time = "0";

        $time = $date_time->format('h:i:s A');

        $date = $date_time->format('Y-m-d');
        if ($date_time->format('g') > 8) {
            $delay_time = $date_time->format('g') - 8;
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


        $time = $date_time->format('h:i:s A');

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
}
