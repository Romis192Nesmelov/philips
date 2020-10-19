<?php

namespace Illuminate\Foundation\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\User;

trait RegistersUsers
{
    use RedirectsUsers;

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function getRegister()
    {
        return $this->showRegistrationForm();
    }

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {
        if (property_exists($this, 'registerView')) {
            return view($this->registerView);
        }

        return view('auth.register');
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postRegister(Request $request)
    {
        return $this->register($request);
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $user = User::where('email',$request->input('email'))->where('active',0)->first();
        if ($user) $user->delete();

        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }

        $token = str_random(32);

//        $content = view('emails.registration', ['token' => $token]);
//        $headers = 'From: register_service@philips.ru' . "\r\n".'register_service@philips.ru' . "\r\n".'X-Mailer: PHP/' . phpversion();
//        mail($request->email, 'Подтверждение регистрации', $content, $headers);

        Mail::send('auth.emails.registration', ['token' => $token], function($message) use ($request) {
            $message->subject('Подтверждение регистрации на сайте philips-shell-promo.ru');
            $message->to($request->email);
        });

        $this->create($request->all(), $token);

//        Auth::guard($this->getGuard())->login($this->create($request->all()));
//        return redirect($this->redirectPath());
        return view('auth.confirm_register');
    }

    /**
     * Get the guard to be used during registration.
     *
     * @return string|null
     */
    protected function getGuard()
    {
        return property_exists($this, 'guard') ? $this->guard : null;
    }
}
