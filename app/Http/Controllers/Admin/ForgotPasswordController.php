<?php
/**
 * Created by PhpStorm.
 * User: Huy
 * Date: 10/23/2017
 * Time: 3:39 PM
 */

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ForgotRequest;
use Illuminate\Support\Facades\Password;

class ForgotPasswordController extends Controller
{
    public function index()
    {
        return view('admin.passwords.email');
    }

    public function sendResetLinkEmail(ForgotRequest $request)
    {
        $response = $this->broker()->sendResetLink(
            $request->only('email')
        );
        if ($response == Password::RESET_LINK_SENT) {
            return $this->sendResetLinkResponse($response);
        }
        return $this->sendResetLinkFailedResponse($request, $response);
    }

    protected function sendResetLinkResponse($response)
    {
        return back()->with('status', trans($response));
    }

    protected function sendResetLinkFailedResponse(ForgotRequest $request, $response)
    {
        return back()->withErrors(
            ['email' => trans($response)]
        );
    }

    protected function broker()
    {
        return Password::broker('admin');
    }
}
