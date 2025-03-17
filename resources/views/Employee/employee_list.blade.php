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
        <div><a href="/Employee-Form"><button type="button" class="btn btn-primary">Add Employee</button></a></div>
    </div>
<table class="table table-striped">
    <thead>
        <tr>
        <th>S.No.</th>
        <th>Name</th>
        <th>Email</th>
        <th>Mobile</th>
        <th>Department</th>
        <th>Position</th>
        <th>Actions</th>
        </tr>
    </thead>
    <tbody>
    @foreach ($employee_list as $employee)
    <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $employee->emp_name }}</td>
        <td>{{ $employee->emp_email }}</td>
        <td>{{ $employee->emp_mob_no }}</td>
        <td>{{ $employee->emp_dpt }}</td>
        <td>{{ $employee->emp_position }}</td>
        <td>
        <span><a href="{{ route('Edit-Employee',$employee->id) }}"><i class="bi bi-pencil-fill"></i></a>&nbsp&nbsp&nbsp&nbsp</span><a href="{{ route('Delete-Employee',$employee->id) }}"><i class="bi bi-trash"></i></a>
        </td>
    </tr>
    @endforeach
    </tbody>
</table>
@endsection