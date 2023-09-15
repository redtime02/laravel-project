<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(){
        return view('frontend.users.profile');
    }

    public function updateUserDetails(Request $request){
        $request->validate([
            'username' => ['required','string'],
            'phone' => ['required','digits:10'],
            'pincode' => ['required','digits:6'],
            'address' => ['required','string','max:500']
        ]);
        $user = User::findOrFail(Auth::user()->id);
        $user->update([
            'name' => $request->username
        ]);
        $user->userDetail()->updateOrCreate(
            [
                'user_id' => $user->id
            ],
            [
                'phone' => $request->phone,
                'pincode' => $request->pincode,
                'address' => $request->address,
            ]
        );

        return redirect()->back()->with('message','Cập nhật tài khoản thành công');
    }

    public function passwordCreate(){
        return view('frontend.users.change-password');
    }

    public function changePassword(Request $request){
        $request->validate([
            'current_password' => ['required','string','min:8'],
            'password' => ['required', 'string', 'min:8', 'confirmed']
        ]);

        $currentPasswordStatus = Hash::check($request->current_password, auth()->user()->password);
        if($currentPasswordStatus){

            User::findOrFail(Auth::user()->id)->update([
                'password' => Hash::make($request->password),
            ]);

            return redirect()->back()->with('message','Cập nhật mật khẩu thành công');

        }else{

            return redirect()->back()->with('message2','Mật khẩu hiện tại vừa nhập không đúng');
        }
    }
}
