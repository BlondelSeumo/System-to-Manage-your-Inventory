<?php

namespace App\Http\Controllers\Backend\Account\Basic;

use App\Models\Accounts\FiscalPeriod;
use App\Models\Common\Company;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CompanyController extends Controller
{
    public $comp_code;
    public $user_id;

    /**
     * CompanyController constructor.
     */
    public function __construct()
    {
        $this->middleware(function ($request, $next) {

            $this->comp_code = Auth::guard('admin')->user()->company_id;
            $this->user_id = Auth::guard('admin')->user()->id;

            return $next($request);
        });
    }


    public function index()
    {

//        if(GenUtil::check_privilege(\Auth::user()->email,'B01',1) == False)
//        {
//            session()->flash('alert-success', 'You do not have permission');
//            return redirect()->back();
//            die();
//        }

        $comp = Company::where('id',$this->comp_code)->first();

        return view('backend.accounts.company.companyconfig')->with('comp',$comp);
    }

    public function saveconfig(Request $request)
    {

//        dd($request);


        switch ($request['action'])
        {
            case 'SUBMIT': //action for html here

                dd('here');

                DB::beginTransaction();

                try{
                    if(!empty($request->project))
                    {
                        Company::where('id',$this->comp_code)
                            ->update(['project' => true]);
                    }
                    else
                    {
                        Company::where('id',$this->comp_code)
                            ->update(['project' => false]);
                    }

                    if(!empty($request->inventory))
                    {
                        Company::where('id',$this->comp_code)
                            ->update(['inventory' => true]);

                    }
                    else
                    {
                        Company::where('id',$this->comp_code)
                            ->update(['inventory' => false]);

                    }



//                    $comp_code = Auth::user()->compCode;

                    $start_date = Carbon::createFromFormat('d/m/Y', $request->input('fp_start'));
                    $end_dt = Carbon::createFromFormat('d/m/Y', $request->input('fp_start'))->endOfMonth();

                    $f_y1 = Carbon::createFromFormat('d/m/Y', $request->input('fp_start'))->format('Y');
                    $f_y2 = Carbon::createFromFormat('d/m/Y', $request->input('fp_start'))->addMonth(7)->format('Y');
                    $f_y = $f_y1.'-'.$f_y2;

                    Company::where('id',$request->id)
                        ->update(['currency' => $request->input('currency'),'posted'=>true, 'fp_start'=>$start_date]);

                    for ($m=1; $m <=12; $m++) {

                        $year = $start_date->format('Y');
                        $fpNo= $m;

                        $month_sl = $start_date->format('m');
                        $month = date('F', mktime(0,0,0,$month_sl, 1, date('Y')));
                        $status = true;


                        FiscalPeriod::create([
                            'company_id' => $this->comp_code,
                            'fiscal_year' => $f_y,
                            'year' =>$year,
                            'fp_no' => $fpNo,
                            'month_sl' => $month_sl,
                            'month_name' => $month,
                            'start_date' => $start_date,
                            'end_date' => $end_dt,
                            'status' => $status,
                            'depriciation' => false
                        ]);

                        $start_date = $start_date->addMonth(1);

                    }

                    FiscalPeriod::where('company_id',$this->comp_code)->where('status',1)
                        ->update(['end_date'=>DB::Raw('LAST_DAY(start_date)')]);


                    $account = new AccountModel;

                    $account->compCode = $this->comp_code;
                    $account->ldgrCode = $request->input('cashAcc');
                    $account->typeCode = '12';
                    $account->accNo = $request->input('cashAcc').'12100';
                    $account->accrNo = $request->input('cashAcc').'12999';
                    $account->accName = '*'.Str::upper('CASH IN HAND');
                    $account->accType = 'A';
                    $account->isGroup = TRUE;
                    $account->userCreated = Auth::user()->name;

                    $account->save();

                    $account = new AccountModel;

                    $account->compCode = $this->comp_code;
                    $account->ldgrCode = $request->input('bankAcc');
                    $account->typeCode = '12';
                    $account->accNo = $request->input('bankAcc').'12100';
                    $account->accrNo = $request->input('bankAcc').'12999';
                    $account->accName = '*'.Str::upper('CASH AT BANK');
                    $account->accType = 'A';
                    $account->isGroup = TRUE;
                    $account->userCreated = Auth::user()->name;

                    $account->save();

                    $account = new AccountModel;

                    $account->compCode = $this->comp_code;
                    $account->ldgrCode = $request->input('salesAcc');
                    $account->typeCode = '31';
                    $account->accNo = $request->input('salesAcc').'12100';
                    $account->accrNo = $request->input('salesAcc').'12999';
                    $account->accName = '*'.Str::upper('SALES ACCOUNT');
                    $account->accType = 'I';
                    $account->isGroup = TRUE;
                    $account->userCreated = Auth::user()->name;

                    $account->save();


                    $account = new AccountModel();

                    $account->compCode = $this->comp_code;
                    $account->ldgrCode = $request->input('purchaseAcc');
                    $account->typeCode = '41';
                    $account->accNo = $request->input('purchaseAcc').'12100';
                    $account->accrNo = $request->input('purchaseAcc').'12999';
                    $account->accName = '*'.Str::upper('PURCHASE ACCOUNT');
                    $account->accType = 'E';
                    $account->isGroup = TRUE;
                    $account->userCreated = Auth::user()->name;

                    $account->save();



                    $request->session()->flash('alert-success', 'Company Configuration Updated');

                }catch (HttpException $e)
                {
                    DB::rollBack();
                    $request->session()->flash('alert-success', 'Not updated');
                    return redirect()->back();
                }

                DB::commit();

                break;

            case 'UPDATE': //action for css here

                DB::beginTransaction();

                BasicProperty::where('id',$request->id)
                    ->update(['currency' => $request['currency']]);

                DB::commit();

        }



        return redirect()->action('Backend\Auth\AdminController@accountindex');

    }
}
