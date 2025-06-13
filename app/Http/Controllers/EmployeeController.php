<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use App\Models\User;
use App\Models\Employee;
class EmployeeController extends Controller
{


    public function index()
    {

        return view('employees.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('employees.create');
    }

    public function store(StoreEmployeeRequest $request)
    {
        Employee::create($request->validated());

        return redirect()->route('employees.index')->with('success', value: 'Employee created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }


    public function edit(string $id)
    {
        $employee=Employee::find($id);
        return view('employees.edit', compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEmployeeRequest $request, string $id)
    {
      $employee=Employee::find($id);
      $employee->update($request->validated());

      return redirect()->route('employees.index')->with('success', 'Employee Updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Employee::destroy($id);
        return redirect()->route('employees.index')->with('success', 'Employee Deleted successfully!');;
    }




}
