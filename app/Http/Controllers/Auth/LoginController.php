<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Auth\UserFailLogin;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

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

    public function showLoginForm()
    {
        $pageConfigs = [
            'bodyClass' => "bg-body",
        ];

        return view('auth.login', [
            'pageConfigs' => $pageConfigs
        ]);
    }

    public function login(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'noabsen' => 'required|max:255',
            'password' => 'required|string|min:6'
        ]);

        if ($validator->fails()) {
            return redirect()
            ->back()
            ->withErrors($validator)
            ->withInput();
        } else {
            $data = [
                'no_absen' => $request->noabsen,
                'password' => $request->password
            ];

            $cek_permission = User::select('users.no_absen', 'role_user.role_id', 'permission_role.permission_id')
            ->leftJoin('role_user', 'users.id', '=', 'role_user.user_id')
            ->leftJoin('permission_role', 'role_user.role_id', '=', 'permission_role.role_id')
            ->where('no_absen', $request->noabsen)
            ->where('permission_id', '1078')
            ->first();

            if (!$cek_permission) {
                return redirect()->back()->withErrors(['Anda belum memiliki role untuk mengakses halaman ini. Silahkan hubungi IT'])->withInput();
            }

            //check salah input password max 3x
            $check = UserFailLogin::select(DB::raw("count(no_absen) as jumlah"))
                ->where('no_absen', $request->noabsen)
                ->groupBy('no_absen')->first();

            //cek user
            $user = User::where('no_absen', $request->noabsen)
                ->first(['name', 'alamat', 'sub_unit', 'password']);

                if($check){
                    if ((int)$check->jumlah >= 3){
                        return redirect()->back()->with('msg', 'Akun anda terblokir karena sudah gagal login sebanyak 3x. Silahkan hubungi IT');
                    }
                }

            if ($user) {

                if (Auth::attempt($data)) {
                    return redirect()->route('dashboard');
                } else {

                    //insert log
                    $ip_address = $request->ip();
                    $fail = UserFailLogin::create([
                        'no_absen'     => $request->noabsen,
                        'ip_address'   => $ip_address,
                        'created_at'   => now()
                    ]);
                    $fail->save();

                    return redirect()->back()->with('msg', 'Password salah, pastikan input dengan benar');
                }

            } else {
                return redirect()->back()->with('msg', 'Gagal, Data user tidak ditemukan');
            }
        }
    }

    public function logout(Request $request)
    {
        Session::flush();
        Auth::logout();

        $request->session()->regenerateToken();

        return redirect('login');
    }
}
