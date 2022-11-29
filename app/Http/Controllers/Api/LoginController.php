<?php

namespace App\Http\Controllers\Api;

use App\Actions\Fortify\CreateNewUser;
use App\Actions\Fortify\UpdateUserProfileInformation;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\DeviceCredential;
use App\Models\User;
use App\Services\UploadService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpFoundation\Response;

class LoginController extends Controller
{
    public function login(Request $request)
    {

        $validation = Validator::make($request->all(), [
            'password' => 'required|string',
            'email' => 'required|exists:users,email',
        ]);

        if ($validation->fails()) {
            return $this->validationError($validation);
        }

        if (!auth()->attempt(['email' => $request->email, 'password' => $request->password])) {
            return response()->json([
                "status" => false,
                "code" => 401,
                'message' => ['Username/Mobile or password credentials do not match our records'],
            ], 401);
        }

        $user = User::where('email', $request->email)->first();
        $user->access_token = $user->createToken('AuthToken')->accessToken;
        $user->save();
        DeviceCredential::storeData($user->id);

        return $this->successResponse(new UserResource($user));
    }

    public function logout(Request $request)
    {
        $user = User::find(request()->user()->id);
        $user->update([
            'access_token' => null,
        ]);
        foreach ($user->tokens as $token) {
            $token->revoke();
        }
        return $this->successResponse('successfull logged out');
    }

    public function signup(Request  $request)
    {
        DB::beginTransaction();
        try {
            Validator::make($request->all(), [
                'referral_code' => ["nullable", "exists:users,referral_code"],
            ])->validate();
            if ($request->referalCode) {
            }
            $user = (new CreateNewUser())->create($request->all());
            $user->assignRole(['5']); //Customer

            $user->access_token = $user->createToken('AuthToken')->accessToken;
            $user->referred_by = $this->referalPart($request->referral_code);
            $user->save();
            DeviceCredential::storeData($user->id);
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

    public function profile(Request $request)
    {
        try {
            Validator::make(
                $request->all(),
                ['id' => ['required', 'exists:users,id']]
            )->validate();

            $user = User::find($request->id);
            return $this->returnResponse(new UserResource($user));
        } catch (ValidationException $exception) {
            DB::rollBack();
            return $this->validationError($exception);
        } catch (\Throwable $th) {
            DB::rollBack();
            return $this->errorResponse($th->getMessage());
        }
    }

    public function update(Request $request)
    {
        $user = User::find(request()->user()->id);
        try {
            $data =   Validator::make($request->all(), [
                'name' => ['required', 'string', 'max:255'],
                'email' => [
                    'required',
                    'string',
                    'email',
                    'max:255',
                    Rule::unique(User::class, 'email')->ignore($user->id),
                ],
                'phone' => [
                    'nullable',
                    'numeric',
                    'digits_between:10,15',
                    Rule::unique(User::class, 'phone')->ignore($user->id),
                ],
                'password' => ['required']
            ])->validate();
            if (!Hash::check(request('password'), $user->password)) {
                return response()->json(['status' => false, 'code' => 400, 'message' => 'Old password is wrong'], 400);
            }
            (new UpdateUserProfileInformation())->update($user, $request->all());

            return $this->returnResponse(new UserResource($user->refresh()));
        } catch (ValidationException $exception) {
            DB::rollBack();
            return $this->validationError($exception);
        } catch (\Throwable $th) {
            DB::rollBack();
            return $this->errorResponse($th->getMessage());
        }
    }

    private function referalPart($referalCode)
    {
        return $referalCode ?  User::firstWhere('referral_code', $referalCode)->id : null;
    }

    public function uploadProfileImage(Request $request)
    {
        $user = User::find(request()->user()->id);
        try {
            Validator::make($request->all(), [
                'image' => ['required']
            ])->validate();
            $profile =  (new UploadService())->storeBase64Image($request->image);
            $user->update(['profile' => $profile]);
            return $this->returnResponse(new UserResource($user->refresh()));
        } catch (ValidationException $exception) {
            return $this->validationError($exception);
        } catch (\Throwable $th) {
            return $this->errorResponse($th->getMessage());
        }
    }
}
