<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Validator;
use \App\User,\App\Address,DB,\App\UserToken;
use App\Http\Requests\UserRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $users = User::orderBy('id','desc');
        if(request('search_value') && request('search_by'))
        {
            $users = $users->where(request('search_by'),'like','%'.request('search_value').'%');
        }
        $users =$users->paginate(20);
        return view('admin.customers.customers',compact('users','request'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try
        {
            $user = User::with(['addresses','userTokens'])->findorFail($id);
            $states = $this->selectStates();
            return view('admin.customers.customer-details',compact('user','states'));
        }catch(\Exception $e){
            $msg = $e->getMessage();
            return redirect()->back()->with('global',$msg)->with('type','danger');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $cRequest, $id)
    {        
        try{
            $user = User::findorFail($id);
            $done = $cRequest->updateCustomerDetails($user);
            return redirect()->back()->with('global',$done['msg'])->with('type',$done['type'])->withInput(request()->all());
        }
        catch(\Exception $e){
            $msg = $e->getMessage();
            $type = 'error';
            return redirect()->back()->with('global',$msg)->with('type',$type)->withInput(request()->all());
        }
        
    }

    public function userAddressUpdate(UserRequest $cRequest, $userAddressId)
    {
        try{
            $userAddress = Address::findorFail($userAddressId);
            $done = $cRequest->updateCustomerAddress($userAddress);
            return response()->json(['msg' => $done['msg'], 'type' => $done['type'],'route'=>route('customers-management.edit',$userAddress->user_id)]);
        }
        catch(\Exception $e){
            $msg = $e->getMessage();
            $type = 'error';
            return response()->json(['msg' => $done['msg'], 'type' => $done['type']]);
        }
    }

    public function createToken(UserRequest $cRequest,UserToken $token,User $customer)
    {
        try{
            if($token){

            }else{
                $token = new UserToken;
            }
            $done = $cRequest->addEditCustomerToken($token,$customer);
            return response()->json(['msg' => $done['msg'], 'type' => $done['type'],'route'=>route('customers-management.edit',$customer->id)]);
        }
        catch(\Exception $e){
            $msg = $e->getMessage();
            $type = 'error';
            return response()->json(['msg' => $done['msg'], 'type' => $done['type']]);
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
