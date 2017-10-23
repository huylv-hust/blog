<?php
/**
 * Created by PhpStorm.
 * User: Huy
 * Date: 10/23/2017
 * Time: 3:39 PM
 */

namespace App\Http\Controllers\Admin;

use App\Admin;
use App\Http\Requests\RegisterRequest;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{

    public function index()
    {
        return view('admin.register');
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(RegisterRequest $request, Admin $admin)
    {
        $data = $request->all();
        $data['password'] = bcrypt($request->password);
        //save
        if ($user = $admin->create($data)) {
            Auth::guard('admin')->login($user);
            return redirect(route('dashboard'));
        } else {
            return redirect()->back()->with('error', 'Có lỗi xảy ra, xin hãy thử lại!');
        }
    }
}
