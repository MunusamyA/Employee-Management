<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\TblEmployee; 
use App\Http\Requests\MonthMasterRequest;

use App\Models\TblMonthMaster;

class MonthMasterController extends Controller
{
    public function MonthMaster()
    {
        $now = Carbon::now();
        $currentMonth = $now->format('F'); 
        $currentYear = $now->year; 
        $totalDays = $now->daysInMonth;
        $previousMonthDate = $now->subMonth();
        $previousMonth = $previousMonthDate->format('F');
        $previousMonthDays = $previousMonthDate->daysInMonth;



        $already = TblMonthMaster::where('rec_del_status','0')->where('sal_month',$previousMonth)->where('sal_year',$currentYear)->count();
        

        if($already >= 1){
            return redirect()->route('Month-Master-List')->with('error', 'Already Insert '.$previousMonth.' Month Details');
        }
        return view('Salary.month_master', compact('currentMonth', 'currentYear', 'totalDays', 'previousMonth', 'previousMonthDays'));
        
    }

    public function MonthMasterInsert(MonthMasterRequest $request)
    {
        try {
            $TblMonthMaster = new TblMonthMaster; 
            $TblMonthMaster->sal_month = $request->sal_month;
            $TblMonthMaster->sal_year = $request->sal_year;
            $TblMonthMaster->sal_tot_days = $request->sal_tot_days;
            $TblMonthMaster->sal_holy_days = $request->sal_holy_days;
            $TblMonthMaster->sal_work_days = $request->sal_work_days;
            $TblMonthMaster->created_by = 1;
            $TblMonthMaster->created_dtm = now();
            $TblMonthMaster->save();
            return redirect()->route('Month-Master-List')->with('success', 'Salary Month Master registered successfully!');
        } catch (\Exception $e) {
            return redirect()->route('Month-Master-List')->with('error', 'Error: ' . $e->getMessage());
        }
    }
    public function MonthMasterUpdate(MonthMasterRequest $request,$id)
    {
        try {
            $month_master_edit = TblMonthMaster::where('id',$id)->first();
            $month_master_edit->sal_month = $request->sal_month;
            $month_master_edit->sal_year = $request->sal_year;
            $month_master_edit->sal_tot_days = $request->sal_tot_days;
            $month_master_edit->sal_holy_days = $request->sal_holy_days;
            $month_master_edit->sal_work_days = $request->sal_work_days;
            $month_master_edit->created_by = 1;
            $month_master_edit->created_dtm = now();
            $month_master_edit->save();
            return redirect()->route('Month-Master-List')->with('success', 'Salary Month Master successfully Updated!');
        } catch (\Exception $e) {
            return redirect()->route('Month-Master-List')->with('error', 'Error: ' . $e->getMessage());
        }
    }
    public function MonthMasterList()
    {
        $month_master = TblMonthMaster::where('rec_del_status','0')->get();
        return view('Salary.month_master_list',['month_master_list' => $month_master]);
    }

    public function MonthMasterEdit($id)
    {
        $month_master_edit = TblMonthMaster::where('id',$id)->first();
        return view('Salary.edit_month_master',['edit_month_master' => $month_master_edit]);
    }

    public function MonthMasterDelete($id){
        try {
            $month_master_del = TblMonthMaster::where('id',$id)->first(); 
            $sal_month = TblMonthMaster::where('id',$id)->value('sal_month');
            $month_master_del->updated_by = 1;
            $month_master_del->updated_dtm = now();
            $month_master_del->rec_del_status = 1;
            $month_master_del->save();
            return redirect()->route('Month-Master-List')->with('success', $sal_month.' Month Deleted successfully!'); 
        } catch (\Exception $e) {
            \Log::error('Month Master Insert Error: ' . $e->getMessage());
            return redirect()->route('Month-Master-List')->with('error', 'Error: ' . $e->getMessage());
        }
    }
}
