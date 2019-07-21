<?php

namespace App\Http\Controllers\API\V1;

use ResponseJson;
use App\User;
use App\Device;
use App\Jobs\SendWelcomSmsJob;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'phone' => 'unique:users|max:14||regex:/(09)[0-9]{9}/',
            'uu_id' => 'required',
        ]);

        if ($validator->fails()) {

            return ResponseJson::code(-1)->message($validator->errors()->first())->get();

        }

        $user = User::create([
            'phone' => $request->phone,
        ]);

        $user->sendSMS($request->uu_id);

        return ResponseJson::message('کاربر جدید بوده و کد برایش ارسال شد!')->get();

    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'phone' => 'required|regex:/(09)[0-9]{9}/',
            'uu_id' => 'required'
        ]);

        if ($validator->fails()) {

            return ResponseJson::code(-1)->message($validator->errors()->first())->get();

        }

        $user = User::where('phone', $request->phone)->first();

        if (!$user instanceof User) {

            return ResponseJson::code(-1)->message('کاربر با این شماره وجود نداشته است!')->get();

        }

        $user->sendSMS($request->uu_id);

        return ResponseJson::message('کاربر جدید بوده و کد برایش ارسال شد!')->get();

    }

    public function verificationRegister(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'code' => 'required|min:4',
            'uu_id' => 'required',
            'phone' => 'required|regex:/(09)[0-9]{9}/',
        ]);

        if ($validator->fails()) {

            return ResponseJson::code(-1)->message($validator->errors()->first())->get();
        }

        $user = User::where('phone', $request->phone)->first();

        if ($user instanceof User) {

            $check_user_code = $user->devices()->where('uu_id', $request->uu_id)
                ->where('code', $request->code)
                ->first();

            if (!is_null($check_user_code)) {

                $token = $user->createToken('MyApp')->accessToken;

                $check_user_code->update([
                    'firebase_token' => $token
                ]);

                return ResponseJson::message('کاربر کد را به درستی وارد کرده و ورود موفق')->data($token)->get();

            } else
                return ResponseJson::code(-1)->message('کد صحیح نمی باشد')->get();

        } else {
            return ResponseJson::code(-1)->message('این شماره صحبح نمی باشد')->get();

        }
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ]);

        if ($validator->fails()) {

            return ResponseJson::code(-1)->message($validator->errors()->first())->get();
        }

        $usr = Auth::user();
        $usr->name = $request->name;

        if (empty($request->phone)) {

            $usr->save();

            return ResponseJson::message('تغییر نام انجام شد')->get();

        }

        $user = User::where('phone', $request->phone)->first();

        if ($user instanceof User) {

            return ResponseJson::code(-1)->message('این شماره قبلا ثبت شده است وخطای عدم دسترسی')->get();

        }

        $old_user = User::where('phone', $usr->phone)->first();

        $old_user->sendSMSUpdate($request->uu_id, $request->phone);

        $usr->save();

        return ResponseJson::message('کد برای شما ارسال شد')->get();

    }

    public function verificationUpdate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'phone' => 'required|unique:users|regex:/(09)[0-9]{9}/',
            'uu_id' => 'required',
            'code' => 'required|max:5',
        ]);

        if ($validator->fails()) {

            return ResponseJson::code(-1)->message($validator->errors()->first())->get();

        }

        $user = Auth::user();

        $device = $user->devices()->where('uu_id', $request->uu_id)
            ->where('code', $request->code)
            ->first();

        if ($device instanceof Device) {

//            $request->user()->token()->revoke();

            $token = Auth::user()->createToken('MyApp')->accessToken;

            $device->update([
                'token' => $token
            ]);

            $user->update([
                'phone' => $request->phone
            ]);

            return ResponseJson::message('تغییرات شماره انجام شد')->data($token)->get();

        } else {

            return ResponseJson::code(-1)->message('کد صحیح نمی باشد')->get();

        }
    }

    public function logout(Request $request)
    {
        $request->user()->token()->revoke();

        return ResponseJson::message('کاربر با موفقیت از سیستم خارج شد!')->get();

    }

    public function info()
    {
        $user = Auth::user();

        return ResponseJson::message('مشخصات کاربر')->data([
            'name' => $user->name,
            'phone' => $user->phone,
        ])->get();

    }

    public function setUserName(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ]);

        if ($validator->fails()) {

            return ResponseJson::code(-1)->message($validator->errors()->first())->get();
        }

        $user = Auth::user();
        $user->name = $request->name;
        $user->save();

        SendWelcomSmsJob::dispatch(trans('messages.text', ['user' => $request->name]), $user->phone);

        return ResponseJson::message('تغییر نام کاربر')->get();
    }

}
