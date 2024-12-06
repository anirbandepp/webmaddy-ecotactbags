<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use DB, Str, Carbon;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email' => 'required|sometimes',
            'password' => 'required|sometimes',
            'name' => 'required|min:4|sometimes',
            'formData.value' => 'required|min:2|sometimes',
            'formData.type' => 'required|min:2|sometimes',
            'formData.min_cart_amt' => 'required|min:2|sometimes',
        ];
    }
    public function updateCustomerDetails($user)
    {
        DB::beginTransaction();
        try {
            $user->name = request('name');
            if (request('phone_verified_at') == '0' && $user->phone_verified_at) {
                $user->phone_verified_at = null;
            } else if (request('phone_verified_at') == '1' && !$user->phone_verified_at) {
                $user->phone_verified_at = Carbon::now();
            }
            if (request('dristibutor') == '0') {
                $user->dristibutor = 0;
            } else if (request('dristibutor') == '1') {
                $user->dristibutor = 1;
            }
            $user->save();
            DB::commit();
            $msg = 'Updated successfully';
            $type = 'success';
            return ['msg' => $msg, 'type' => $type];
        } catch (\Exception $e) {
            DB::rollback();
            $msg = $e->getMessage();
            $type = 'error';
            return ['msg' => $msg, 'type' => $type];
        }
    }
    public function updateCustomerAddress($userAddress)
    {
        DB::beginTransaction();
        try {
            $req = json_decode(request()->getContent(), true);
            $data = $req['formData'];
            $userAddress->addr_line1 = $data['addr_line1'];
            $userAddress->addr_line2 = $data['addr_line2'];
            $userAddress->state_id = $data['state_id'];
            $userAddress->city = $data['city'];
            $userAddress->pin = $data['pin'];
            $userAddress->save();
            DB::commit();
            $msg = 'Address Updated successfully';
            $type = 'success';
            return ['msg' => $msg, 'type' => $type];
        } catch (\Exception $e) {
            DB::rollback();
            $msg = $e->getMessage();
            $type = 'error';
            return ['msg' => $msg, 'type' => $type];
        }
    }
    public function addEditCustomerToken($token, $customer)
    {
        DB::beginTransaction();
        try {
            $token->fill(request()->all());
            $token->code = Str::random(6);
            $token->value = request()->formData['value'];
            $token->type = request()->formData['type'];
            $token->min_cart_amt = request()->formData['min_cart_amt'];
            $token->expiry_at = request()->formData['expiry_at'];
            $customer->userTokens()->save($token);
            DB::commit();
            $msg = 'Saved Successfully';
            $type = 'success';
            return ['msg' => $msg, 'type' => $type];
        } catch (\Exception $e) {
            DB::rollback();
            $msg = $e->getMessage();
            $type = 'error';
            return ['msg' => $msg, 'type' => $type];
        }
    }

    /* Swarnadeep*/
    public function addEditCustomerDiscount($customer)
    {
        DB::beginTransaction();
        try {
            $customer->dis_val = request('dis_val');
            $customer->dis_type = request('dis_type');
            $customer->save();
            DB::commit();
            $msg = 'Saved Successfully';
            $type = 'success';
            return ['msg' => $msg, 'type' => $type];
        } catch (\Exception $e) {
            DB::rollback();
            $msg = $e->getMessage();
            $type = 'error';
            return ['msg' => $msg, 'type' => $type];
        }
    }
    /* End Swarnadeep*/
}
