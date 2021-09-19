<?php

namespace App\Http\Controllers;

use App\Mail\MailSender;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("index", [
            "posts" => Post::limit(3)
                ->latest()
                ->with("author")
                ->get(),
        ]);
    }

    public function sendMail(Request $request)
    {
        // Check honeypot (name: user_data)
        if ($request->input("user_data")) {
            return;
        }

        $request->validate([
            "fullName" => "required|string|max:80",
            "email" => "required|email|max:80",
            "tel" => "required|max:20|string",
            "content" => "required|max:2000|string",
        ]);

        Mail::to(\env("MAIL_FROM_ADDRESS", "office@travel.io"))->send(
            new MailSender(
                $request->input("fullName"),
                $request->input("email"),
                $request->input("tel"),
                $request->input("content")
            )
        );

        return \redirect(route("index") . "#contact")->with(
            "status",
            "Twój e-mail został wysłany!"
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
