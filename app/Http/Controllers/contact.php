<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\model\mcontacts;
use Mail;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class contact extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = "1";
        $contact = \App\model\msettings::find($id);
        return view('contact.index',compact('contact'));
    }


    public function store(Requests\rcontacts $request)
    {
        //
        $contact = new mcontacts();
        $contact->email = $request->email;
        $contact->firstname= $request->firstname;
        $contact->lastname= $request->lastname;
        $contact->subject = $request->subject;
        $contact->message = $request->message;
        $contact->topic = $request->topic;
        $contact->status = 'active';
        $contact->save();

        $success = $contact->id;
        if($success){

             $contactmail = mcontacts::find($success);

             Mail::send('email.thanks', ['contactmail' => $contactmail ], function($message) use ($contactmail) {

           $message->from('connect@enadoo.com', 'enadoo inc');
           $message->to($contactmail->email);
           $message->subject('thank you for contacting us');

           });

             return redirect('contact')->with('success_msg', 'thank you for contacting us, we will get back to you as soon as possible') ;
         }


    }
 
}
