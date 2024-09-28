@extends('admin.layout.layout')
@section('contant')
    <div class="content-wrapper">
        <section class="content">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Add Student</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{ route('student.update', $students->id) }}" method="post">
                            @csrf
                            <div class="card-body">
                                <input type="hidden" name="id" id="id" value="{{ $students->id }}"
                                    id="id" />
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Name</label>
                                    <input type="text" name="name_en" class="form-control" id="exampleInputPassword1"
                                        placeholder="Enter Name" value="{{ $students->name_en }}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Address</label>
                                    <input type="text" name="address_en" class="form-control" id="exampleInputPassword1"
                                        placeholder="ُEnter Address" value="{{ $students->address_en }}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mobile</label>
                                    <input type="text" name="mobile" class="form-control" id="exampleInputPassword1"
                                        placeholder="Enter Mobile" value="{{ $students->mobile }}">
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



@stop
