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
        <div></div>
    </div>
<table class="table table-striped">
    <thead>
        <tr class="text-center">
        <th>S.No.</th>
        <th>Name</th>
        <th>Email</th>
        <th>Mobile</th>
        <th>Department</th>
        <th>Position</th>
        <th>Status</th>
        <th>Actions</th>
        </tr>
    </thead>
    <tbody>
    @foreach ($employee_list as $employee)
    <tr class="text-center">
        <td>{{ $loop->iteration }}</td>
        <td>{{ $employee->emp_name }}</td>
        <td>{{ $employee->emp_email }}</td>
        <td>{{ $employee->emp_mob_no }}</td>
        <td>{{ $employee->emp_dpt }}</td>
        <td>
            
            @php
                $salary = $salaryDistribute[$employee->id] ?? null; // Get salary record for this employee
            @endphp
            
            @if($salary)
                @if($salary->status == 1)
                    <span class="badge bg-success">Generated</span>
                @endif
            @else   
                <span class="badge bg-secondary">Not Generated</span>
            @endif
            
        </td>

        <td>{{ $employee->emp_position }}</td>
        <td class="text-center">
            @php
                $salary = $salaryDistribute[$employee->id] ?? null; // Get salary record for this employee
            @endphp
            
            @if($salary)
                @if($salary->status == 1)
                <span><a href=""><i class="bi bi-printer"></i></a></span>
                @endif
            @else   
                <span><a href="{{ route('Employee-Salary-genarate',['emp_id'=> $employee->id] ) }}"><i class="bi bi-list-task"></i></a></span>
            @endif
            
        </td>
    </tr>
    @endforeach
    </tbody>
</table>
@endsection