<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contacts;

class ContactsController extends Controller
{
    private $paginate;
    private $page;

    public function __construct(Request $request)
    {
        $this->middleware('auth:api');
        $this->paginate = $request->paginate;
        $this->page     = $request->page ?? null;
    }

    public function allContacts()
    {
        $query = Contacts::paginate($this->paginate);

        return response()->json([
            'data' => $query,
        ]);
    }
}
