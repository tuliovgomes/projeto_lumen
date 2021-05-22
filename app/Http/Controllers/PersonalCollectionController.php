<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PersonalCollection;

class PersonalCollectionController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api');
    }
}
