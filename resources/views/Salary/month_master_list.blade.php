@extends('layouts.app')
@section('main')
<div class="d-flex justify-content-between">
        <div class="pt-2">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="home.html">Home</a></li>   
                    <li class="breadcrumb-item active" aria-current="page">Month Master List</li>
                </ol>
            </nav>
        </div>
        <div><a href="/Month-Master"><button type="button" class="btn btn-primary">Add Month Master</button></a></div>
    </div>
<table class="table table-striped">
    <thead>
        <tr>
        <th>S.No.</th>
        <th>Month</th>
        <th>Year</th>
        <th>Total Days</th>
        <th>Working Days</th>
        <th>Holy Days</th>
        <th>Actions</th>
        </tr>
    </thead>
    <tbody>
    @foreach ($month_master_list as $month_master)
    <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $month_master->sal_month }}</td>
        <td>{{ $month_master->sal_year }}</td>
        <td>{{ $month_master->sal_tot_days }}</td>
        <td>{{ $month_master->sal_work_days }}</td>
        <td>{{ $month_master->sal_holy_days }}</td>
        <td>
        <span><a href="{{ route('Edit-Month-Master',$month_master->id) }}"><i class="bi bi-pencil-fill"></i></a>&nbsp&nbsp&nbsp&nbsp</span><a href="{{ route('Delete-Month-Master',$month_master->id) }}"><i class="bi bi-trash"></i></a>
        </td>
    </tr>
    @endforeach
    </tbody>
</table>
@endsection