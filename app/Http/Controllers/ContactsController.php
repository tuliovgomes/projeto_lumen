<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contacts;

class ContactsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }
}
