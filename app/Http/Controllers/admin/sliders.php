<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\model\msliders;
use App\model\mnews;
use App\Http\Requests;
use App\Http\Controllers\admin;

class sliders extends admin
{
    
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
         $sliders = msliders::where('status', '=', 'active')->orderby('id','DESC')->paginate(10);
        return view('admin.sliders.index', compact('sliders'));

        // return view('admin.sliders.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
         return view('admin.sliders.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\rsliders $request)
    {
        //
         $sliders = new \App\model\msliders;
        $sliders->title = $request->title;
        $sliders->userid = $request->userid;
        $sliders->name = $request->name;
        $sliders->description = $request->description;
        $sliders->status = 'active';

        if($request->hasFile('picture'))
            {
                $img = $request->File('picture');
                $filename = $img->getClientOriginalName();
                $extension = $img->getClientOriginalExtension();
                $picture = sha1($filename.time()).'.'. $extension;
            }

              if($request->hasFile('background'))
            {
                $bimg = $request->File('background');
                $bfilename = $bimg->getClientOriginalName();
                $bextension = $bimg->getClientOriginalExtension();
                $background = sha1($bfilename.time()).'.'. $bextension;
            }

            $sliders->picture = $picture;
            $sliders->background_image = $background;
            $sliders->save();

            if($sliders->id){

            if($request->hasFile('picture'))
              {
             $destinationPath = base_path().'/files/sliders/picture/';
             $request->file('picture')->move($destinationPath, $picture);
             }

             if($request->hasFile('background'))
              {
             $destinationPath = base_path().'/files/sliders/background/';
             $request->file('background')->move($destinationPath, $background);
             }

             return  redirect('/admin/sliders')->with('success_msg', 'sliders created successfull');
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
        $sliders = msliders::find($id);
        if($sliders == null){
          return  redirect()->back()->with('error_msg', 'content with that id dose not exist');
        }

        return view('admin.sliders.show', compact('sliders'));
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
          $slider = msliders::find($id);
        if($slider == null){
          return  redirect()->back()->with('error_msg', 'content with that id dose not exist');
        }

        return view('admin.sliders.edit', compact('slider'));
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
         $sliders = msliders::find($id);
        if($sliders == null){
          return  redirect()->back()->with('error_msg', 'content with that id dose not exist');
        }
        $sliders->title = $request->input('title');
        $sliders->userid = $request->input('userid');
        $sliders->name = $request->input('name');
        $sliders->description = $request->input('description');
        $sliders->status = 'active';

        $bkfile = base_path().'/files/sliders/background/'.$sliders->background_image.'';
        $picfile = base_path().'/files/sliders/picture/'.$sliders->picture.''; 

          if($request->hasFile('picture'))
            {
                $img = $request->File('picture');
                $filename = $img->getClientOriginalName();
                $extension = $img->getClientOriginalExtension();
                $picture = sha1($filename.time()).'.'. $extension;

               if($sliders->picture == null ){
                return $sliders->picture = $picture;
               }elseif (file_exists($picfile)) {
                   unlink($picfile);
               }
            }

              if($request->hasFile('background'))
            {
                $bimg = $request->File('background');
                $bfilename = $bimg->getClientOriginalName();
                $bextension = $bimg->getClientOriginalExtension();
                $background = sha1($bfilename.time()).'.'. $bextension;

                 if($sliders->background_image == null ){
                return $sliders->background_image = $background;
               }elseif (file_exists($bkfile)) {
                   unlink($bkfile);
               }
            }

            $sliders->picture = $picture;
            $sliders->background_image = $background;
            $sliders->save();

            if($sliders->id){

            if($request->hasFile('picture'))
              {
             $destinationPath = base_path().'/files/sliders/picture/';
             $request->file('picture')->move($destinationPath, $picture);
             }

             if($request->hasFile('background'))
              {
             $destinationPath = base_path().'/files/sliders/background/';
             $request->file('background')->move($destinationPath, $background);
             }

             return  redirect('/admin/sliders')->with('success_msg', 'sliders created successfull');
              
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
           $sliders = msliders::find($id);
        if($sliders == null){
          return  redirect()->back()->with('error_msg', 'content with that id dose not exist');
        }

        $bkfile = base_path().'/files/sliders/background/'.$sliders->background_image.'';
        $picfile = base_path().'/files/sliders/picture/'.$sliders->picture.''; 
    
              if($sliders->background_image == null ){
                return true;
               }elseif (file_exists($bkfile)) {
                   unlink($bkfile);
               }

                  if($sliders->picture == null ){
                return true;
               }elseif (file_exists($picfile)) {
                   unlink($picfile);
               }

        $sliders->delete();
        
        return redirect()->back()->with('success_msg', 'content deleted successfull');

    }




    
}
