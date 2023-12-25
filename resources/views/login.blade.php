@extends('layout')
@section('content')

    @if (auth()->user())
        @if (auth()->user()->can('edit all'))
            <h2> Welcome, {{ auth()->user()->name }} </h2>

            <h3 style="color: white">You can Edit all</h3>
            <div class="form">
                <div class="inputBox">

                    <a href="{{ route('logout') }}"><input type="submit" value="Logout"></a>

                </div>
            </div>
        @elseif (auth()->user()->can('edit salary'))
            <h2> Welcome, {{ auth()->user()->name }} </h2>
            <h3 style="color: white">You can edit salary</h3>

            <div class="form">
                <div class="inputBox">

                    <a href="{{ route('logout') }}"><input type="submit" value="Logout"></a>

                </div>
            </div>
        @else
            <h1 style="color: white">Welcome, {{ auth()->user()->name }}</h1>
            <div class="form">
                <div class="inputBox">

                    <a href="{{ route('logout') }}"><input type="submit" value="Logout"></a>

                </div>
            </div>
        @endif
    @else
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
    @endif



@stop
