@extends('admin.layout.layout')
@section('contant')
    <div class="content-wrapper">
        <section class="content">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Add Grade</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{ route('teacher.grades_save') }}" method="post">
                            @csrf

                            <div class="card-body">
                                <input type="hidden" name="course_id" id="id" value="{{ $course_id }}"
                                    id="id" />
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Student</label>
                                    <select id="demo-multiple-group-select" class="form-control" name='student'>
                                        @foreach ($students as $item)
                                            <option value="{{ $item->id }}">{{ $item->name_en }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Grade</label>
                                    <input type="number" name="grade" class="form-control" id="exampleInputPassword1"
                                        placeholder="Enter Grade">
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
