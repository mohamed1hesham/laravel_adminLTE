@extends('admin.adminlayout')
@section('content')
    <h1>Home Page</h1>
    @if (auth()->user())
        @if (auth()->user()->can('edit all'))
            <h2> Welcome, {{ auth()->user()->name }} </h2>
            <h3 style="color: black">You can Edit all</h3>
            <div class="form">
                <div class="inputBox">

                    <a href="{{ route('logout') }}"><input type="submit" value="Logout"></a>

                </div>
            </div>
        @elseif (auth()->user()->can('edit salary'))
            <h2> Welcome, {{ auth()->user()->name }} </h2>
            <h3 style="color: black">You can edit salary</h3>

            <div class="form">
                <div class="inputBox">

                    <a href="{{ route('logout') }}"><input type="submit" value="Logout"></a>

                </div>
            </div>
        @endif
    @endif
@stop
