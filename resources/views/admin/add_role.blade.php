@extends('admin.adminlayout')
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
@section('content')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <div class="container-fluid mt-5 ">
        <div class="card card-primary">
            <div class="card-header ">
                New Role
            </div>
            <div class="card-body ">
                <form action="{{ route('add_role') }}" method="post">
                    @csrf
                    <div class="form-group col-12">
                        <label for="name">Role Name</label>
                        <input id="name" type="text" name="role_name" class="form-control">




                    </div>
                    <div class="form-group col-12">
                        @if (count($permissions) > 0)
                            <ul style="list-style: none; padding: 0"">
                                @foreach ($permissions as $permission)
                                    <li style="display: inline; margin-right: 10px;">


                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" name="permissions[]"
                                                value="{{ $permission->id }}" id="{{ $permission->id }}">
                                            <label class="form-check-label" for="{{ $permission->id }}">
                                                {{ $permission->name }}
                                            </label>
                                        </div>

                                    </li>
                                @endforeach
                            </ul>
                        @else
                            <p>There are no Permissions to Display</p>
                        @endif
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
@push('js')
    <script>
        $(document).ready(function() {
            $("#name").keyup(function() {
                str = $(this).val().replace(/\s+/g, '-').toLowerCase();
                console.log(str);
                $(this).val(str);
            });
        });
    </script>
@endpush
