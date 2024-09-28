@extends('admin.layout.layout')
@section('contant')
    <div class="wrapper">
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Profile</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Home</a></li>
                                <li class="breadcrumb-item active">User Profile</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>
            <section class="content ">
                <div class="container-fluid">

                    <div class="card card-primary card-outline ">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <img class="profile-user-img img-fluid img-circle"
                                    src="{{ asset('admin/img/user4-128x128.jpg') }}" alt="User profile picture">
                            </div>

                            <h3 class="profile-username text-center">{{ $teachers->name_en }}</h3>

                            <p class="text-muted text-center">Teacher</p>

                            <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item">
                                    <b>Address</b> <a class="float-right">{{ $teachers->address_en }}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Mobile</b> <a class="float-right">{{ $teachers->mobile }}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Courses</b>
                                    @foreach ($teachers->courses as $course)
                                        <a class="float-right" href="{{ route('teacher-course.show', $course->name) }}">
                                            {{ $course->name }}
                                        </a>
                                        <br>
                                    @endforeach

                            </ul>

                            <a href="{{ url('teacher') }}" class="btn btn-primary btn-block"><b>Home</b></a>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>

            </section>
        @endsection
