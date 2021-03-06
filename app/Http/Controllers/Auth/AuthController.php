<?php
namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class AuthController extends Controller {
   
    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('guest', ['except' => 'logout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data) {
        
        return Validator::make($data, [
        'name' => 'required|max:25',
        'email' => 'required | email |max:255 | unique:users',
        'password' => 'required|confirmed|min:6',
        'firstname' => 'required | alpha',
	    'lastname' => 'required | alpha',
	    'sex' => 'required',
	    'marital' => 'required',
	    'dob' => 'required',
        'street' => 'required |regex:/(^[A-Za-z]+$)+/',
	    'state' => 'required | alpha',
	    'zip'  => 'required | numeric',
	    'phone' => 'required | numeric',
        'image'=>'required',
        ]);
    }
    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data) {  
	    $image = $data['image'];
        $destinationPath = 'image';
        if (!$image->move($destinationPath, $image->getClientOriginalName())) {
        
            return $this->errors(['message' => 'Error saving the file.', 'code' => 400]);
        }
        $iamge = $image->getClientOriginalName();

	    return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),          
            'firstname' => $data['firstname'],
            'midname' => $data['midname'],
            'lastname' => $data['lastname'],
            'sex' => $data['sex'],
            'marital' => $data['marital'],
            'dob' => $data['dob'],
            'street' => $data['street'],
            'city' => $data['city'],
            'state' => $data['state'],
            'zip' => $data['zip'],
            'phone' => $data['phone'],
            'offstreet' => $data['offstreet'],
            'offcity' => $data['offcity'],
            'offstate' => $data['offstate'],
            'offzip' => $data['offzip'],
            'offphone' => $data['offphone'],
            'offemail' => $data['offemail'],
            'image' => $iamge,
            'comment' => $data['comment'],
        ]);
    }
 }
