@extends('admin.adminlayout')
@section('content')
    <div class="container-fluid mt-5">

        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title"> New Permission</h3>
            </div>

            <div class="card-body">
                <form action="{{ route('store_permission') }}" method="post" class="row">
                    @csrf
                    <div class="form-group col-12">
                        <label for="name">Permission Name</label>
                        <input id="name" type="text" name="permission_name" class="form-control">

                    </div>



            </div>
            <div class="card-footer">
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
