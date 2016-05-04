<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\model\mcontacts;
use Mail;
use App\Http\Requests;
use App\Http\Controllers\admin;

class contact extends admin
{
    //
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
           $contacts = mcontacts::orderby('id', 'DESC')->paginate(10);
         return view('admin.contact.index', compact('contacts'));
    }

 public function reply($id)
 {
     # code...
        $reply = mcontacts::find($id);
          if($reply == null ){
            return redirect()->back()->with('error_msg', 'contact with that id dose not exist');
          }
          if($reply->status == 'unread'){
          
          $reply->status = "read";
          $reply->save();
          }

        return view('admin.contact.reply', compact('reply'));
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
              $cont = $request->all();


            Mail::send('email.contact.reply', ['cont' => $cont], function($message) use ($cont){

                $message->from('connet@BeninTimes.com', 'Benin Times Media');
                $message->to($cont->email);
                $message->subject('thanks for contacting us');
            });

            return redirect('admin/contact')->with('success_msg', 'email reply successfull');
    
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
        $contact = mcontacts::find($id);

        if($contact->id == null ){
             return redirect()->back()->with('error_msg', 'contact with that id dose not exist');
        }
           
          if($contact->status == 'unread'){
          
          $contact->status = "read";
          $contact->save();
          }
        return view('admin.contact.show', compact('contact'));
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
          $contact = mcontacts::find($id);

        if($contact->id == null ){
             return redirect()->back()->with('error_msg', 'contact with that id dose not exist');
        }

        $contact->delete();
        return redirect('admin/contact')->with('success_msg', 'contact deleted successfull');

    }


}
