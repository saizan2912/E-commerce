<?php
namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
class UserController extends Controller
{
    public function index(){
        $users = User::get();
        return view('admin.users.index',compact('users'));
    }
    public function delete(Request $request){
        $id = $request->id;
        $user = User::find($id);
        $user->delete();
}
}