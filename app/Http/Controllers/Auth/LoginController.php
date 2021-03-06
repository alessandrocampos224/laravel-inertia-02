<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Call\Facades\Call;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Show the application's login form.
     *
     * @return \Illuminate\View\View|\Call\Response
     */
    public function showLoginForm()
    {
        return Call::render("Auth/Login")->with('form',[
            'email'=>request()->get('email'),
            'password'=>'',
            'remember'=>'no',
        ])->with('column',[
            'email'=>[
                'name' => 'email',
                'label' => 'E-Mail Address',
                'attributes' =>[
                    'type'=> 'text',
                    'id'=>'name',
                    'class'=>'form-control',
                    'placeholder'=>'E-Mail Address',
                ]
            ],
            'password'=>[
                'name' => 'password',
                'label' => 'Password',
                'attributes' =>[
                    'type'=> 'password',
                    'id'=>'password',
                    'class'=>'form-control',
                    'placeholder'=>'Password',
                ]
            ],
            'remember'=>[
                'name' => 'remember',
                'label' => 'Remember me',
                'yes'=>'yes',
                'no'=>'no',
                'attributes' =>[
                    'type'=> 'checkbox',
                    'id'=>'remember',
                ]
            ]
        ]);
    }

    public function redirectTo(){
        return Redirect::route('admin');
    }

    /**
     * The user has logged out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return mixed
     */
    protected function loggedOut(Request $request)
    {
        return Redirect::route('login');
    }

    /**
     * Send the response after the user was authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    protected function sendLoginResponse(Request $request)
    {
        $request->session()->regenerate();

        $this->clearLoginAttempts($request);

        if ($response = $this->authenticated($request, $this->guard()->user())) {
            return $response;
        }
        return $this->redirectTo();
    }
}
