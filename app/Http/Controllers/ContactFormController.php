<?php

namespace App\Http\Controllers;
use App\Mail\ContactFormMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactFormController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        // Check honeypot (name: user_data)
        if ($request->input("user_data")) {
            abort(403);
        }

        $request->validate([
            "fullName" => "required|string|max:80",
            "email" => "required|email|max:80",
            "tel" => "required|max:20|string",
            "content" => "required|max:2000|string",
        ]);

        Mail::to(\env("MAIL_FROM_ADDRESS", "office@travel.io"))->send(
            new ContactFormMail(
                $request->input("fullName"),
                $request->input("email"),
                $request->input("tel"),
                $request->input("content")
            )
        );

        return \redirect(route("index") . "#kontakt")->with(
            "status",
            "Twój e-mail został wysłany!"
        );
    }
}
