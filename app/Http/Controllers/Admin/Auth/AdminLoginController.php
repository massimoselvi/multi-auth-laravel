<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
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

    protected $redirectTo = '/admin';
    protected $redirectAfterLogout = '/admin';
    protected $guard = 'admin';
    protected $loginView = 'admin.auth.login';

    protected function guard()
    {
        return Auth::guard($this->guard);
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('admin.guest', ['except' => 'logout']);
    }

    public function showAdminLoginForm()
    {
        $view = property_exists($this, 'loginView')
        ? $this->loginView : 'auth.login';
        if (view()->exists($view)) {
            return view($view);
        }

        return view('auth.login');
    }

    public function logout()
    {

        Auth::guard($this->guard)->logout();

        return redirect(property_exists($this, 'redirectAfterLogout') ? $this->redirectAfterLogout : '/');
    }

}
