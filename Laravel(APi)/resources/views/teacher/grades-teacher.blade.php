@extends('admin.layout.layout')
@section('contant')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>DataTables</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">DataTables</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                @if (session('message'))
                                    <h3 class="card-title bg-success">{{ session('message') }}</h3>
                                @endif
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Course</th>
                                            <th>AVG Grade</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($teachers as $teacher)
                                            @foreach ($teacher->courses as $course)
                                                @php
                                                    // Calculate the average grade for the course
                                                    $averageGrade = $course->grades->avg('grade');
                                                @endphp
                                                <tr>
                                                    <td>{{ $teacher->name_en }}</td>
                                                    <td>{{ $course->name }}</td>
                                                    <td>{{ number_format($averageGrade, 2) }}</td>
                                                </tr>
                                            @endforeach
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    @endsection
