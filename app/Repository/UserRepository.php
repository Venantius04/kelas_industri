<?php

namespace App\Repository;
use Validator;
use App\Models\User;

class UserRepository{
    public static function createUser($request){
        $validaton = Validator::make($request->all(), [
            "name" => 'required',
            "password" => 'required',
            "email" => 'required',
        ]);
        if($validaton->fails()){
            return redirect()->back()->withErrors($validaton->errors());
        }
        $input = $request->only('name', 'email');
        $input['password'] = bcrypt($request->password);
        User::create($input);
     }

     public static function getAllUser(){
        $data = User::all();
        return $data;
     }
}