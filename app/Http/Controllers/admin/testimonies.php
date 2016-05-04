<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\model\mtestimonies;
use App\Http\Requests;
use App\Http\Controllers\admin;

class testimonies extends admin
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
          return view('admin.testimonies.index', compact('testimony'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.testimonies.create');
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
            
              return redirect('/admin/testimonies')->with('success_msg', 'thanks you for writing our testimony page');
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
            return view('admin.testimonies.show', compact('testimonies'));

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
             $testimony = mtestimonies::find($id);

        if($testimony == null ){

           return redirect()->back()->with('error_msg', 'testimony with that id dose not exist');
        }

            return view('admin.testimonies.edit', compact('testimony'));
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
               $testimony = mtestimonies::find($id);

        if($testimony == null ){

           return redirect()->back()->with('error_msg', 'testimony with that id dose not exist');
        }

        $ts = $testimony;

         $ts->firstname = $request->input('firstname');
        $ts->lastname= $request->input('lastname');
        $ts->company = $request->input('company');
        $ts->email = $request->input('email');
        $ts->website = $request->input('website');
        $ts->position = $request->input('position');
        $ts->title = $request->input('title');
        $ts->status = 'active';
        $ts->content = $request->input('message');
        
          if($request->hasFile('picture'))
           {
            $img = $request->File('picture');
             $filename = $img->getClientOriginalName();
             $extension = $img->getClientOriginalExtension();
            $image = sha1($filename.time()).'.'.$extension;
           }

           if (empty($image)) {
               # code...ed
            $ts->save();
            return redirect('admin');
           }
           elseif ($image) {
               # code...
            $oldpath = base_path().'/files/testimony/'.$ts->image.'';

            if (file_exists($oldpath)) {
                # code...
                unlink($oldpath);
            }

             $ts->image = $image;
             $ts->save();
          

           if($request->hasFile('picture'))
          {
            $destinationPath = base_path().'/files/testimony/';
            $request->file('picture')->move($destinationPath, $image);
           }

           return redirect('/admin/testimonies/v/'.$ts->id.'')->with('success_msg', 'testimony edited successfully ');
           }


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
              $testimony = mtestimonies::find($id);

        if($testimony == null){

           return redirect()->back()->with('error_msg', 'testimony with that id dose not exist');
        }

         $oldpath = base_path().'/files/testimony/'.$testimony->image.'';

            if (file_exists($oldpath)) {
                # code...
                unlink($oldpath);
            }

            $testimony->delete();

            return redirect('/admin/testimonies')->with('success_msg', 'testimony deleted successfully ');

    }



}
