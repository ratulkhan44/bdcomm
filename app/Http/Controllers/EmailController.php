<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Mail;

use Illuminate\Http\Request;

class EmailController extends Controller
{
    public function send()
   {
       $title = "email Send";
       $content = "This is new email";

       Mail::send('pages.admin.adduser', ['title' => $title, 'content' => $content], function ($message)
       {

           $message->from('me@gmail.com', 'Christian Nwamba');

           $message->to('chrisn@scotch.io');

       });


       return response()->json(['message' => 'Request completed']);
   }
}
