<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use App\Models\Expense;
use App\Models\PaymentMethod;
use App\Models\Category;


class ExpenseController extends Controller
{

    // Add Expense
    public function addexp(Request $request){

        $validator = Validator::make($request->all(), [
            'title' => ['required', 'string', 'max:255'],
            'amount' => ['required', 'numeric'],
            'payment_method' => ['required', 'string', 'max:255'],
            'category' => ['required', 'string', 'max:255']
        ]);

        if ($validator->fails()) {
            return back()
                ->withInput()
                ->withErrors($validator);
        }

        $id_exp=IdGenerator::generate([
            'table' => 'expense' ,
            'field' => 'id',
            'length' => 8,
            'prefix' =>date('ym'),
            'reset_on_prefix_change'=>'true'
        ]);

        $id_pm=IdGenerator::generate([
            'table' => 'payment_method' ,
            'field' => 'id',
            'length' => 6,
            'prefix' =>date('m'),
            'reset_on_prefix_change'=>'true'
        ]);

        $id_cat=Category::select('id')
                    ->where('category',$request->category)
                    ->get();


        PaymentMethod::insert(
            array(
                'id'=> $id_pm,
                'com_id'   =>  $request->company_id,
                'method'  =>   $request->payment_method,
            )
        );

        Expense::insert(
            array(
                'id'=> $id_exp,
                'pm_id'=>$id_pm ,
                'cat_id'=>$id_cat[0]->id,
                'title'=> $request->title,
                'amount'=> $request->amount,
                )
        );

        return back();

        // dd( $request->all() );
    }

    // Display the expenses of company
    public function show_expenses(Company $company){

        $companies = DB::table('user_company')
                    ->select('company.*')
                    ->join('company','company.id','=','user_company.com_id')
                    ->where('user_id','=',Auth::user()->id)
                    ->get();

        $expenses = Expense::select('title','amount','pm.method','cat.category')
                ->join('payment_method as pm','pm.id','=','expense.pm_id')
                ->join('category as cat','cat.id','=','expense.cat_id')
                ->where('com_id','=',$company->id)
                ->get();

        return view('home',['companies'=>$companies,'company'=>$company,'expenses'=>$expenses]);

    }

    // Filter expenses
    public function filter(Request $request)
    {
        $expenses =Expense::select('title','amount','pm.method','cat.category')
                ->join('payment_method as pm','pm.id','=','expense.pm_id')
                ->join('category as cat','cat.id','=','expense.cat_id')
                ->where('com_id','=',$request->company_id)
                ->get();

        if(isset($request->All_Methods) && isset($request->Office)){
            for ($i=0; $i < sizeof($expenses); $i++) {
                if($expenses[$i]->category=='Office')
                $expenses_filter=array_push($expenses[$i]);
            }
        }else $expenses_filter=$expenses;
        dd($expenses_filter);
    }

}
