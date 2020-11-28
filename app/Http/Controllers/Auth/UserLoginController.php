<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Hash;

class UserLoginController extends Controller
{
	public function index(Request $request){
		$user = User::where('email',$request->email)->first();
	//dd( Hash::check($request->password, $user->password), $user );
		if($user && Hash::check($request->password, $user->password))
		{
			session(['admin_user_id'=>$user->id]);
			$request->session()->flash('message.level', 'success');
			$request->session()->flash('message.content', 'Successfull Login');
			return redirect('blogs');
		} else {
			$request->session()->flash('message.level', 'danger');
			$request->session()->flash('message.content', 'Unauthorised User');
			return redirect('/login');
		}
	}

	public function logout()
	{
		session()->forget(['admin_user_id']);
		return redirect('/login');
	}
}
