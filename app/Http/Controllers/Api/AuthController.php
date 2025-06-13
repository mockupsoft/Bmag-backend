<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\LoginRequest;
use App\Http\Requests\Api\StoreUserRequest;
use App\Services\NetGsmService;
use App\Services\UserService;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    private UserService $userService;
    private NetGsmService $netGsmService;

    /**
     * @param UserService $userService
     * @param NetGsmService $netGsmService
     */
    public function __construct(UserService $userService, NetGsmService $netGsmService)
    {
        $this->userService = $userService;
        $this->netGsmService = $netGsmService;
    }

    public function register(StoreUserRequest $request)
    {
        $user = $this->userService->create($request->all());

        $message = "Telefon doğrulama kodunuz: " . $user->phone_verification_code;

        if (!$this->netGsmService->sendSms($user, $message)){
            return response()->json([
                "success" => "error",
                "message" => "SMS gönderilirken bir hata oluştu.",
                "data" => []
            ]);
        }

        return response()->json([
            "status" => "success",
            "message" => "SMS doğrulama kodu gönderildi.",
            "data" => [
                'user_id' => $user->id
            ]
        ]);
    }

    public function checkVerificationCode(Request $request)
    {
        $user = $this->userService->getUserById($request->user_id);

        if (!$user) {
            return response()->json([
                "status" => "error",
                "message" => "Kullanıcı bulunamadı.",
            ], 404);
        }

        if ($user->phone_verification_code != $request->verification_code) {
            return response()->json([
                "status" => "error",
                "message" => "Doğrulama kodu geçersiz.",
            ], 401);
        }

        $userActivate = $this->userService->userActive($user);
        if (!$userActivate){
            return response()->json([
                "status" => "success",
                "message" => "Kullanıcı doğrulama sırasında bir hata oluştu."
            ]);
        }

        return response()->json([
            "success" => "success",
            "message" => "Kullanıcı aktif edildi",
            "data" => [
                "user" => $user
            ]
        ]);
    }

    public function login(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');

        if (!$token = JWTAuth::attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth('api')->factory()->getTTL() * 60,
        ]);
    }

    public function refreshToken()
    {
        $newToken = JWTAuth::parseToken()->refresh();

        return response()->json([
            'access_token' => $newToken,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ]);
    }
}
