<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller{

    public function register(Request $request)
    {
        //return response(['data' => $request->toArray(), 'message' => 'Account created successfully!', 'status' => true]);
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if ($validator->fails()) {
            return response(['message' => 'Validation errors', 'errors' =>  $validator->errors(), 'status' => false], 422);
        }

        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
        $user = User::create($input);

        /**Take note of this: Your user authentication access token is generated here **/
        $data['token'] =  $user->createToken('MyApp')->accessToken;
        $data['userid'] = $user->id;
        $data['name'] =  $user->name;

        return response(['data' => $data, 'message' => 'Account created successfully!', 'status' => true]);
    }
    
    public function getInfo(Request $request){
        $user = DB::table('users')->get();
        return $user;
    }

    public function logout(Request $request){
        $request->user()->token()->revoke();
        $request->user()->token()->delete();

        $response = 'You have been successfully logged out!';
        return response($response, 200);
    }

}
