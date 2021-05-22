<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

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

        $user = User::where('email', $request->input('email'))->first();
        if ($user && Hash::check($request->input('password'), $user->password)) {
            $apiToken = base64_encode(Str::random(40));
            $user->forceFill(['api_token' => "$apiToken"]);
            $user->save();

            return response()->json(['message' => 'success','api_token' => $apiToken]);
        } else {
            return response()->json([
                'message' => 'User not found or password incorrect'
            ], 401);
        }
    }
}
