<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    protected $employee;

    public function __construct()
    {
        $this->employee = new Employee;
    }
    public function index()
    {
        $response['employee'] = $this->employee->all();
        return view('pages.index')->with($response);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->employee->create($request->all());
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function edit(string $id)
    {
        $response['employee'] = $this->employee->find($id);
        return view('pages.edit')->with($response);
    }
    public function update(Request $request, string $id)
    {
        $employee = $this->employee->find($id);
        $employee->update(array_merge($employee->toArray(), $request->toArray()));
        return redirect('employee');
    }
    public function destroy(string $id)
    {
        $employee = $this->employee->find($id);
        $employee->delete();
        return redirect('employee');
    }
}
