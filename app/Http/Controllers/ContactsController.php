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

    public function allContacts(Request $request)
    {
        $sort = null;
        if ($request->sort) {
            $sort = Contacts::sort()[$request->sort] ?? null;
        }

        $query = Contacts::when($sort, function ($query) use ($sort) {
                $query->orderBy($sort, 'asc');
            })
            ->paginate($this->paginate);

        return response()->json([
            'data' => $query,
        ]);
    }


    public function create(Request $request)
    {
         $this->validate($request, [
            'name'  => 'required',
            'email' => 'required|email|max:255|unique:contacts',
            'cell'  => 'required',
        ]);

        $contact = Contacts::create($request->all());

        return response()->json([
            'menssage' => 'success',
            'contact_id' => $contact->id
        ], 201);
    }

    public function update(Request $request)
    {
         $this->validate($request, [
            'contact_id' => 'required|exists:contacts,id',
            'name'       => 'required',
            'email'      => "required|unique:contacts,email,contact_id|max:255",
            'cell'       => 'required',
        ]);

        $contact = Contacts::find($request->contact_id);
        $contact->update($request->all());
        $contact->save();

        return response()->json([
            'menssage' => 'success',
        ]);
    }

    public function find(Request $request)
    {
        $this->validate($request, [
            'contact_id' => 'required|exists:contacts,id',
        ]);

        $contact = Contacts::find($request->contact_id);

        return response()->json([
            'data' => $contact,
        ]);
    }


    public function allLoansWithContact(Request $request)
    {
        $this->validate($request, [
            'contact_id' => 'required|exists:contacts,id',
        ]);

        $contact = Contacts::with('loans')->find($request->contact_id);

        return response()->json([
            'data' => $contact,
        ]);
    }
}
