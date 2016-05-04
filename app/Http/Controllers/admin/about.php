<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\model\mabouts;
use Auth;
use App\Http\Requests;
use App\Http\Controllers\admin;

class about extends admin
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
         $abouts = mabouts::where('status', '=', 'active')->orderby('id', 'DESC')->paginate(10);
        return view('admin.about.index', compact('abouts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
         return view('admin.about.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\rabouts $request)
    {
        //
         $about = new mabouts();

        $about->title = $request->title;
        $about->name = $request->name;
        $about->about = $request->about;
        $about->status = 'active';
        $about->userid = Auth::user()->id;


         if($request->hasFile('picture'))
            {
                $img = $request->File('picture');
                $filename = $img->getClientOriginalName();
                $extension = $img->getClientOriginalExtension();
                $picture = sha1($filename.time()).'.'. $extension;
            }
       $about->picture = $picture;
       $about->save();

       $nid = $about->id;

       if($nid){

           if($request->hasFile('picture'))
              {
             $destinationPath = base_path().'/files/about/';
             $request->file('picture')->move($destinationPath, $picture);
             }

             return  redirect('/admin/about')->with('success_msg', 'about created successfull');
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
        $about = mabouts::find($id);
        if($about == null){
          return  redirect()->back()->with('error_msg', 'content with that id dose not exist');
        }

        return view('admin.about.show', compact('about'));
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
          $about = mabouts::find($id);
        if($about == null){
          return  redirect()->back()->with('error_msg', 'content with that id dose not exist');
        }

        return view('admin.about.edit', compact('about'));
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
        //
          $about = mabouts::find($id);
        if($about == null){
          return  redirect()->back()->with('error_msg', 'content with that id dose not exist');
        }

        $about->name = $request->input('name');
        $about->title = $request->input('title');
        $about->about = $request->input('about');
        $about->userid = $request->input('userid');

        if($request->hasFile('picture')){

            $img = $request->File('picture');
            $extension = $img->getClientOriginalExtension();
            $filename  = $img->getClientOriginalName();
            $picture = sha1($filename.time()).'.'.$extension;

            $pathtofile= base_path().'/files/about/'.$about->picture.'';
            if(file_exists($pathtofile)){

                unlink($pathtofile);
            }
           // 
            }

            // check if the picture is empty and save data and redirect with sucessfull page 
            if(empty($picture)){

                $about->save();

              return  redirect('admin/about/v/'.$about->id.'')->with('success_msg', 'about us edited successfull');

            }
            elseif ($picture) {

                   $pathtofile= base_path().'/files/about/'.$about->picture.'';
            if(file_exists($pathtofile)){

                unlink($pathtofile);
            }


                $about->picture = $picture;
                $about->save();

            if($request->hasFile('picture')){

                $path = base_path().'/files/about';
                $request->File('picture')->move($path, $picture);
            }

                 return redirect('admin/about/v/'.$about->id.'')->with('success_msg', 'about us edited successfull');


            } //elseif end herer
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
                 $about = mabouts::find($id);
        if($about == null){
          return  redirect()->back()->with('error_msg', 'content with that id dose not exist');
        }

        $pathtofile= base_path().'/files/about/'.$about->picture.'';

        if(file_exists($pathtofile)){
            unlink($pathtofile);
        }

        $about->delete();

        redirect()->back()->with('success_msg', 'about deleted successfull');

    }





}
