@extends('layouts.app')
@section('main')
    <div class="d-flex justify-content-between">
        <div class="pt-2">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="home.html">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Edit Employee</li>
                </ol>
            </nav>
        </div>
        <div><a href="{{ route('Employee-List') }}"><button type="button" class="btn btn-primary">List Employee</button></a></div>
    </div>
    <div class="card">
        <div class="card-header">
            <h5>Edit Employee</h5>
        </div>
            <form action="{{ route('Edit-Employee',$edit_employee->id) }}" method='POST' enctype="multipart/form-data">
                @csrf
                @method('PUT')
            <div class="card-body">
                <div class="row mb-3">
                    <label for="name" class="form-label col-md-2 mt-1">Name</label>
                    <div class="col-md-4">
                        <input type="text" class="form-control @if($errors->has('emp_name')){{'is-invalid'}} @endif" name="emp_name" id="emp_name" placeholder="Enter your name" value="{{ old('emp_name',$edit_employee->emp_name)}}">
                        @if($errors->has('emp_name'))
                        <div class="invalid-feedback">This Name field is Required</div>
                        @endif
                    </div>
                    <label for="email" class="form-label col-md-2 mt-1">Email</label>
                    <div class="col-md-4">
                        <input type="text" class="form-control @if($errors->has('emp_email')){{'is-invalid'}} @endif" name="emp_email" id="emp_email" placeholder="Enter your email" value="{{ old('emp_email',$edit_employee->emp_email) }}">
                        @error('emp_email')
                        <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="emp_mob_no" class="form-label col-md-2 mt-1">Mobile No.</label>
                    <div class="col-md-4">
                        <input type="text" maxlength='10' class="form-control @if($errors->has('emp_mob_no')){{'is-invalid'}} @endif" id="emp_mob_no" name="emp_mob_no" placeholder="Enter your Mobile No." value="{{ old('emp_mob_no',$edit_employee->emp_mob_no) }}">
                        @error('emp_mob_no')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                    <label for="emp_dob" class="form-label col-md-2 mt-1">Date of Birth</label>
                    <div class="col-md-4">
                        <input type="date" class="form-control @if($errors->has('emp_dob')){{'is-invalid'}} @endif" name="emp_dob" id="emp_dob" placeholder="select Your Date of Birth" value="{{ old('emp_dob',$edit_employee->emp_dob) }}">
                        
                        @error('emp_dob')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="emp_gender" class="form-label col-md-2 mt-1">Gender</label>
                    <div class="col-md-4">
                        <select name="emp_gender" id="emp_gender" class="form-control @if($errors->has('emp_gender')){{'is-invalid'}} @endif">
                            <option value="">Select Gender</option>
                            <option value="1" @selected(old('emp_gender', $edit_employee->emp_gender) == '1')>Male</option>
                            <option value="2" @selected(old('emp_gender', $edit_employee->emp_gender) == '2')>Female</option>
                            <option value="3" @selected(old('emp_gender', $edit_employee->emp_gender) == '3')>Other</option>
                        </select>
                        @if($errors->has('emp_gender'))
                        <div class="invalid-feedback">Please Select Gender</div>
                        @endif
                    </div>
                    <label for="emp_dpt" class="form-label col-md-2 mt-1">Department</label>
                    <div class="col-md-4">
                        <input type="text" class="form-control @if($errors->has('emp_dpt')){{'is-invalid'}} @endif" name="emp_dpt" id="emp_dpt" placeholder="Enter Your Department" value="{{ old('emp_dpt',$edit_employee->emp_dpt) }}">
                        @if($errors->has('emp_dpt'))
                        <div class="invalid-feedback">This Department field is Required</div>
                        @endif                 
                    </div>
                    
                </div>
                <div class="row mb-3">
                    <label for="emp_position" class="form-label col-md-2 mt-1">Position</label>
                    <div class="col-md-4">
                        <input type="text" class="form-control @if($errors->has('emp_position')){{'is-invalid'}} @endif" name="emp_position" id="emp_position" placeholder="Enter Your Position" value="{{ old('emp_position',$edit_employee->emp_position) }}" >
                        @if($errors->has('emp_position'))
                        <div class="invalid-feedback">This Position field is Required</div>
                        @endif
                    </div>
                    <label for="emp_photo" class="form-label col-md-2 mt-1">Photo</label>
                    <div class="col-md-4">
                        <input type="file" class="form-control @if($errors->has('emp_photo')){{'is-invalid'}} @endif" src="{{ old('emp_photo', asset('default.png')) }}" name="emp_photo" id="emp_photo" value="{{ old('emp_photo',$edit_employee->emp_photo) }}">
                        @if($errors->has('emp_photo'))
                            <div class="invalid-feedback">Please Upload your Photo</div>
                        @endif
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="emp_salary" class="form-label col-md-2 mt-1">Salary</label>
                    <div class="col-md-4">
                        <input type="text" maxlength='10' class="form-control number_only @if($errors->has('emp_salary')){{'is-invalid'}} @endif" name="emp_salary" id="emp_salary" placeholder="Enter Your Position" value="{{ old('emp_salary',$edit_employee->emp_salary)}}" >
                        @if($errors->has('emp_salary'))
                        <div class="invalid-feedback">This Salary field is Required</div>
                        @endif
                    </div>
                </div>
                </div>
                <div class="card-footer text-center">
                    <button type="submit" class="btn btn-primary">Update</button>
                    <button type="button" class="btn btn-secondary">Cancel</button>
                </div>
            </form>
    </div>
    <script>
        $(document).ready(function () {	
            $('.number_only').on('input', function () {
                $(this).val($(this).val().replace(/[^0-9]/g, ''));
            });
        });
    </script>
@endsection