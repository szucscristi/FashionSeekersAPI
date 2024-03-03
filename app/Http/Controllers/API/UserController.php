<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use App;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public $successStatus = 200;
    /** 
     * login api 
     * 
     * @return \Illuminate\Http\Response 
     */
    /*public function login()
    {
        if (Auth::attempt(['email' => request('email'), 'password' => request('password')])) {
            $user = Auth::user();
            $user_id = $user->id;
            $user_name = $user->name;
            $success['token'] = $user->createToken('MyApp')->accessToken;
            //return response()->json(['success' => $success], $this-> successStatus);
            return response()->json(['message' => "success", 'id' => $user_id, 'name' => $user_name], $this->successStatus);
        } else {
            //return response()->json(['error'=>'Unauthorised'], 401);
            return response()->json(['message' => "error"], 401);
        }
    }*/
    public function login(Request $request)
    {
        $login_credentials = [
            'email' => $request->login['email'],
            'password' => $request->login['password'],
        ];

        if (auth()->attempt($login_credentials)) {
            // Generate the token for the user
            $user_login_token = auth()->user()->createToken('App')->accessToken;

            // Get additional user information if needed
            $user = auth()->user();

            

            // Return the token and user information
            return response()->json([
                'token' => $user_login_token,
                'id' => $user->id,
                'name' => $user->name,
                // Add any other user-related information here
            ], 200);
        } else {
            // Wrong login credentials, return error code 401
            return response()->json(['error' => 'UnAuthorised Access'], 401);
        }
    }
    /** 
     * Register api 
     * 
     * @return \Illuminate\Http\Response 
     */
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'c_password' => 'required|same:password',
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }
        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        $success['token'] =  $user->createToken('App')->accessToken;
        $success['name'] =  $user->name;
        return response()->json(['success' => $success], $this->successStatus);
    }
    /** 
     * details api 
     * 
     * @return \Illuminate\Http\Response 
     */
    public function details()
    {
        $user = Auth::user();
        return response()->json(['success' => $user], $this->successStatus);
    }
    public function logout()
    {
        $user = Auth::user();
        echo 'baaaaaaaaaaa';
        print_r($user);
        exit;
        $user->revoke();

        return response()->json([
            'message' => 'Successfully logged out'
        ], 200);
    }
}
