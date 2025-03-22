<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    /**
     * Show the contact form.
     */
    public function showForm()
    {
        return view('contact'); // Ensure you have a `contact.blade.php` in `resources/views`
    }

    /**
     * Handle contact form submission.
     */
    public function send(Request $request)
    {
        // Validate form data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string|min:10',
        ]);

        // Send email
        Mail::send('emails.contact', [
            'name' => $request->name,
            'email' => $request->email,
            'messageBody' => $request->message
        ], function ($mail) use ($request) {
            $mail->to('Premiumkechtours@gmail.com')
                 ->from($request->email, $request->name)
                 ->subject('Nouveau Message de Contact');
        });

        return redirect()->back()->with('success', 'Votre message a été envoyé avec succès!');
    }
}
