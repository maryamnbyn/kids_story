<?php

namespace App\Http\Controllers\API\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\User;
use Ipecompany\Smsirlaravel\Smsirlaravel;

class UserController extends Controller
{
    private $successStatus = 1;
    private $failedStatus = -1;

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'phone' => 'unique:users|max:14|regex:/(09)[0-9]{9}/',
        ]);
        if ($validator->fails()) {

            return Response()->json([
                'code' => $this->failedStatus,
                'message' => $validator->errors()->first()
            ]);
        }

        $user = User::create($request->all());

        $user->sendSMS();

        return response()->json([
            'code' => $this->successStatus,
            'message' => 'کاربر جدید بوده و کد برایش ارسال شد!',
        ]);
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'phone' => 'required|regex:/(09)[0-9]{9}/',
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

        $user->sendSMS();

        return response()->json([
            'code' => $this->successStatus,
            'message' => 'کد جدید برایش ارسال شد!',
        ]);

    }

}
