<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PersonalCollection;

class PersonalCollectionController extends Controller
{
    private $paginate;
    private $page;

    public function __construct(Request $request)
    {
        $this->middleware('auth:api');
        $this->paginate = $request->paginate;
        $this->page     = $request->page ?? null;
    }

    public function allCollection(Request $request)
    {
        $query = PersonalCollection::paginate($this->paginate);

        return response()->json([
            'data' => $query,
        ]);
    }
}
