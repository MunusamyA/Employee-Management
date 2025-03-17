<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TblEmployee; 
use App\Models\TBLEmployeeTask; 
use Carbon\Carbon;
class EmployeeTaskController extends Controller
{

    public function EmployeeList(){
        $employees = TblEmployee::where('rec_del_status','0')->get();
        return view('Task.employee_task_list',['employee_list' => $employees]);
    }

    public function AssignTask($id){
        $employee = TblEmployee::where('rec_del_status','0')->where('id',$id)->first();
        return view('Task.employee_task_form',compact('employee'));
    }
    public function ManageTask($id){
        $tasks = TBLEmployeeTask::where('rec_del_status','0')->where('employee_id',$id)->get()->
        map(function ($task) {
            $task->formatted_due_date = Carbon::parse($task->task_due_date)->format('d-m-Y');
            return $task;
        });;
        $employee_id = $id;
        return view('Task.employee_task_manage',compact('tasks','employee_id'));
    }

    public function EmployeeTaskEdit($id){

        $tasks = TBLEmployeeTask::where('rec_del_status','0')->where('id',$id)->first();

        $task_id = $id;

        $emp_id = TBLEmployeeTask::where('rec_del_status','0')->where('id',$id)->value('Employee_id');

        $employee = TblEmployee::where('rec_del_status','0')->where('id',$emp_id)->first();

        return view('Task.employee_task_edit',compact('tasks','task_id','employee'));

    }
    public function TaskDelete($id){

        try {
            $task = TBLEmployeeTask::where('id',$id)->firstOrFail();
            $task->updated_by = 1;
            $task->updated_dtm = now();
            $task->rec_del_status = 1;
            $task->save();
            return redirect()->route('Employee-Task-Manage', ['id' => $task->employee_id])->with('success', 'Task successfully Deleted!');
        } catch (\Exception $e) {
            \Log::error('Employee Insert Error: ' . $e->getMessage());
            return redirect()->route('Employee-Task-Manage', ['id' => $task->employee_id])->with('error', 'Error: ' . $e->getMessage());
        }
    }
    
    public function EmployeeTaskUpdate(Request $request, $task_id, $employee_id)
    {
        try {

            $task = TBLEmployeeTask::where('rec_del_status', '0')
                ->where('id', $task_id)
                ->where('employee_id', $employee_id)
                ->firstOrFail();
    
            $task->update([
                'task_title' => $request->task_title,
                'task_due_date' => $request->task_due_date,
                'task_description' => $request->task_description,
                'task_priority' => $request->task_priority,
                'task_status' => 1,
                'updated_by' => 1,
                'updated_dtm' => now(),
            ]);
            return redirect()->route('Employee-Task-Manage', ['id' => $employee_id])->with('success', 'Task successfully updated!');
        } catch (\Exception $e) {
            return redirect()->route('Employee-Task-Manage', ['id' => $task_id])->with('error', 'Error: ' . $e->getMessage());
        }
    }

    public function EmployeeTaskInsert(Request $request,$id)
    {


        try {
            foreach ($request->task_title as $index => $title) {
                TBLEmployeeTask::create([
                    'employee_id' => $id,
                    'task_title' => $title,
                    'task_due_date' => $request->task_due_date[$index],
                    'task_description' => $request->task_description[$index],
                    'task_priority' => $request->task_priority[$index],
                    'task_status' => 1,
                    'created_by' => 1,
                    'created_dtm' => now(),
                ]);
            }
            return redirect()->route('Employee-Task-Manage',$id)->with('success', 'Tasks added successfully! ');  
        } catch (\Exception $e) {
            return redirect()->route('Month-Master-List')->with('error', 'Error: ' . $e->getMessage());
        }
    }
}
