<?php

namespace App\Http\Controllers;

use App\Http\Requests\Users\CreateUserRequest;
use App\Http\Requests\Users\ForgotPasswordRequest;
use App\Http\Requests\Users\LoginRequest;
use App\Http\Requests\Users\ResetPasswordRequest;
use App\Http\Requests\Users\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;
use Src\Users\Actions\CreateUserAction;
use Src\Users\Actions\ForgotPasswordAction;
use Src\Users\Actions\LoginAction;
use Src\Users\Actions\RemoveUserAction;
use Src\Users\Actions\ResetPasswordAction;
use Src\Users\Actions\UpdateUserAction;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{
    /**
     * @throws UnknownProperties
     */
    public function create(CreateUserAction $action, CreateUserRequest $request): JsonResponse
    {
        return new JsonResponse(data: $action($request->toDto()), status: Response::HTTP_OK);
    }

    /**
     * @throws UnknownProperties
     */
    public function update(User $user, UpdateUserAction $action, UpdateUserRequest $request): JsonResponse
    {
        return new JsonResponse(data: $action($user, $request->toDto()), status: Response::HTTP_OK);
    }

    public function remove(User $user, RemoveUserAction $action): JsonResponse
    {
        return new JsonResponse(data: $action($user), status: Response::HTTP_OK);
    }

    /**
     * @throws UnknownProperties
     */
    public function forgotPassword(ForgotPasswordRequest $request, ForgotPasswordAction $action): JsonResponse
    {
        $action($request->toDto());
        return new JsonResponse(status: Response::HTTP_OK);
    }

    /**
     * @throws UnknownProperties
     */
    public function resetPassword(ResetPasswordRequest $request, ResetPasswordAction $action): JsonResponse
    {
        $action($request->toDto());
        return new JsonResponse(status: Response::HTTP_OK);
    }

    /**
     * @throws UnknownProperties
     */
    public function login(LoginRequest $request, LoginAction $action): JsonResponse
    {
        return new JsonResponse(data: $action($request->toDto()), status: Response::HTTP_OK);
    }

    public function logout(): JsonResponse
    {
        auth('api')->logout();
        return new JsonResponse(status: Response::HTTP_OK);
    }
}
