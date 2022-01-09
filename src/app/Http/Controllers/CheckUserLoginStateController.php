<?php declare (strict_types = 1);

namespace App\Http\Controllers;

use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\JsonResponse;

final class CheckUserLoginStateController extends Controller
{
    public function __invoke(): JsonResponse
    {
        if (Auth::check()) {
            return new JsonResponse(['message' => 'ログイン中です']);
        }
        return new Exception('ログインしていません');
    }
}
