<?php
/**
 * Created by PhpStorm.
 * User: Huy
 * Date: 10/23/2017
 * Time: 3:39 PM
 */

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('admin.login');
    }

    public function postLogin(LoginRequest $request)
    {
        $data['email'] = $request->email;
        $data['password'] = $request->password;
        if (Auth::guard('admin')->attempt($data)) {
            return redirect(route('dashboard'));
        } else {
            return redirect()->back()->with('error', 'Email hoặc Password không chính xác');
        }
    }
}