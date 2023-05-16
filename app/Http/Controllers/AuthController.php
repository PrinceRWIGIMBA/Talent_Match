<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Traits\HttpResponses;
use App\Http\Requests\storeUserRequest;
use App\Http\Requests\loginUserRequest;

use App\Http\Controllers\Controller;
use App\Models\User;






class AuthController extends Controller
{
        /**
     * @OA\Post(
     *     path="/api/login",
     *    operationId="LOGIN_ID",
*      tags={"Authentication API"},
*      summary="LOGIN",
*      description="LOGIN THE USER FROM DATABASE",
        *@OA\RequestBody(
    *          required=true,
    *          @OA\JsonContent()
    *      ),
     *     @OA\Response(
     *         response="200",
     *         description="The data"
     *     )
     * )
     */
    use HttpResponses;
    public function login(loginUserRequest $request){

        $request->validated($request->all());
        if(!Auth::attempt($request->only('email','password'))){
            return $this->error('','credential do not match',401);
        } 
         $user=User::where('email',$request->email)->first();

        return $this->success([
            'user'=>$user,
            'token'=>$user->createToken('API Token of'.$user->name)->plainTextToken 
        ]);
         
    }

      /**
     * @OA\Post(
     *     path="/api/register",
     *    operationId="REGISTER_ID",
*      tags={"Authentication API"},
*      summary="REGISTER USER",
*      description="REGISTER USER TO THE USERS FROM DATABASE",
* @OA\RequestBody(
    *          required=true,
    *          @OA\JsonContent()
    *      ),
     *     @OA\Response(
     *         response="200",
     *         description="The data"
     *     )
     * )
     */

    public function register(storeUserRequest $request){

        $request->validated($request->all());
        $user=User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'role'=>$request->role,
            'password'=>Hash::make($request->password),
             
        ]);
        return $this->success([
            'user'=>$user,
            'token'=>$user->createToken('API Token of'.$user->name)->plainTextToken
        ]);
    }

      /**
     * @OA\Post(
     *     path="/api/logout",
     *    operationId="LOGOUT_ID",
*      tags={"Authentication API"},
*      summary="GET ALL USER",
*      description="DELETE USER FROM DATABASE",
* @OA\RequestBody(
    *          required=true,
    *          @OA\JsonContent()
    *      ),
     *     @OA\Response(
     *         response="200",
     *         description="The data"
     *     )
     * )
     */
    public function logout(){
        Auth::User()->currentAccessToken()->delete();
        return $this->success([

            'message'=>'you are successfully been logged out and token has been deleted'
        ]);

    }
/**
* @OA\Get(
*      path="/api/getAllUser",
*      operationId="GETALLUSER_ID",
*      tags={"Authentication API"},
*      summary="GET ALL USER",
*      description="GETING ALL THE USERS FROM DATABASE",
*      @OA\Response(
*          response=200,
*          description="the data",
*       ),
*     )
*/

function getAllUser(){
    $users=User::all();

    return responce()->json($user);
}
//this is not used this time
//but you can try it if you want
}
