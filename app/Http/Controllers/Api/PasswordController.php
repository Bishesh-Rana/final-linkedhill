<?php

namespace App\Http\Controllers\Api;

use App\Actions\Fortify\LogoutUser;
use App\Actions\Fortify\ResetUserPassword;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Notifications\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class PasswordController extends Controller
{
    public function changePassword(Request $request)
    {

        $user = User::find(request()->user()->id);
        DB::beginTransaction();
        try {
            $this->validate($request, [
                'old_password' => ['required'],
                'password' => ['required', 'different:old_password'],

            ]);
            if (!Hash::check($request->old_password, $user->password)) {
                throw ValidationException::withMessages([
                    'old_password' => ['password didn\'t match with old password'],
                ]);
            }
            (new ResetUserPassword())->reset($user, $request->all());
            //deleting access token .i.e Loggin out the user

            (new LogoutUser())->logout($user);
            DB::commit();
            return $this->returnResponse(new UserResource($user->refresh()));
        } catch (ValidationException $exception) {
            DB::rollBack();
            return $this->validationError($exception);
        } catch (\Throwable $th) {
            DB::rollBack();
            return $this->errorResponse($th->getMessage());
        }
    }
    public function resetPassword(Request $request)
    {
        try {
            $this->validate($request, [
                'email' => ['required', 'exists:users,email'],
            ]);
            $user =  user::where('email', $request->email)->first();
            $user->update(['otp' => $code = Str::random(6)]);
            $user->notify(new PasswordReset($code));
            return $this->successResponse('password reset', 'password reset link sent to your email');
        } catch (ValidationException $exception) {
            DB::rollBack();
            return $this->validationError($exception);
        } catch (\Throwable $th) {
            DB::rollBack();
            return $this->errorResponse($th->getMessage());
        }
    }
}
