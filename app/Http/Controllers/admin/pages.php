<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\model\mpages;
use App\Http\Requests;
use App\Http\Controllers\admin;

class pages extends admin
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
         $pages = mpages::where('status', '=', 'active')->orderby('id', 'ASC')->paginate(10);

         return view('admin.pages.index', compact('pages'));
         //return view('admin.pages.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
       // $category = mcategory::all();
         return view('admin.pages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\rpages $request)
    {
        //
        $pages = new mpages();

        $pages->userid = $request->userid;
         $pages->url = $request->url;
          $pages->title = $request->title;
           $pages->name = $request->name;
            $pages->content = $request->content;
             $pages->status = 'active';


              if($request->hasFile('picture'))
            {
                $logo = $request->File('picture');
                $filename = $logo->getClientOriginalName();
                $extension = $logo->getClientOriginalExtension();
                $picture = sha1($filename.time()).'.'. $extension;
                $pages->picture = $picture;

            }

             if($request->hasFile('background'))
            {
                $bg = $request->File('background');
                $filename = $bg->getClientOriginalName();
                $extension = $bg->getClientOriginalExtension();
                $background_image = sha1($filename.time()).'.'. $extension;
                $pages->background_image = $background_image;

            }

        $pages->save();

        if($pages->id){

             if($request->hasFile('picture'))
              {
             $destinationPath = base_path().'/files/page/picture/';
             $request->file('picture')->move($destinationPath, $picture);
             }

             if($request->hasFile('background'))
              {
             $destinationPath = base_path().'/files/page/background/';
             $request->file('background')->move($destinationPath, $background_image);
             }

             return  redirect('/admin/pages')->with('success_msg', 'page created successfull');

        }
              //$pages-> = $request->;
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
        $pages = mpages::find($id);
         if ($pages->id ==null ) {
             # code...
             return redirect()->back()->with('error_msg', 'page with that id dose not exist');
         }
         return view('admin.pages.show',compact('pages'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //\
         $pages = mpages::find($id);
         if ($pages->id ==null ) {
             # code...
             return redirect()->back()->with('error_msg', 'page with that id dose not exist');
         }
         return view('admin.pages.edit', compact('pages'));
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
           

         $pages = mpages::find($id);
         if ($pages->id ==null ) {
             # code...
             return redirect()->back()->with('error_msg', 'page with that id dose not exist');
         }

           $oldpicture = base_path().'/files/page/picture/'.$pages->picture.'';
             $oldbackground = base_path().'/files/page/background/'.$pages->background.'';

           $pages->userid = $request->input('userid');
         $pages->url = $request->input('url');
          $pages->title = $request->input('title');
           $pages->name = $request->input('name');
            $pages->content = $request->input('content');
             $pages->status = 'active';


              if($request->hasFile('picture'))
            {
                $logo = $request->File('picture');
                $filename = $logo->getClientOriginalName();
                $extension = $logo->getClientOriginalExtension();
                $picture = sha1($filename.time()).'.'. $extension;
            }

             if($request->hasFile('background'))
            {
                $bg = $request->File('background');
                $filename = $bg->getClientOriginalName();
                $extension = $bg->getClientOriginalExtension();
                $background = sha1($filename.time()).'.'. $extension;
            }

            if (empty($picture || $background)) {
                # code...
                $pages->save();
                return redirect('admin/pages')->with('success_msg', 'page  edited successfull');
            }
            elseif ($picture || $background) {
                # code...
             
                if ($request->hasFile('picture')) {
                    # code...
                       if (file_exists($oldpicture)) {
                    # code...
                    unlink($oldpicture);
                }
                $pages->picture = $picture;

                } // end here

                 if ($request->hasFile('background')) {

                if (file_exists($oldbackground)) {
                    # code...
                    unlink($oldbackground);
                }

                $pages->background = $background;
            }
                $pages->save();

                if($pages->id){

             $newpicture = base_path().'/files/page/picture/';
             $newbackground = base_path().'/files/page/background/';

             if($request->hasFile('picture')){

                $request->file('picture')->move($newpicture, $picture);
             }
             if ($request->hasFile('background')) {
                 # code...
                $request->file('background')->move($newbackground, $background);
             }

                }

                return redirect('admin/pages')->with('success_msg', 'page  edited successfull');

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
         $page = mpages::find($id);
         if ($page->id ==null ) {
             # code...
             return redirect()->back()->with('error_msg', 'page with that id dose not exist');
         }
             $picture = base_path().'/files/page/picture/'.$page->picture.'';
             $background = base_path().'/files/page/background/'.$page->background.'';
             
             if( file_exists($background))
             {

                unlink($background);
             } 

             if(file_exists($picture)){
                unlink($picture);
             } 

             $page->delete();

             return redirect('admin/pages')->with('success_msg', 'page  deleted successfull');
    }




}
