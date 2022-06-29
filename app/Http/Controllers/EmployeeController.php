<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::all();
        return view('management/user-management', compact('employees'));
    }
    public function add(Request $request)
    {
        //validate 
        $attributes = request()->validate([
            'nomor_induk' => ['required'],
            'nama'     => ['required'],
            'alamat' => ['required'],
            'tanggal_lahir'    => ['required'],
            'tanggal_bergabung'    => ['required'],
        ]);
        //add to database
        $employee = Employee::create($attributes);
        if ($employee) {
            Session::flash('success', 'Employee added successfully');
            return redirect('/employee-management');
        } else {
            Session::flash('error', 'Employee added failed');
            return redirect('/employee-management');
        }
    }
    // update employee
    public function update(Request $request, $id)
    {
        //validate 
        $attributes = request()->validate([
            'nomor_induk' => ['required'],
            'nama'     => ['required'],
            'alamat' => ['required'],
            'tanggal_lahir'    => ['required'],
            'tanggal_bergabung'    => ['required'],
        ]);
        //update to database
        $employee = Employee::find($id);
        $employee->update($attributes);
        if ($employee) {
            Session::flash('success', 'Employee updated successfully');
            return redirect('/employee-management');
        } else {
            Session::flash('error', 'Employee updated failed');
            return redirect('/employee-management');
        }
    }
    //delete employee
    public function destroy($id)
    {
        $employee = Employee::find($id);
        $employee->delete();
        if ($employee) {
            Session::flash('success', 'Employee deleted successfully');
            return redirect('/employee-management');
        } else {
            Session::flash('error', 'Employee deleted failed');
            return redirect('/employee-management');
        }
    }
}
