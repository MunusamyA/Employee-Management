@extends('layouts.app')
@section('main')
<div class="d-flex justify-content-between">
    <div class="pt-2">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="home.html">Home</a></li>   
                <li class="breadcrumb-item active" aria-current="page">Emloyee List</li>
            </ol>
        </nav>
    </div>
</div>
<div class="card">
    <div class="card-header">
        <h5>Edit Employee Task</h5>
    </div>
    <form action="{{ route('Employee-Salary-Insert') }}" method='POST' enctype="multipart/form-data">
        @csrf
        <div class="card-body">
            <div class="row mb-3">
                <label for="emp_name" class="form-label col-md-2 mt-1">Name</label>
                <div class="col-md-4">
                    <input type="text" class="form-control" name="emp_name" id="emp_name" placeholder="" readonly
                    value="{{ $employee->emp_name }}">
                </div>
                <label for="emp_email" class="form-label col-md-2 mt-1">Email</label>
                <div class="col-md-4">
                    <input type="text" class="form-control " name="emp_email" readonly id="emp_email" placeholder=""
                        value="{{ $employee->emp_email }}">
                </div>
            </div>
            <div class="row mb-3">
                <label for="emp_dpt" class="form-label col-md-2 mt-1">Department</label>
                <div class="col-md-4">
                    <input type="text" class="form-control " name="emp_dpt" readonly id="emp_dpt" placeholder=""
                        value="{{ $employee->emp_dpt }}">
                </div>
                <label for="emp_position" class="form-label col-md-2 mt-1">Position</label>
                <div class="col-md-4">
                    <input type="text" class="form-control" id="emp_position" readonly name="emp_position"
                        placeholder="" value="{{ $employee->emp_position }}">
                </div>
            </div>
            <div class="row mb-3">
                <label for="emp_mob_no" class="form-label col-md-2 mt-1">Mobile No.</label>
                <div class="col-md-4">
                    <input type="text" class="form-control" readonly name="emp_mob_no" id="emp_mob_no"
                        placeholder="" value="{{ $employee->emp_mob_no }}">
                </div>
                <label for="emp_salary" class="form-label col-md-2 mt-1">salary</label>
                <div class="col-md-4">
                    <input type="text" class="form-control" readonly name="emp_salary" id="emp_salary"
                        placeholder="" value="{{ $employee->emp_salary }}">
                </div>
            </div>
            <div style="border-top: 1px solid #ddd;padding-top: 10px;">
                <h5 class="mb-3">Selary Details</h5>
                <div class="row mb-3">
                    <label for="work_days" class="form-label col-md-2 mt-1">Working Days</label>
                    <div class="col-md-4">
                        <input type="text" class="form-control" name="work_days" id="work_days" placeholder="" readonly value="{{$workingDays }}">
                    </div>
                    <label for="presant_days" class="form-label col-md-2 mt-1">Presant Days</label>
                    <div class="col-md-4">
                        <input type="text" class="form-control " name="presant_days" readonly id="presant_days" placeholder=""
                            value="{{ $presant_days }}">
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="tot_wor_hrs" class="form-label col-md-2 mt-1">Total Working Hours</label>
                    <div class="col-md-4">
                        <input type="text" class="form-control" name="tot_wor_hrs" id="tot_wor_hrs" placeholder="" readonly value="{{$Totalhrs }}">
                    </div>
                    <label for="emp_wor_hrs" class="form-label col-md-2 mt-1">Working Hours</label>
                    <div class="col-md-4">
                        <input type="text" class="form-control " name="emp_wor_hrs" readonly id="emp_wor_hrs" placeholder=""
                            value="{{ $totalworkHours }}">
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="tot_Salary" class="form-label col-md-2 mt-1">Last Month Salary</label>
                    <div class="col-md-4">
                        <input type="text" class="form-control" name="tot_Salary" id="tot_Salary" placeholder="" readonly value="{{$totalSalary }}">
                    </div>
                    <input type="hidden" class="form-control" name="emp_id" id="emp_id" placeholder="" value="{{ $employee->id }}">
                    
                </div>

            </div>
        </div>
        <div class="card-footer text-center">
            <button type="submit" class="btn btn-primary">Update</button>
            <button type="" class="btn btn-secondary">cancel</button>
        </div>
    </form>
</div>
@endsection