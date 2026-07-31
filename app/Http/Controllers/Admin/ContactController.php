<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = ContactMessage::all();
        
        return view('admin.contacts.index', [
            'contacts' => $contacts
        ]);
    }

    public function destroy(ContactMessage $contact)
    {
        $contact->delete();

        return redirect()
            ->route('admin.contacts.index')
            ->with('success', 'Message deleted successfully!');
    }
}