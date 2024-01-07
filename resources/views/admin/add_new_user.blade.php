@extends('admin.adminlayout')
@section('content')
    <div class="container-fluid mt-5">
        <div class="card card-primary">
            <div class="card-header">
                New User
            </div>
            <div class="card-body">
                <form action="{{ route('assign_role_to_user') }}" method="post">
                    @csrf
                    <div class="form-group col-12">
                        <label for="name">Name</label>
                        <input id="name" type="text" name="name" class="form-control">
                        <label for="email">Email</label>
                        <input id="email" type="text" name="email" class="form-control">
                        <label for="password">Password</label>
                        <input id="password" type="text" name="password" class="form-control">

                        <label for="password">Role</label>

                        <select name="role" class="form-control">
                            @if (count($roles) > 0)
                                @foreach ($roles as $role)
                                    <option value="{{ $role->name }}">{{ $role->name }}</option>
                                @endforeach
                            @else
                                <option value="-"></option>
                            @endif

                        </select>

                    </div>

            </div>
            <div class="card-footer ">
                <a href="/home" class="btn btn-sm btn-danger">Back</a>
                <button class="btn btn-sm btn-primary">save</button>
                </form>
            </div>
        </div>
    </div>
@endsection
