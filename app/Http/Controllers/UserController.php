<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use App\User;

class UserController extends CodeController
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex(Request $request)
    {
        $this->settingsForm = view('auth.settings', [
            'head' => 'НАСТРОЙКИ',
            'action' => url('/user/validate-user')
        ]);
        return $this->showView();
    }

    public function postValidateUser(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email|max:255',
            'password' => 'min:6|confirmed',
        ]);
        $fields = $request->except('_token');
        if (!$fields['password']) {
            unset($fields['password']);
        } else {
            $fields['password'] = bcrypt($fields['password']);
        }

        User::find(Auth::user()->id)->update($fields);
        return redirect(url('/home'));
    }
}
