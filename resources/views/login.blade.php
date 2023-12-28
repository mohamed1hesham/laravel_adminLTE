@extends('layout')
@section('content')

    <h2>Sign In</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('checkData') }}" method="POST" class="form">
        @csrf
        <div class="inputBox">

            <input type="text" name="email" required> <i>Email</i>

        </div>

        <div class="inputBox">

            <input type="password" name="password" required> <i>Password</i>

        </div>

        <div class="links"> <a href="{{ route('signup_page') }}">Signup</a>

        </div>

        <div class="inputBox">

            <input type="submit" value="Login">

        </div>

    </form>




@stop
