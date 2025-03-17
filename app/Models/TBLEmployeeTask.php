<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TBLEmployeeTask extends Model  // Renamed class
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'tbl_employee_tasks'; // Update if needed

    protected $fillable = [
        'task_title',
        'task_due_date',
        'task_description',
        'task_priority',
        'employee_id', 
        'task_status',
        'created_by', 
        'created_dtm',
        'updated_by',
        'updated_dtm'
    ];
}




