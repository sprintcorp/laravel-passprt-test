<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegistrationRequest;
use App\Http\Traits\ApiResponse;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    use ApiResponse;
    /**
     * Register api
     *
     * @return \Illuminate\Http\Response
     */
    public function register(RegistrationRequest $request)
    {
        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        $user['token'] =  $user->createToken($request->email)->accessToken;
        return $this->successResponse('User register successfully.',$user,201);
    }

    /**
     * Login api
     *
     * @return \Illuminate\Http\Response
     */
    public function login(LoginRequest $request)
    {
        $user = User::where('email', $request->username)->orWhere('phone',$request->username)->first();
        if(!$user || !Hash::check($request->password,$user->password)){
            throw ValidationException::withMessages([
                'message' => ['invalid login credentials']
            ]);
        }
        $user['token'] =  $user->createToken($request->username)->accessToken;
         return $this->successResponse('user login successful',$user);
    }



    /**
     * This method returns authenticated user details
     */
    public function authenticatedUserDetails(){
        return $this->dataResponse(auth()->user());
    }
}
