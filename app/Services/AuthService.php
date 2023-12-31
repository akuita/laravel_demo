<?php

namespace App\Services;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

class AuthService extends BaseService
{
    public function __construct()
    {
    }

    public function resetPassword(array $input, string $provider)
    {
        $model = BaseService::getAuthModelFromProvider($provider);

        $authUser = $model::where('email', '=', $input['email'])->first();

        if ($authUser) {
            $authUser->sendPasswordResetNotification();
        }

        return ['success' => true];
    }

    public function verifyResetPassword(array $input, string $provider)
    {
        $model = BaseService::getAuthModelFromProvider($provider);

        $authUser = $model::where('reset_password_token', '=', $input['reset_token'])->first();

        if (! $authUser) {
            throw new BadRequestHttpException(__('passwords.token_invalid'));
        }

        $tokenExpireTime = $authUser->reset_password_sent_at->addMinute(config("auth.password.$provider.expire", 60));

        if (Carbon::now()->isAfter($tokenExpireTime)) {
            throw new BadRequestHttpException(__('passwords.token_expired'));
        }

        $authUser->fill([
            'encrypted_password' => Hash::make($input['password']),
            'reset_password_token' => null,
            'reset_password_sent_at' => null,
        ])->save();

        return ['success' => true];
    }

    public function userEmailRegistration(array $input)
    {
        $user = User::create($input['user']);
        event(new Registered($user));

        return ['id' => $user->id];
    }

    public function changePassword(array $input, string $provider)
    {
        $user = auth($provider)->user();

        if (! Hash::check($input['old_password'], $user->encrypted_password)) {
            throw new BadRequestHttpException(__('passwords.password_invalid'));
        }

        $user->fill(['encrypted_password' => Hash::make($input['new_password'])])->save();

        return ['success' => true];
    }

    public function unlock(array $input, string $provider)
    {
        $model = BaseService::getAuthModelFromProvider($provider);

        $authUser = $model::where('unlock_token', '=', $input['unlock_token'])->first();

        if (! $authUser) {
            throw new BadRequestHttpException(__('passwords.token_invalid'));
        }

        $authUser->releaseLock();

        return ['success' => true];
    }
}
