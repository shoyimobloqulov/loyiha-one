<?php

namespace App\Http\Controllers\Blade;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{   
    public function index() {
        return view('website.contact');
    }

    public function send(Request $request) {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email',
            'subject' => 'required|max:255',
            'desc' => 'required'
        ]);
        
        Contact::create([
            'name'      => $request->name,
            'email'     => $request->email,
            'subject'   => $request->subject,
            'desc'      => $request->desc
        ]);

        return redirect()->back();
    }
}
