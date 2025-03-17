@extends('layouts.app')
@section('main')
<div class="d-flex justify-content-between">
    <div class="pt-2">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="home.html">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Employee Task</li>
            </ol>
        </nav>
    </div>
</div>
<div class="card">
    <div class="card-header">
        <h5>Edit Employee Task</h5>
    </div>

    <form action="{{ route('Employee-Task-Update', ['task_id' => $task_id, 'employee_id' => $employee->id]) }}" method='POST' onsubmit="return funvalidate()" enctype="multipart/form-data">
        
     @csrf
        @method('PUT')
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
                        placeholder="Total No. of Working Days" value="{{ $employee->emp_mob_no }}">
                </div>
            </div>
            <div class="" style="border-top: 1px solid #ddd;padding-top: 10px;" id="sh">
                <div id="del_data">
                    <div class="row mb-3">
                        <label class="form-label col-md-2 mt-1">Task Title</label>
                        <div class="col-md-4">
                            <input type="text" class="form-control data_empty" name="task_title" id="task_title" placeholder="Enter Task Title" value="{{$tasks->task_title}}"><div class="invalid-feedback">Please Task Title</div>
                        </div>
                        <label class="form-label col-md-2 mt-1">Due Date</label>
                        <div class="col-md-4">
                            <input type="date" class="form-control data_empty" name="task_due_date" id="task_due_date" placeholder="" value="{{$tasks->task_due_date}}"><div class="invalid-feedback">Please Select Due Date</div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label  class="form-label col-md-2 mt-1">Description</label>
                        <div class="col-md-4">
                            <textarea name="task_description" id="task_description" class="form-control data_empty" rows="1" placeholder="Enter Description">{{$tasks->task_description}}</textarea><div class="invalid-feedback">Please Enter Description</div>
                        </div>
                        <label  class="form-label col-md-2 mt-1">Priority</label>
                        <div class="col-md-4">
                        <select name="task_priority" id="task_priority" class="form-control data_empty">
                                <option value="">Select Priority</option>
                                <option value="1" @selected(old('task_priority', $tasks->task_priority) == '1')>High</option>
                                <option value="2" @selected(old('task_priority', $tasks->task_priority) == '2')>Medium</option>
                                <option value="3" @selected(old('task_priority', $tasks->task_priority) == '3')>Low</option>
                            </select><div class="invalid-feedback">Please Select Priority</div>
                        </div>
                    </div>
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
function funvalidate() {
    var isValid = true;
    $('.data_empty').each(function() {
        var value = $(this).val().trim();
        if (value === "") {
            $(this).addClass('is-invalid');
            isValid = false;
        } else {
            $(this).removeClass('is-invalid');
        }
        
    });

    return isValid;
}
</script>
@endsection