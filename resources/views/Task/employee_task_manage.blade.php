@extends('layouts.app')
@section('main')
<div class="d-flex justify-content-between">
        <div class="pt-2">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="home.html">Home</a></li>   
                    <li class="breadcrumb-item active" aria-current="page">Employee Task List</li>
                </ol>
            </nav>
        </div>
        <div><a href="{{ route('Assign-Task-Employee', $employee_id) }}"><button type="button" class="btn btn-primary">Add Task</button></a></div>
    </div>
<table class="table table-striped">
    <thead>
        <tr class="text-center">
        <th>S.No.</th>
        <th>Task Titile</th>
        <th>Due Date</th>
        <th>Discription</th>
        <th>Task Priority</th>
        <th>Status</th>
        <th>Actions</th>
        </tr>
    </thead>
    <tbody>
    @foreach ($tasks as $index => $task)
    
    <tr class="text-center">
        <td>{{ $loop->iteration }}</td>
        <td>{{ $task->task_title }}</td>
        <td>{{ $task->formatted_due_date }}</td>
        <td>{{ $task->task_description }}</td>
        <td>@if($task->task_priority == 1)
                High
            @elseif($task->task_priority == 2)
                Medium
            @elseif($task->task_priority == 3)
                Low
            @endif</td>
        <td><span class="badge bg-primary">@if($task->task_status == 1)
                assigned
            @elseif($task->task_status == 2)
                completed
            @endif</span></td>
        <td>
            <span><a href="{{ route('Edit-Task-Employee', $task->id) }}"><i class="bi bi-pencil-fill"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;</span>
            <a href="{{ route('Delete-Task', $task->id) }}"><i class="bi bi-trash"></i></a>
        </td>
    </tr>
@endforeach
    </tbody>
</table>
@endsection