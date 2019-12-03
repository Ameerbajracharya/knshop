<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Validation\ValidationException;
use Modules\Client\Entities\Client;
use Session;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/client';

    /**
     * Create a new controller instance.
     *
     * @return void
     */ 
    public function __construct()
    {
        $this->middleware('guest:client')->except('clientLogout');
    }

     /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return \Illuminate\Http\Response
     */
     public function redirectToProvider($service)
     {
        return Socialite::driver($service)->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback($service)
    {
        $user = Socialite::driver($service)->stateless()->user();
        $data['client'] = Client::where('social_id', $user->getId())->orWhere('email',$user->getEmail())->first(); 
        if($data['client'])
        {
            Auth('client')->login($data['client']);
            Session::flash('success','Welcome Back'.'-'.$data['client']->name);
            return redirect()->route('client');
        }
        else
        {
            $data['client'] = new Client;
            $data['client']->name = $user->getName();
            $data['client']->email = $user->getEmail();
            $data['client']->social_id = $user->getId();
            if($user->getAvatar()){
                $data['client']->avatar = $user->getAvatar();
            }
            $data['client']->status = 1;
            $data['client']->password = bcrypt($data['client']->social_id);
            $data['client']->save();
            Auth('client')->login($data['client']);
            Session::flash('success','Welcome To KN_Shop'.'-'.$data['client']->name);
            return redirect()->route('client');
        }
    }

    /**
     * Handle a login request to the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Http\JsonResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function clientLogin(Request $request)
    {
        $this->validateLogin($request);
        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);
            return $this->sendLockoutResponse($request);
        }
        $auth = Auth::guard('client')->attempt([
            'email' =>$request->email,
            'password' => $request->password,
            'status'=>1,
        ],
        $request->remember
    );
        if($auth){
            Session::flash('success','Welcome to KN-Shop');
            return Redirect::to($request->backlink);  

        }
        else{
            Session::flash('warning','Email or Password error.');
            return redirect()
            ->back()
            ->withInput($request->only('email','remember'));
        }


    }
    protected function validateLogin(Request $request)
    {
        $request->validate([
            $this->username() => 'required|string',
            'password' => 'required|string',
        ]);
    }
    protected function attemptLogin(Request $request)
    {
        return $this->guard()->attempt(
            $this->credentials($request), $request->filled('remember')
        );
    }

    protected function sendLoginResponse(Request $request)
    {
        $request->session()->regenerate();

        $this->clearLoginAttempts($request);

        return $this->authenticated($request, $this->guard()->user())
        ?: redirect()->intended($this->redirectPath());
    }
    protected function sendFailedLoginResponse(Request $request)
    {
        throw ValidationException::withMessages([
            $this->username() => [trans('auth.failed')],
        ]);
    }
    public function clientLogout()
    {
        Auth::guard('client')->logout();
        Session::flash('success','Thank you');
        return redirect()->route('frontend');
    }
     /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
     protected function guard()
     {
        return Auth::guard('client');
    }

}
