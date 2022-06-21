<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Auth;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    // Deposite Money function //
    public function deposite()
    {
        return view('deposite');
    }

    //User Details Function //
    public function details($id)
    {
        $id = Crypt::decryptString($id);
        echo $id;
        // $user = DB::table('user')->where('id', $id)->first();

    }

    // Store Methos //

    public function store(Request $request)
    {

        $password = Hash::make($request->password);
        return $password;

    }

    public function password_change()
    {
        return view('password_change');
    }

    // Password Update //
    public function update_password(Request $request)
    {

        $request->validate([
            'current_password'      =>  'required',
            'password'              =>  'required|min:6|max:16|string|confirmed',
            'password_confirmation' =>  'required',
        ]);

        $user = Auth::user();

        if (Hash::check($request->current_password, $user->password)) {
            
            $user->password = Hash::make($request->password); //Hashing Password from Input Field
            $user->save();
            return redirect()->back()->with('success', 'Update Successfully');

        }else {
            return redirect()->back()->with('error', 'Current password does not match');
        }

    }
}
