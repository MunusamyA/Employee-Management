<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class TblLoginLogout extends Model
{
    use HasFactory;
    protected $table = 'tbl_login_logout';
    public $timestamps = false; 
    //
}
