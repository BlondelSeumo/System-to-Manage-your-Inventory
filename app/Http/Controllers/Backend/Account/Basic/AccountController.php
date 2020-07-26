<?php

namespace App\Http\Controllers\Backend\Account\Basic;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AccountController extends Controller
{
    public function accountGroupIndex()
    {

//        $userPr = UserPrivilegesModel::where('email',Auth::user()->email)
//            ->where('compCode',Auth::user()->compCode)
//            ->where('useCaseId','B04')->first();
//
//        if($userPr->view == 0)
//        {
//            session()->flash('alert-danger', 'You do not have permission. Please Contact Administrator');
//            return redirect()->back();
//            die();
//        }


        $subType = AccTypeModel::OrderBy('typeCode','ASC')->pluck('description','typeCode');
        return view('account.accountGroupIndex')->with('subType',$subType)->with('userPr',$userPr);
    }

    public function getGroupData()
    {

        $groups = AccountModel
            ::join('acc_types', 'acc_types.typeCode', '=', 'accounts.typeCode')
            ->where('compCode',Auth::user()->compCode)->where('isGroup',true)
            ->select('accounts.id','accounts.ldgrCode','accounts.currBal','accounts.accName','accounts.accType','acc_types.description',
                DB::Raw('CASE accounts.accType WHEN "A" THEN "ASSET" 
                                               WHEN "L" THEN "LIABILITY"
                                               WHEN "I" THEN "INCOME"
                                               WHEN "E" THEN "EXPENSE"
                                               ELSE "CAPITAL" END as TypeDesc'))->get();


        return Datatables::of($groups)
            ->addColumn('action', function ($groups) {

                return '<button id="editproject" data-toggle="modal" data-target="#editprojectModal'.$groups->id.'"  type="button" class="btn btn-edit btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</button>
                    <button data-remote="account.group.delete/' . $groups->id . '" type="button" class="btn btn-delete btn-xs btn-danger pull-right" ><i class="glyphicon glyphicon-remove"></i>Del</button>

                    <!-- editprojectModal -->
                    
                    <div class="modal fade" id="editprojectModal'.$groups->id.'" role="dialog" data-backdrop="false" style="background-color: rgba(0, 0, 0, 0.5);">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">x</button>
                                    <h4 class="modal-title">Edit Account Group</h4>
                                </div>
                                <div class="modal-body">
                                    <form class="form-horizontal" role="form" action="account.group.update/'.$groups->id.'" method="POST" >
                                    <input type="hidden" name="_method" value="PUT">
                                    <input type="hidden" name="_token" value="'. csrf_token().'">
                                    <input type="hidden" name="id" value="'.$groups->id.'">
                                        <div class="form-group">
                                            <label for="accName" class="col-md-4 control-label">Name</label>
                                            <div class="col-md-6">
                                                <input id="accName" type="text" class="form-control" name="accName" value="'.$groups->accName.'" required autofocus>
                                            </div>
                                        </div>
                                        
                        
                                        <button type="submit" class="btn btn-primary" id="update-data">Save Changes</button>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-info" data-dismiss="modal">Cancel</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    ';
            })
            ->make(true);
    }

    public function addGroupData(Request $request)
    {

        $groupCode = AccountModel::where('compCode',Auth::user()->compCode)
            ->where('accType',$request->accType)->max('ldgrCode');
        if(!empty($groupCode))
        {
            $newLedger = $groupCode + 1;
        }
        else if($request->accType == 'A')
        {
            $newLedger = '101';

        }
        else if($request->accType == 'L')
        {
            $newLedger = '201';

        }
        else if($request->accType == 'I')
        {
            $newLedger = '301';

        }
        else if($request->accType == 'E')
        {
            $newLedger = '401';

        }
        else if($request->accType == 'C')
        {
            $newLedger = '501';

        }

//        $request->request->add(['typeCode' => $typeCode,'userCreated' =>$userCreated]);

        $account = new AccountModel;

        $account->compCode = Auth::user()->compCode;
        $account->ldgrCode = $newLedger;
        $account->typeCode = $request->typeCode;
        $account->accNo = $newLedger.'12100';
        $account->accrNo = $newLedger.'12999';
        $account->accName = '*'.Str::upper($request->accName);
        $account->accType = $request->accType;
        $account->isGroup = TRUE;
        $account->userCreated = \Auth::user()->name;

        $account->save();

        return redirect()->action('Account\AccountController@accountGroupIndex');

    }

    public function editGroupData(Request $request, $id)
    {
        DB::beginTransaction();

        try{

            AccountModel::where('id',$id)->update(['accName'=>$request->accName]);
            $request->session()->flash('alert-success', $request->accName.' Updated');

        }catch (HttpException $e)
        {
            DB::rollBack();
            $request->session()->flash('alert-danger', $request->name.' Not updated');
            return redirect()->back();
        }

        DB::commit();

        return redirect()->action('Account\AccountController@accountGroupIndex');
    }

    public function deleteGroupData(Request $request, $id)
    {
        $data = AccountModel::find($id);



        if(AccountModel::where('ldgrCode',$data->ldgrCode)
            ->where('compCode',Auth::user()->compCode)
            ->where('isGroup',false)->exists())
        {
            return json_encode(array('error' => true, 'message' => ' Delete Failed !! Item Exists in Transaction History!'));
//            $request->session()->flash('alert-danger', 'Account Head Exist, Not Possible to Delete');
//

        }else{
            AccountModel::find($id)->delete();
        }

        return response()->json(['status'=>'Hooray']);
    }
}
