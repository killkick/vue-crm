<?php

namespace App\Http\Controllers;

use App\Company;


use App\Http\Requests\CompanyRequest;
use App\Http\Resources\CompanyResource;
use App\Http\Resources\Contact as ContactResource;
use App\Mail\CompanyMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use PhpParser\Node\Expr\New_;
use Symfony\Component\HttpFoundation\Response;

class CompanyController extends Controller
{
    public function index() {
     $companies = CompanyResource::collection(Company::paginate(10));
     return $companies;
    }

    public function store(CompanyRequest $request) {

        $company = Company::create($request->all());
        if ($request->hasFile('logo')) {
            $logo = $request->file('logo');
            $name = $request->name . '.' . $logo->getClientOriginalExtension();
            $destinationPath = public_path('/img');
            $logo->move($destinationPath, $name);
            $company->logo = $name;
        }
        $company->save();
        Mail::to($company->email)->send(new CompanyMail($company));
        return (new CompanyResource($company))->response()->setStatusCode(Response::HTTP_CREATED);

    }



    public function show(Company $company ) {
        return new CompanyResource($company);
    }

    public function destroy(Company $company) {
        $company->delete();
        return \response([], Response::HTTP_NO_CONTENT);
    }

    public function update(Company $company ){
        $company->update($this->validatedData());
        return (new CompanyResource($company))->response()->setStatusCode(Response::HTTP_OK);

    }

    private function validatedData() {
        return  $data =  \request()->validate([
            'name' => 'required',
            'email' => 'required|email',
            'website' => 'required'
        ]);
    }
}
