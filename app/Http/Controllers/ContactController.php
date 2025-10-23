<?php
// app/Http/Controllers/ContactController.php
namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index() {
        $contacts = Contact::orderBy('created_at', 'desc')->get();
        return view('admin.contacts.index', compact('contacts'));
    }


    public function store(Request $request) {
        $contact = Contact::create($request->all());
        return response()->json(['message' => 'Message envoyé', 'contact' => $contact], 201);
    }

    public function show($id) {
        return Contact::findOrFail($id);
    }

    public function markAsRead($id) {
        $contact = Contact::findOrFail($id);
        $contact->update(['read' => true]);
        return response()->json(['message' => 'Message marqué comme lu']);
    }

    public function destroy($id) {
        Contact::findOrFail($id)->delete();
        return response()->json(['message' => 'Message supprimé']);
    }
}
