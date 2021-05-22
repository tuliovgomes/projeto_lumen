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
                personal_collection.id,
                title,
                CASE type
                    WHEN 1 THEN 'Book'
                    WHEN 2 THEN 'CD'
                    ELSE 'DVD'
                END as type,
                contacts.name as borrowed_with,
                contacts.id as borrowed_id
            ")
            ->leftjoin('contacts', 'contacts.id', 'personal_collection.contacts_id')
            ->paginate($this->paginate);

        return response()->json([
            'data' => $query,
        ]);
    }

    public function types()
    {
        return response()->json([
            'data' => PersonalCollection::TYPES,
        ]);
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'title'       => 'required',
            'type'        => 'required|integer|between:1,3',
            'contacts_id' => 'exists:contacts,id',
        ]);

        $personalCollection = PersonalCollection::create($request->all());

        return response()->json([
            'menssage'               => 'success',
            'personal_collection_id' => $personalCollection->id
        ], 201);
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'personal_collection_id' => 'exists:personal_collection,id',
        ]);

        $PersonalCollection = PersonalCollection::find($request->personal_collection_id);
        $this->validate($request, [
            'type'        => "integer|between:1,3",
            'contacts_id' => 'exists:contacts,id'
        ]);

        $PersonalCollection->update($request->all());
        $PersonalCollection->save();

        return response()->json([
            'menssage' => 'success',
        ]);
    }

    public function find(Request $request)
    {
        $this->validate($request, [
            'personal_collection_id' => 'required|exists:personal_collection,id',
        ]);

        $PersonalCollection = PersonalCollection::selectRaw("
                personal_collection.id,
                title,
                CASE type
                    WHEN 1 THEN 'Book'
                    WHEN 2 THEN 'CD'
                    ELSE 'DVD'
                END as type,
                contacts.name as borrowed_with,
                contacts.id as borrowed_id
            ")
            ->leftjoin('contacts', 'contacts.id', 'personal_collection.contacts_id')
            ->where('personal_collection.id', $request->personal_collection_id)
            ->get();

        return response()->json([
            'data' => $PersonalCollection,
        ]);
    }
}
