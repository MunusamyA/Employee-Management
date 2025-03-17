<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TblMonthMaster extends Model
{
    use HasFactory;
    protected $table = 'tbl_month_masters'; // Ensure the correct table name
    public $timestamps = false;
    protected $fillable = [
        'sal_month',
        'sal_year',
        'sal_tot_days',
        'sal_holy_days',
        'sal_work_days',
        'created_by',
        'created_dtm'
    ];
}
