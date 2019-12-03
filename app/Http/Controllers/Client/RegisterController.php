<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Mail\verifyEmail;
use App\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Modules\Client\Entities\Client;
use Session;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest:client');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:clients'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            'address' => ['required','min:5'],
            'mobile' => ['required','regex:/(98)[0-9]{8}/']
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function clientRegister(Request $request)
    {
        $this->validator($request->all())->validate();
        event(new Registered($user = $this->create($request->all())));
        Session::flash('success','Please Verify Your Email.Please Check Spam Folder if mail not received.');
        return $this->registered($request, $user)
        ?: redirect()->route('client.login');
    }

    protected function create(array $data)
    {
        $client =  Client::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'address' => $data['address'],
            'mobile' => $data['mobile'],
            'password' => Hash::make($data['password']),
            'verifyToken' => Str::random(40),
        ]);
        $thisUser = Client::findorfail($client->id);
        $this->sendEmail($thisUser);
        return $client;
    }

    
    public function sendEmail($thisUser)
    {
        Mail::to($thisUser['email'])->send(new verifyEmail($thisUser));
    }

    public function sendEmailDone($email, $verifyToken)
    {
        $client = Client::where(['email'=>$email, 'verifyToken'=>$verifyToken])->first();
        if($client){
            $clientData = Client::where(['email'=>$email, 'verifyToken'=>$verifyToken])->update(['status'=>'1','verifyToken'=>NULL]);
            Session::flash('success','Successfully Verified. Please Login To Continue.');
            return redirect()->route('frontend');
        }
        else
        {
            Session::flash('warning','User not Found.');
            return redirect()->route('frontend');
        }
    }

}
