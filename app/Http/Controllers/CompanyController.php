<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use App\Models\Company;


class CompanyController extends Controller
{
    // Displaying Companies
    public function company()
    {
        $companies = DB::table('user_company')
                        ->select('c.*')
                        ->join('company as c','c.id','=','user_company.com_id')
                        ->where('user_id','=',Auth::user()->id)
                        ->get();
        // $companies=company::where('id',$user_companies)->get();
        return view('company/companies',['companies'=>$companies]);
    }

    // Add Company
    public  function addcom(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'radios' => 'required',
        ]);
        if ($validator->fails()) {
            return back()
                ->withInput()
                ->withErrors($validator);
        }

        $id=IdGenerator::generate([
            'table' => 'company' ,
            'field' => 'id',
            'length' => 6,
            'prefix' =>date('ym'),
            'reset_on_prefix_change'=>'true'

        ]);

        Company::insert(
            array(
                    'id'     =>  $id,
                    'name'   =>   $request->name,
                    'status'  =>   $request->radios,
                )
        );

        DB::table('user_company')->insert(
            array(
                'user_id'   =>   Auth::user()->id,
                'com_id'  =>   $id,
            )
        );
        return back();
    }

    // Delete Company
    public function delete(Company $company )
    {
        DB::table('user_company')
            ->where('com_id',$company->id)
            ->where('user_id',Auth::user()->id)
            ->delete();

        Company::where('id', $company->id)->delete();
        return back();
        // dd($company);
    }

    // Status of Company
    public function status(Company $company )
    {
        if($company->status=='inactive'){
            Company::where('id', $company->id)
                    ->update(['status' => 'active']);
        }else{
            Company::where('id', $company->id)
                ->update(['status' => 'inactive']);
        }

        return back();
    }


}
