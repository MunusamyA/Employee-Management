<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\MonthMasterController;
use App\Http\Controllers\EmployeeTaskController;
use App\Http\Controllers\SalaryGenarateController;

Route::get('/', [EmployeeController::class, 'dashboard']);


Route::get('/Month-Master', [MonthMasterController::class, 'MonthMaster'])->name('Month-Master');
Route::post('/Month-Master-Insert', [MonthMasterController::class, 'MonthMasterInsert'])->name('Month-Master-Insert');
Route::get('/Month-Master-List', [MonthMasterController::class, 'MonthMasterList'])->name('Month-Master-List');
Route::get('/Edit-Month-Master/{id}', [MonthMasterController::class, 'MonthMasterEdit'])->name('Edit-Month-Master');
Route::put('/Edit-Month-Master/{id}', [MonthMasterController::class, 'MonthMasterUpdate']);
Route::get('/Delete-Month-Master/{id}', [MonthMasterController::class, 'MonthMasterDelete'])->name('Delete-Month-Master');


Route::get('/Employee-Form', [EmployeeController::class, 'EmployeeForm']);
Route::get('/Employee-List', [EmployeeController::class, 'EmployeeList'])->name('Employee-List');
Route::post('/Employee-Inserts', [EmployeeController::class, 'EmployeeInsert'])->name('Employee-Insert');
Route::get('/Edit-Employee/{id}', [EmployeeController::class, 'EmployeeEdit'])->name('Edit-Employee');
Route::put('/Edit-Employee/{id}', [EmployeeController::class, 'EmployeeUpdate']);
Route::get('/Delete-Employee/{id}', [EmployeeController::class, 'EmployeeDelete'])->name('Delete-Employee');


Route::get('/Employee-task', [EmployeeTaskController::class, 'EmployeeList'])->name('Employee-task');
Route::get('/Assign-Task-Employee/{id}', [EmployeeTaskController::class, 'AssignTask'])->name('Assign-Task-Employee');
Route::get('/Employee-Task-Manage/{id}', [EmployeeTaskController::class, 'ManageTask'])->name('Employee-Task-Manage');
Route::post('/Employee-Task-Insert/{id}', [EmployeeTaskController::class, 'EmployeeTaskInsert'])->name('Employee-Task-Insert');
Route::get('/Edit-Task-Employee/{id}', [EmployeeTaskController::class, 'EmployeeTaskEdit'])->name('Edit-Task-Employee');
Route::put('/Employee-Task-Update/{task_id}/{employee_id}', [EmployeeTaskController::class, 'EmployeeTaskUpdate'])->name('Employee-Task-Update');
Route::get('/Delete-Task/{task_id}', [EmployeeTaskController::class, 'TaskDelete'])->name('Delete-Task');

Route::get('/Salary-Genarate', [SalaryGenarateController::class, 'EmployeeList'])->name('Salary-Genarate');
Route::get('/Employee-Salary-genarate/{emp_id}', [SalaryGenarateController::class, 'salary_genarate'])->name('Employee-Salary-genarate');
Route::post('/Employee-Salary-Insert', [SalaryGenarateController::class, 'EmployeeSalaryInsert'])->name('Employee-Salary-Insert');

