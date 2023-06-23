@extends('pages.layouts.app')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1></h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- general form elements -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Create User</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action= "{{ route('store') }}" method="post">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="user_name">Full Name</label>
                            <input type="text" class="form-control" name="name" id="user_name" placeholder="Enter Name">
                        </div>
                        <div class="form-group">
                            <label for="user_email">Email address</label>
                            <input type="email" class="form-control" name="email" id="user_email" placeholder="Enter email">
                        </div>
                        <div class="form-group">
                            <label for="user_mobile_no">Mobile No.</label>
                            <input type="tel" class="form-control" name="mobile_no" id="user_mobile_no" placeholder="Enter Mobile No.">
                        </div>
                        <div class="form-group">
                            <label for="user_password">Password</label>
                            <input type="password" class="form-control" name="password" id="user_password" placeholder="Password">
                        </div>
                        <div class="form-group">
                            <label for="user_location">Location</label>
                            <input type="text" class="form-control" name="location" id="user_location" placeholder="Enter location">
                        </div>
                        <div class="form-group">
                            <label for="user_vat_no">VAT No.</label>
                            <input type="text" class="form-control" name="vat_no" id="user_vat_no" placeholder="Enter VAT No.">
                        </div>

                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
            <!-- /.card -->
        </div>
    </section>
</div>
@endsection

@section('create_user-scripts')
<!-- jQuery -->
<script src="{{ asset('../../plugins/jquery/jquery.min.jsx') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('../../plugins/bootstrap/js/bootstrap.bundle.min.jsx') }}"></script>
<!-- bs-custom-file-input -->
<script src="{{ asset('../../plugins/bs-custom-file-input/bs-custom-file-input.min.jsx') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('../../dist/js/adminlte.min.jsx') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('../../dist/js/demo.jsx') }}"></script>
<!-- Page specific script -->
@stop