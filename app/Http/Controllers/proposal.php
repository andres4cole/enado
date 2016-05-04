<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\model\mproposal;
use Mail;
use App\model\mcountries;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class proposal extends Controller
{
    //
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $country = mcountries::all();

        return view('proposal.index', compact('country'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\rproposal $request)
    {
        //
        $proposal = new mproposal();

        $proposal->fullname = $request->name;
        $proposal->email = $request->email;
        $proposal->company = $request->company;
        $proposal->phone = $request->phone;
        $proposal->country = $request->country;
        $proposal->website = $request->website;
        $proposal->description = $request->description;
        $proposal->proposal_type = $request->proposal_type;
        $proposal->time_frame = $request->time_frame;
        $proposal->budget = $request->budget;
        $proposal->pin = $request->pin;

        if($request->hasFile('proposal_file'))
           {
            $file = $request->File('proposal_file');
             $filename = $file->getClientOriginalName();
             $extension = $file->getClientOriginalExtension();
            $proposal_file = sha1($filename.time()).'.'.$extension;
           }

           $proposal->proposal_file = $proposal_file;
           $proposal->save();
          
            if($proposal->id){
           if($request->hasFile('proposal_file'))
          {
            $destinationPath = base_path().'/files/proposal/';
            $request->file('proposal_file')->move($destinationPath, $proposal_file);
           }
                }
            $propose = mproposal::find($proposal->id);

           Mail::send('email.proposal', ['propose' => $propose ], function($message) use ($propose){
                $message->to($propose->email);
                $message->from('proposal@enadoo.com', 'Enadoo  inc');
                $message->subject('Requested proposal from Enadoo inc');
               });

            

            return redirect('request')->with('success_msg', 'Requested proposal created succesfully');



    }


    public function sidebarproposal(Requests\rsideproposal $request)
    {
        # code...
           $proposal = new mproposal();

        $proposal->fullname = $request->name;
        $proposal->email = $request->email;
        $proposal->phone = $request->phone;
        $proposal->country = $request->country;
        $proposal->description = $request->description;
        $proposal->proposal_type = $request->proposal_type;
        $proposal->time_frame = $request->time_frame;
        $proposal->budget = $request->budget;
        $proposal->pin = $request->pin;

        if($request->hasFile('proposal_file'))
           {
            $file = $request->File('proposal_file');
             $filename = $file->getClientOriginalName();
             $extension = $file->getClientOriginalExtension();
            $proposal_file = sha1($filename.time()).'.'.$extension;

            $proposal->proposal_file = $proposal_file;
           }

           
           $proposal->save();
          
            if($proposal->id){
           if($request->hasFile('proposal_file'))
          {
            $destinationPath = base_path().'/files/proposal/';
            $request->file('proposal_file')->move($destinationPath, $proposal_file);
           }
                }
            $propose = mproposal::find($proposal->id);

           Mail::send('email.proposal', ['propose' => $propose ], function($message) use ($propose){
                $message->to($propose->email);
                $message->from('proposal@enadoo.com', 'Enadoo  inc');
                $message->subject('Requested proposal from Enadoo inc');
               });

            

            return redirect('request')->with('success_msg', 'Requested proposal created succesfully');

    }


    public function accesskey()
    {
        # code...
        return view('proposal.access');
    }


      public  function verify($pin){


      }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($token)
    {
        
   
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
