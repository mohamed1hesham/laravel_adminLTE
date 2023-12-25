@extends('layout')
@section('content')
    <h2>Sign Up</h2>



    <form class="form" action="{{ route('signup') }}" method="POST">

        @csrf
        <div class="inputBox">

            <input type="text" name="name" required> <i>Name</i>

        </div>

        <div class="inputBox">

            <input type="text" name="email" required> <i>Email</i>
        </div>
        <div class="inputBox">
            <input type="password" name="password" required> <i>Password</i>
        </div>

        <div class="links"> <a href="{{ route('homepage') }}">Sign In</a>
        </div>

        <div class="inputBox">
            <input type="submit" value="Signup">
        </div>

    </form>



@stop
