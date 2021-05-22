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

    public function allCollection()
    {
        $query = PersonalCollection::selectRaw("
                title,
                CASE type
                    WHEN 1 THEN 'Book'
                    WHEN 2 THEN 'CD'
                    ELSE 'DVD'
                END as type,
                contacts.name as borrowed_with
            ")
            ->leftjoin('contacts', 'contacts.id', 'personal_collection.contacts_id')
            ->paginate($this->paginate);

        return response()->json([
            'data' => $query,
        ]);
    }
}
