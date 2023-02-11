<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Repository\UserRepository;

class UserController extends Controller
{
    public function view(){
        $data = UserRepository::getAllUser();
        return view('pages.index', ['data' => $data]);
    }


    public function create(Request $request){
        UserRepository::createUser($request);
        return redirect('/user');
    }

    public function delete($id){
        
        $user = User::where('id', $id)->firstorfail()->delete();
        return redirect('/user')->with(['message' => 'Successfully deleted']);
    }
    public function update(Request $request, $id){
        $user = User::where('id', $id)->firstorfail();    
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();
        return redirect('/user')->with(["success" => "Successfully updated data"]);
    }



    // QUERY BUILDER
    // public function view()
    // {
    //     $users = DB::table('users')->get();
    //     return view('pages.index', ["data" => $users]);
    // }
    // public function create(Request $request)
    // {
    //     DB::table('users')->insert([
    //         'name' => $request->input('name'),
    //         'email' => $request->input('email'),
    //         'password' => bcrypt($request->input('password')),
    //     ]);
    //     return redirect('/user')->with(["message" => "Successfully created user"]);
    // }
    // public function delete($id)
    // {
    //     DB::table('users')->where('id', $id)->delete();
    //     return redirect('/user')->with(["message" => "Successfully deleted user"]);   
    // }
    // public function update(Request $request, $id)
    // {
    //     $input = $request->only('name', 'email');
    //     DB::table('users')->where('id', $id)->update($input);
    //     return redirect('/user')->with(["message" => "Successfully update user"]);   
    // }
}
