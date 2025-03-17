<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TblEmployee; 
use App\Models\TblSalaryGenarate; 
use App\Models\TblMonthMaster; 
use App\Models\TblLoginLogout; 
use App\Models\TblSalaryDistribute; 

use Carbon\Carbon;

class SalaryGenarateController extends Controller
{
    public function EmployeeList(){
        $employee = TblEmployee::where('rec_del_status','0')->get();

            $salaryDistribute = TblSalaryDistribute::where('rec_del_status', '0')
            ->whereIn('emp_id', $employee->pluck('id'))
            ->get()
            ->keyBy('emp_id'); 
        return view('SalaryGenarate.employee_salary_genarate',['employee_list' => $employee,'salaryDistribute'=>$salaryDistribute]);
    }

    public function salary_genarate($emp_id) {
        $employees = TblEmployee::where('rec_del_status','0')->where('id',$emp_id)->first();

        $now = Carbon::now();
        $currentMonth = $now->format('F');
        $currentYear = $now->year;
        $totalDays = $now->daysInMonth; 
        $previousMonthDate = $now->copy()->subMonth();
        $previousMonth = $previousMonthDate->format('F');
        $previousMonthYear = $previousMonthDate->year;
        $monthMaster = TblMonthMaster::where('rec_del_status', '0')->where('sal_month', $previousMonth)->where('sal_year', $previousMonthYear)->first();
    
        if (!$monthMaster) {
            return response()->json(['error' => 'Month master not found'], 404);
        }
        $year = $monthMaster->sal_year;
        $month = str_pad($monthMaster->sal_month, 2, '0', STR_PAD_LEFT);
        $formattedDate = "$year-$month-01";
        $startDate = Carbon::createFromFormat('Y-F-d', $formattedDate)->format('Y-m-d');
        $endDate = date('Y-m-t', strtotime($startDate));

        $lunchStart = "12:30:00";
        $lunchEnd = "13:30:00";
        
        $workingHours = TblLoginLogout::where('emp_id', $emp_id)->whereBetween('login_date', [$startDate, $endDate])->selectRaw('emp_id, login_date, MIN(login_time) as first_login, COALESCE(MAX(logout_time), "00:00:00") as last_logout')->groupBy('emp_id', 'login_date')->get();
        $totalworkHours = 0;
        foreach ($workingHours as $entry) {
            $firstLogin = Carbon::parse($entry->login_date . ' ' . $entry->first_login);
            $lastLogout = Carbon::parse($entry->login_date . ' ' . $entry->last_logout);

            $workHours = $firstLogin->diffInHours($lastLogout);

            $lunchStartTime = Carbon::parse($entry->login_date . ' ' . $lunchStart);
            $lunchEndTime = Carbon::parse($entry->login_date . ' ' . $lunchEnd);

            if ($firstLogin->lessThan($lunchEndTime) && $lastLogout->greaterThan($lunchStartTime)) {
                $workHours -= 1;
            }

            $totalworkHours += $workHours;
        }
        $presant_days = count($workingHours);
        $monthlySalary = $employees->emp_salary;
        $workingDays = $monthMaster->sal_work_days;
        $totalSalary = ($totalworkHours / ($workingDays * 8)) * $monthlySalary;

        $Totalhrs = $workingDays * 8;


        return view('SalaryGenarate.employee_salary_details',['Totalhrs'=>$Totalhrs,'employee' => $employees,'totalworkHours' => $totalworkHours,'monthlySalary'=>$monthlySalary,'workingDays'=>$workingDays,'totalSalary'=>round($totalSalary, 2),'presant_days'=>$presant_days]);

    }

    public function EmployeeSalaryInsert(Request $request){

        try {
                TblSalaryDistribute::create([
                    'emp_id' => $request->emp_id,
                    'work_days' => $request->work_days,
                    'presant_days' => $request->presant_days,
                    'tot_wor_hrs' => $request->tot_wor_hrs,
                    'emp_wor_hrs' => $request->emp_wor_hrs,
                    'emp_salary' => $request->emp_salary,
                    'tot_Salary' => $request->tot_Salary,
                    'status' => 1,
                    'created_by' => 1,
                    'created_dtm' => now(),
                ]);
            return redirect()->route('Salary-Genarate')->with('success', 'Salary Genarated successfully! ');  // dd('def');
        } catch (\Exception $e) {
            dd($e->getMessage());
            return redirect()->route('Salary-Genarate')->with('error', 'Error: ' . $e->getMessage());
        }


        
    }

}

