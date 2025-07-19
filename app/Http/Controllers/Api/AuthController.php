<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\LoginRequest;
use App\Http\Requests\Api\StoreUserRequest;
use App\Models\User;
use App\Services\NetGsmService;
use App\Services\UserService;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;
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

        //$message = "Telefon doğrulama kodunuz: " . $user->phone_verification_code;
        //if (!$this->netGsmService->sendSms($user, $message)){
        //    return response()->json([
        //        "success" => "error",
        //        "message" => "SMS gönderilirken bir hata oluştu.",
        //        "data" => []
        //    ]);
        //}

        if (!$token = JWTAuth::attempt(['email' => $user->email, 'password' => $request->password])) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth('api')->factory()->getTTL() * 60,
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
                "user" => $user->refresh()
            ]
        ]);
    }

    public function login(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');
        if (!$token = JWTAuth::attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        $user = JWTAuth::user();
        $refreshToken = Str::random(60);

        Cache::put('refresh_token:' . $refreshToken, $user->id, now()->addDays(30));

        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => JWTAuth::factory()->getTTL() * 60,
            'refresh_token' => $refreshToken
        ]);
    }

    public function refreshToken(Request $request)
    {
        $refreshToken = $request->header('X-Refresh-Token');

        if (!$refreshToken) {
            return response()->json(['error' => 'Refresh token is required'], 400);
        }

        $userId = Cache::get('refresh_token:' . $refreshToken);

        if (!$userId) {
            return response()->json(['error' => 'Invalid or expired refresh token'], 401);
        }

        $user = User::find($userId);

        if (!$user) {
            return response()->json(['error' => 'User not found'], 404);
        }

        $newToken = JWTAuth::fromUser($user);

        return response()->json([
            'access_token' => $newToken,
            'token_type' => 'bearer',
            'expires_in' => JWTAuth::factory()->getTTL() * 60,
        ]);
    }

    public function logout()
    {
        try {
            JWTAuth::invalidate(JWTAuth::getToken());

            return response()->json([
                'message' => 'Çıkış başarılı.'
            ]);
        } catch (\Tymon\JWTAuth\Exceptions\JWTException $e) {
            return response()->json([
                'error' => 'Token geçersiz veya zaten çıkış yapılmış.'
            ], 401);
        }
    }
}
