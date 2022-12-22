<?php
  
namespace App\Http\Controllers\Auth;
  
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use App\User;
use App\Contact;
use Hash;
  
class AuthController extends Controller
{

    public function index()
    {
        return view('auth.login');
    }  
      

    public function registration()
    {
        return view('auth.registration');
    }
      
    public function postLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
   
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('dashboard')->withSuccess('You have Successfully logged in');
        }
        return redirect("login")->with('error', 'invalid credentials! Enter Correct Details');
    }
      
    public function postRegistration(Request $request)
    {  
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);
           
        $data = $request->all();
        $check = $this->create($data);
         
        return redirect("login")->withSuccess('Registered Successfully, Now log in');
    }
    
    public function dashboard()
    {
        if(Auth::check()){
            $user = Auth::user()['name'];
            $id = Auth::user()['id'];
            $contacts= Contact::where('user_id', $id)->orderBy('id', 'desc')->paginate(10);

            // print_r($contacts);exit;
            return view('auth.dashboard', compact('user', 'contacts'));
        }
  
        return redirect("login")->withSuccess('Opps! You do not have access');
    }
    
    public function create(array $data)
    {
      return User::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'password' => Hash::make($data['password'])
      ]);
    }
    

    public function logout() {
        Session::flush();
        Auth::logout();
  
        return Redirect('login');
    }
}