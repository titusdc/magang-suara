<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        //validate form
        $request->validate([
            'name'         => 'required',
            'email'        => 'required',
            'subject'      => 'required',
            'massege'      => 'required'
        ]);

        //upload image
        Contact::create([
            'name'         => $request->name,
            'email'        => $request->email,
            'subject'      => $request->subject,
            'massege'      => $request->massege
        ]);

        //redirect to index
        return redirect()->back()->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function index()
    {
        $contacts = Contact::latest()->paginate(10);

        return view("contact.index", compact('contacts'));
    }
    
    public function show(string $id)
    {
        //get product by ID
        $contacts = Contact::findOrFail($id);

        //render view with product
        return view('contact.show', compact('contacts'));
    }

    public function destroy($id)
    {
        $contacts   = Contact::findOrFail($id);

        $contacts->delete();

        return redirect()->route('contact.index')->with(['success' => 'data berhasil di hapus!']);
    }
}
