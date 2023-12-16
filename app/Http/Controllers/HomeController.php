<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use App\Models\Company;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    //display companies on layouts
    public function index()
    {
        // eval(\Psy\sh());
        $companies = DB::table('user_company')
                    ->select('company.*')
                    ->join('company','company.id','=','user_company.com_id')
                    ->where('user_id','=',Auth::user()->id)
                    ->get();

        $expenses = DB::table('expense')
            ->select('title','amount','pm.method','cat.category')
            ->join('payment_method as pm','pm.id','=','expense.pm_id')
            ->join('category as cat','cat.id','=','expense.cat_id')
            ->where('com_id','=',$companies[0]->id)
            ->get();


        return view('home',['companies'=>$companies,'company'=>$companies[0],'expenses'=>$expenses]);
    }


    public function status()
    {
    if(Auth::user()->status=='inactive'){
        DB::table('user')->where('id', auth()->id())
                ->update(['status' => 'active']);
    }else{
        DB::table('user')->where('id', auth()->id())
        ->update(['status' => 'inactive']);
    }

    return back();

    }

    // Display Expenses of company


}
