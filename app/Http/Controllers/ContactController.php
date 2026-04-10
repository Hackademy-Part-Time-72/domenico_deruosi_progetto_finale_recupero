<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;

class ContactController extends Controller
{
    public function show()
    {
        return view('contact');
    }

    public function submit(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string|min:10',
        ]);

        $data = $request->only('name', 'email', 'message');

        Mail::to('admin@mindspace.com')->send(new ContactMail($data));

        return back()->with('success', 'Grazie per averci contattato! Ti risponderemo al più presto.');
    }
}
