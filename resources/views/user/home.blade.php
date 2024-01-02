@extends('layout')
@section('content')

    <h2>Attendance</h2>

    <form action="{{ route('attend') }}" method="POST" class="form">
        @csrf

        <div class="inputBox">

            <input type="submit" value="Attend">

        </div>

    </form>
    <form action="{{ route('left') }}" method="POST" class="form">
        @csrf

        <div class="inputBox">

            <input type="submit" value="Leave">

        </div>

    </form>

    <form action="{{ route('report') }}" method="post" class="form">
        @csrf
        Date
        <div class="inputBox">

            <input type="month" id="date" name="date">
            <br><br>
            <button class="btn btn-secondary">Report</button>

        </div>
    </form>
    <div class="form">
        <div class="inputBox">

            <a href="{{ route('logout') }}"><input type="submit" value="Logout"></a>

        </div>
    </div>
@stop
