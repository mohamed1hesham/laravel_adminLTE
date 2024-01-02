@extends('admin.adminlayout')
@section('content')
    <form action="{{ route('store_permission') }}" method="post">
        @csrf
        Permission Name
        <input type="text" name="permission_name">

        <input type="submit">
    </form>
@stop
