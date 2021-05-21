<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Users;

class UsersController extends Controller
{
    public function __construct()
    {
        //  $this->middleware('auth:api');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function authenticate(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required'
        ]);

        $user = Users::where('email', $request->input('email'))->first();
        if (Hash::check($request->input('password'), $user->password)) {
            $apiToken = base64_encode(str_random(40));
            $user->update(['api_token' => "$apiToken"]);

            return response()->json(['status' => 'success','api_token' => $apiToken]);
        } else {
            return response()->json(['status' => 'fail'], 401);
        }
    }
}
