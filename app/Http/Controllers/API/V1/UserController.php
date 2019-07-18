<?php

namespace App\Http\Controllers\API\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\User;


class UserController extends Controller
{
    private $successStatus = 1;
    private $failedStatus = -1;

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

        $user->sendSMS($request->name,$request->uu_id);

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

}
