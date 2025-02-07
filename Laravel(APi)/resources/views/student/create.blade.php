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
                        <form action="{{ url('student/add') }}" method="post">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email address</label>
                                    <input type="email" name="email" class="form-control" id="exampleInputEmail1"
                                        placeholder="Enter email">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Name</label>
                                    <input type="text" name="name_en" class="form-control" id="exampleInputPassword1"
                                        placeholder="Enter Name">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">الأسم</label>
                                    <input type="text" name="name_ar" class="form-control" id="exampleInputPassword1"
                                        placeholder="ادخل الاسم">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">العنوان</label>
                                    <input type="text" name="address_ar"class="form-control" id="exampleInputPassword1"
                                        placeholder="ادخل العنوان">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Address</label>
                                    <input type="text" name="address_en" class="form-control" id="exampleInputPassword1"
                                        placeholder="ُEnter Address">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mobile</label>
                                    <input type="text" name="mobile" class="form-control" id="exampleInputPassword1"
                                        placeholder="Enter Mobile">
                                </div>
                                <div class="form-group">
                                    <label>Select Course</label>
                                    <label>
                                        Multi-select
                                        <input mbsc-input id="demo-multiple-group-select-input"
                                            placeholder="Please select..." data-dropdown="true" data-input-style="outline"
                                            data-label-style="stacked" data-tags="true" />
                                    </label>
                                    <select id="demo-multiple-group-select" class="form-control" name='courses[]' multiple>
                                        @foreach ($courses as $row)
                                            <option>{{ $row['name'] }}</option>
                                        @endforeach
                                    </select>
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
    <script>
        mobiscroll.setOptions({
            locale: mobiscroll
                .localeAr, // Specify language like: locale: mobiscroll.localePl or omit setting to use default
            theme: 'ios', // Specify theme like: theme: 'ios' or omit setting to use default
            themeVariant: 'light' // More info about themeVariant: https://mobiscroll.com/docs/javascript/select/api#opt-themeVariant
        });

        mobiscroll.select('#demo-single-group-select', {
            inputElement: document.getElementById(
                'demo-single-group-select-input'
            ), // More info about inputElement: https://mobiscroll.com/docs/javascript/select/api#opt-inputElement
        });

        mobiscroll.select('#demo-single-group-select-wheel', {
            showGroupWheels: true,
            inputElement: document.getElementById(
                'demo-single-group-select-wheel-input'
            ), // More info about inputElement: https://mobiscroll.com/docs/javascript/select/api#opt-inputElement
        });

        mobiscroll.select('#demo-multiple-group-select', {
            inputElement: document.getElementById(
                'demo-multiple-group-select-input'
            ), // More info about inputElement: https://mobiscroll.com/docs/javascript/select/api#opt-inputElement
            selectMultiple: true, // More info about selectMultiple: https://mobiscroll.com/docs/javascript/select/api#opt-selectMultiple
        });
    </script>
@endsection
