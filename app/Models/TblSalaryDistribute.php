<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TblSalaryDistribute extends Model
{
    use HasFactory;
    protected $table = 'tbl_employee_salary'; // Ensure the correct table name
    public $timestamps = false;
    protected $fillable = [
        'emp_id',
        'work_days',
        'presant_days',
        'tot_wor_hrs',
        'emp_wor_hrs',
        'tot_Salary',
        'status',
        'emp_salary',
        'created_by',
        'created_dtm'
    ];
}