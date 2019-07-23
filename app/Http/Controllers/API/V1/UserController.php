<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Requests\User\LoginRequest;
use App\Http\Requests\User\RegisteRequest;
use App\Http\Requests\User\RegisterVerifyRequest;
use App\Http\Requests\User\SetUserNameRequest;
use App\Http\Requests\User\UpdateRequest;
use App\Http\Requests\User\UpdateVerifyRequest;
use App\Http\Requests\User\UserSuggestRequest;
use App\Suggestion;
use ResponseJson;
use App\User;
use App\Device;
use App\Jobs\SendWelcomSmsJob;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{

    public function register(RegisteRequest $request)
    {
        $user = User::create([
            'phone' => $request->phone,
        ]);

        $user->sendSMS($request->uu_id);

        return ResponseJson::message('کاربر جدید بوده و کد برایش ارسال شد!')->get();

    }

    public function login(LoginRequest $request)
    {
        $user = User::where('phone', $request->phone)->first();

        if (!$user instanceof User) {

            return ResponseJson::code(-1)->message('کاربر با این شماره وجود نداشته است!')->get();

        }

        $user->sendSMS($request->uu_id);

        return ResponseJson::message('کاربر جدید بوده و کد برایش ارسال شد!')->get();

    }

    public function verificationRegister(RegisterVerifyRequest $request)
    {
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

    public function update(UpdateRequest $request)
    {
        $usr = Auth::user();
        $usr->name = $request->name;
        $usr->gender = $request->gender;
        $usr->age = $request->age;

        if (empty($request->phone)) {

            $usr->save();

            return ResponseJson::message('ثبت اطلاعات کاربر')->get();

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

    public function verificationUpdate(UpdateVerifyRequest $request)
    {
        $user = Auth::user();

        $device = $user->devices()->where('uu_id', $request->uu_id)
            ->where('code', $request->code)
            ->first();

        if ($device instanceof Device) {

//            $request->user()->token()->revoke();

            $token = Auth::user()->createToken('MyApp')->accessToken;

            $device->update([
                'firebase_token' => $token
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
            'gender' => $user->gender,
            'age' => $user->age,
            'phone' => $user->phone,
        ])->get();

    }

    public function suggestion(UserSuggestRequest $request)
    {
        Suggestion::create([
            'user_id' => Auth::user()->id,
            'comment' => $request->comment
            ]);

        return ResponseJson::message('Success')->get();
    }

}
