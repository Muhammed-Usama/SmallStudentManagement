@extends('admin.layout.layout')
@section('contant')
    <div class="content-wrapper">
        <section class="content">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Update</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{ route('teacher.update', $teachers->id) }}" method="post">
                            @csrf
                            <div class="card-body">
                                <input type="hidden" name="id" id="id" value="{{ $teachers->id }}"
                                    id="id" />
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Name</label>
                                    <input type="text" name="name_en" class="form-control" id="exampleInputPassword1"
                                        placeholder="Enter Name" value="{{ $teachers->name_en }}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Address</label>
                                    <input type="text" name="address_en" class="form-control" id="exampleInputPassword1"
                                        placeholder="ُEnter Address" value="{{ $teachers->address_en }}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mobile</label>
                                    <input type="text" name="mobile" class="form-control" id="exampleInputPassword1"
                                        placeholder="Enter Mobile" value="{{ $teachers->mobile }}">
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
