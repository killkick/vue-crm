<?php

namespace App\Http\Controllers;

use App\Employee;

use App\Http\Requests\EmployeeRequest;
use App\Http\Resources\EmployeeResource;

use Symfony\Component\HttpFoundation\Response;

class EmployeeController extends Controller
{
    public function index() {
        $employees = EmployeeResource::collection(Employee::paginate(10));
        return $employees;
    }

    public function store(EmployeeRequest $request) {
        $employee =  Employee::create($request->all());
        return (new EmployeeResource($employee))->response()->setStatusCode(201);
    }
    public function show(Employee $employee ) {
        return new EmployeeResource($employee);
    }
    public function destroy(Employee $employee) {
        $employee->delete();
        return \response([], Response::HTTP_NO_CONTENT);

    }
    public function update(Employee $employee, EmployeeRequest $request ){
        $employee->update($this->validatedData());
        return (new EmployeeResource($employee))->response()->setStatusCode(Response::HTTP_OK);
    }


    public function validatedData() {
      return   request()->validate([
        'phone' => 'required',
          'email' => 'required|email|max:255',
          'first_name' => 'required|max:255',
         'last_name' => 'required|max:255',
          'company_id' => 'integer|required',
        ]);
    }

}
