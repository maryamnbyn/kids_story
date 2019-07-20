<?php

namespace App\Http\Controllers\API\V1;

use App\Device;
use App\Jobs\SendWelcomSmsJob;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\User;


class UserController extends Controller
{
    private $successStatus = 1;
    private $failedStatus = -1;
    private $successUpdate = 2;

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'phone' => 'unique:users|max:14||regex:/(09)[0-9]{9}/',
            'uu_id' => 'required',
        ]);

        if ($validator->fails()) {

            return Response()->json([
                'code' => $this->failedStatus,
                'message' => $validator->errors()->first()
            ]);
        }

        $user = User::create([
            'phone' => $request->phone,
        ]);

        $user->sendSMS($request->uu_id);

        return response()->json([
            'code' => $this->successStatus,
            'message' => 'کاربر جدید بوده و کد برایش ارسال شد!',
        ]);
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'phone' => 'required|regex:/(09)[0-9]{9}/',
            'uu_id' => 'required'
        ]);

        if ($validator->fails()) {

            return Response()->json([
                'code' => $this->failedStatus,
                'message' => $validator->errors()->first()
            ]);
        }

        $user = User::where('phone', $request->phone)->first();

        if (!$user instanceof User) {

            return Response()->json([
                'code' => $this->failedStatus,
                'message' => 'کاربر با این شماره وجود نداشته است!',
            ]);
        }

        $user->sendSMS($request->uu_id);

        return response()->json([
            'code' => $this->successStatus,
            'message' => 'کد جدید برایش ارسال شد!',
        ]);

    }

    public function verificationRegister(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'code' => 'required|min:4',
            'uu_id' => 'required',
            'phone' => 'required|regex:/(09)[0-9]{9}/',
        ]);

        if ($validator->fails()) {

            return Response()->json([
                'code' => $this->failedStatus,
                'message' => $validator->errors()->first()
            ]);
        }

        $user = User::where('phone', $request->phone)->first();

        if ($user instanceof User) {

            $check_user_code = $user->devices()->where('uu_id', $request->uu_id)
                ->where('code', $request->code)
                ->first();

            if (!is_null($check_user_code)) {

                $token = $user->createToken('MyApp')->accessToken;

                $check_user_code->update([
                    'token' => $token
                ]);

                SendWelcomSmsJob::dispatch(trans('messages.text'), $user->phone);

                return Response()->json([
                    'code' => $this->successStatus,
                    'message' => 'کاربر کد را به درستی وارد کرده و ورود موفق',
                    'data' => $token,
                ]);

            } else

                return Response()->json([
                    'code' => $this->failedStatus,
                    'message' => 'کد صحیح نمی باشد',
                ]);
        } else {

            return Response()->json([
                'code' => $this->failedStatus,
                'message' => 'این شماره صحبح نمی باشد',
            ]);
        }
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ]);

        if ($validator->fails()) {

            return Response()->json([
                'code' => $this->failedStatus,
                'message' => $validator->errors()->first()
            ]);
        }
        $usr = Auth::user();
        $usr->name = $request->name;

        if (empty($request->phone)) {

            $usr->save();

            return Response()->json([
                'code' => $this->successStatus,
                'message' => 'تغییر نام انجام شد',
            ]);
        }

        $user = User::where('phone', $request->phone)->first();

        if ($user instanceof User) {

            return Response()->json([
                'code' => $this->failedStatus,
                'message' => 'این شماره قبلا ثبت شده است وخطای عدم دسترسی',
            ]);
        }

        $old_user = User::where('phone', $usr->phone)->first();

        $old_user->sendSMSUpdate($request->uu_id, $request->phone);

        $usr->save();

        return Response()->json([

            'code' => $this->successUpdate,
            'message' => 'کد برای شما ارسال شد',
        ]);
    }

    public function verificationUpdate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'phone' => 'required|unique:users|regex:/(09)[0-9]{9}/',
            'uu_id' => 'required',
            'code' => 'required|max:5',
        ]);

        if ($validator->fails()) {

            return Response()->json([
                'code' => $this->failedStatus,
                'message' => $validator->errors()->first()
            ]);
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

            return Response()->json([
                'code' => $this->successStatus,
                'message' => 'تغییرات شماره انجام شد',
                'data' => $token

            ]);

        } else {

            return Response()->json([
                'code' => $this->failedStatus,
                'message' => 'کد صحیح نمی باشد',
            ]);
        }
    }
}
