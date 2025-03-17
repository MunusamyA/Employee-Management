<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TblEmployee extends Model
{
    use HasFactory;

    protected $table = 'tbl_employees'; // Ensure the correct table name
    public $timestamps = false;
    protected $fillable = [
        'emp_name',
        'emp_email',
        'emp_mob_no',
        'emp_dob',
        'emp_gender',
        'emp_dpt',
        'emp_position',
        'emp_photo',
        'created_by',
        'emp_salary',
        'created_dtm'
    ];
}
