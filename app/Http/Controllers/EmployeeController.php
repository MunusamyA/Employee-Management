<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\EmployeeFormRequest;
use App\Models\TblEmployee; 


class EmployeeController extends Controller
{
    public function EmployeeForm()
    {
        return view('Employee.create_employee');
    }


    public function dashboard()
    {
        return view('Employee.login');
    }


    public function EmployeeList()
    {
        $employees = TblEmployee::where('rec_del_status','0')->get();
        return view('Employee.employee_list',['employee_list' => $employees]);
    }

    public function EmployeeEdit($id)
    {
        $employee_edit = TblEmployee::where('id',$id)->first();
        return view('Employee.edit_employee',['edit_employee' => $employee_edit]);
    }

    public function EmployeeInsert(EmployeeFormRequest $request){
        try {
            $emp_photo = $request->file('emp_photo')->store('assets/emp_photos', 'public');
    
            $tbl_employees = new TblEmployee;
            $tbl_employees->emp_name = $request->emp_name;
            $tbl_employees->emp_email = $request->emp_email;
            $tbl_employees->emp_mob_no = $request->emp_mob_no;
            $tbl_employees->emp_dob = $request->emp_dob;
            $tbl_employees->emp_gender = $request->emp_gender;
            $tbl_employees->emp_dpt = $request->emp_dpt;
            $tbl_employees->emp_position = $request->emp_position;
            $tbl_employees->emp_photo =  $emp_photo;
            $tbl_employees->emp_salary =  $request->emp_salary;
            $tbl_employees->created_by = 1;
            $tbl_employees->created_dtm = now();
            $tbl_employees->save();

            return redirect()->route('Employee-List')->with('success', 'Employee registered successfully!');    

        } catch (\Exception $e) {
            \Log::error('Employee Insert Error: ' . $e->getMessage());
            return redirect()->route('Employee-List')->with('error', 'Error: ' . $e->getMessage());
        }
    }
    public function EmployeeUpdate(EmployeeFormRequest $request,$id){
        try {

            
            $employee_edit = TblEmployee::where('id',$id)->first(); 
            if(isset($request->emp_photo)){
                $emp_photo = $request->file('emp_photo')->store('assets/emp_photos', 'public');
                $employee_edit->emp_photo =  $emp_photo;
            }
            $employee_edit->emp_name = $request->emp_name;
            $employee_edit->emp_email = $request->emp_email;
            $employee_edit->emp_mob_no = $request->emp_mob_no;
            $employee_edit->emp_dob = $request->emp_dob;
            $employee_edit->emp_gender = $request->emp_gender;
            $employee_edit->emp_dpt = $request->emp_dpt;
            $employee_edit->emp_position = $request->emp_position;
            $employee_edit->emp_salary =  $request->emp_salary;
            $employee_edit->updated_by = 1;
            $employee_edit->updated_dtm = now();
            $employee_edit->save();

            return redirect()->route('Employee-List')->with('success', 'Employee Update successfully!');    

        } catch (\Exception $e) {
            \Log::error('Employee Insert Error: ' . $e->getMessage());
            return redirect()->route('Employee-List')->with('error', 'Error: ' . $e->getMessage());
        }
    }
    public function EmployeeDelete($id){
        try {
            $employee_del = TblEmployee::where('id',$id)->first(); 
            $employee_del->updated_by = 1;
            $employee_del->updated_dtm = now();
            $employee_del->rec_del_status = 1;

            $employee_del->save();
            return redirect()->route('Employee-List')->with('success', 'Employee Deleted successfully!'); 
        } catch (\Exception $e) {
            \Log::error('Employee Insert Error: ' . $e->getMessage());
            return redirect()->route('Employee-List')->with('error', 'Error: ' . $e->getMessage());
        }
    }


}
