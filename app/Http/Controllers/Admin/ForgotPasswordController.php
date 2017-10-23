<?php
/**
 * Created by PhpStorm.
 * User: Huy
 * Date: 10/23/2017
 * Time: 3:39 PM
 */

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class ForgotPasswordController extends Controller
{
    public function index()
    {
        return view('admin.passwords.email');
    }
}
