<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\model\mtestimonies;
use Mail;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class testimonies extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

          $testimony = mtestimonies::where('status', '=', 'active')->orderby('id', 'DESC')->paginate(10);
            return view('testimony.index', compact('testimony'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
         return view('testimony.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\rtestimonies $request)
    {
        //
         $ts = new mtestimonies();

        $ts->firstname = $request->firstname;
        $ts->lastname= $request->lastname;
        $ts->company = $request->company;
        $ts->email = $request->email;
        $ts->website = $request->website;
        $ts->position = $request->position;
        $ts->title = $request->title;
        $ts->status = 'active';
        $ts->content = $request->message;

          if($request->hasFile('picture'))
           {
            $img = $request->File('picture');
             $filename = $img->getClientOriginalName();
             $extension = $img->getClientOriginalExtension();
            $image = sha1($filename.time()).'.'.$extension;
           }

           $ts->image = $image;
           $ts->save();
          

           if($request->hasFile('picture'))
          {
            $destinationPath = base_path().'/files/testimony/';
            $request->file('picture')->move($destinationPath, $image);
           }

            $success = $ts->id;
             
           if($success)
          {
            
              return redirect('testimonies')->with('success_msg', 'thanks you for sharing  your testimony with us');
           }
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
            $testimony = mtestimonies::find($id);

        if($testimony == null ){

           return redirect()->back()->with('error_msg', 'testimony with that id dose not exist');
        }
          $testimonies = $testimony;
            return view('testimony.show', compact('testimonies'));
    }

}
