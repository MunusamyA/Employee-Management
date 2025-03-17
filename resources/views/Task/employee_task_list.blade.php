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
        <th >Actions</th>
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
        <td>{{ $employee->emp_position }}</td>
        <td class="text-center">
        <span><a href="{{ route('Assign-Task-Employee', $employee->id) }}"><i class="bi bi-list-task"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;</span><span><a href="{{ route('Employee-Task-Manage', $employee->id) }}"><i class="bi bi-arrow-right-circle"></i></a></span>
        </td>
    </tr>
    @endforeach
    </tbody>
</table>
@endsection