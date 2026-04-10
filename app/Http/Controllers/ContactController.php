<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact');
    }

    public function send(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string|min:10',
        ]);

        $data = $request->only('name', 'email', 'message');

        try {
            Mail::to(config('mail.from.address'))->send(new ContactMail($data));
        } catch (\Exception $e) {
            return back()
                ->withInput()
                ->with('error', 'Impossibile inviare il messaggio. Riprova più tardi.');
        }

        return back()->with('success', 'Messaggio ricevuto! Ti risponderemo al più presto.');
    }
}
