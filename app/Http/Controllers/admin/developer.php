<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\model\mdeveloper;
use DB;
use App\Http\Requests;
use App\Http\Controllers\admin;

class developer extends admin
{
    //

     /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
          $developers = mdeveloper::where('status', '=', 'active')->orderby('id','DESC')->paginate(10);
        return view('admin.developer.index', compact('developers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //

         $country = DB::table('countries')->get();
        return view('admin.developer.create', compact('country'));
    }

    

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Requests\rdeveloper $request)
    {
        //


                     $developer = new mdeveloper();

                    $developer->firstname = $request->firstname;
                    $developer->lastname = $request->lastname;
                    $developer->position = $request->position;
                    $developer->email = $request->email;
                    $developer->skills = $request->skills;
                    $developer->about = $request->about;
                    $developer->phone = $request->phone;
                    $developer->gender = $request->gender;
                    $developer->country = $request->country;
                    $developer->state = $request->state;
                    $developer->city = $request->city;
                    $developer->status = 'active';
                    $developer->userid = $request->userid;


        
                
            if($request->hasFile('picture'))
            {
                $img = $request->File('picture');
                $filename = $img->getClientOriginalName();
                $extension = $img->getClientOriginalExtension();
                $picture = sha1($filename.time()).'.'. $extension;
            }

              if($request->hasFile('cover'))
            {
                $img = $request->File('cover');
                $filename = $img->getClientOriginalName();
                $extension = $img->getClientOriginalExtension();
                $cover = sha1($filename.time()).'.'. $extension;
            }

            $developer->picture = $picture;
            $developer->cover_image = $cover;
            $developer->save();

            if($request->hasFile('picture'))
              {
             $destinationPath = base_path().'/files/developer/picture';
             $request->file('picture')->move($destinationPath, $picture);
             }

             if($request->hasFile('cover'))
              {
             $destinationPath = base_path().'/files/developer/cover/';
             $request->file('cover')->move($destinationPath, $cover);
             }

             return  redirect('/admin/developer')->with('success_msg', 'developer created successfull');
    
            

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
        $developer = mdeveloper::find($id);

        if ($developer->id == null) {
            # code...
            return redirect()->back()->with('error_msg', 'developer with that id those not exist');
        }
         return view('admin.developer.show', compact('developer'));
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
         $developer = mdeveloper::find($id);
         $country = DB::table('countries')->get();

        if ($developer->id == null) {
            # code...
            return redirect()->back()->with('error_msg', 'developer with that id those not exist');
        }
         return view('admin.developer.edit', compact('developer', 'country'));
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
        $developer = mdeveloper::find($id);
         if ($developer->id == null) {
            # code...
            return redirect()->back()->with('error_msg', 'developer with that id those not exist');
        }

        $developer->firstname = $request->input('firstname');
        $developer->lastname = $request->input('lastname');
        $developer->position = $request->input('position');
        $developer->email = $request->input('email');
        $developer->skills = $request->input('skills');
        $developer->about = $request->input('about');
        $developer->phone = $request->input('phone');
        $developer->gender = $request->input('gender');
        $developer->country = $request->input('country');
        $developer->state = $request->input('state');
        $developer->city = $request->input('city');
        $developer->status = 'active';
        $developer->userid = $request->input('userid');



        if($request->hasFile('picture'))
            {
                $img = $request->File('picture');
                $filename = $img->getClientOriginalName();
                $extension = $img->getClientOriginalExtension();
                $picture = sha1($filename.time()).'.'. $extension;

                 $oldpicture =  base_path().'/files/developer/picture/'.$developer->picture.'';
                 if (file_exists($oldpicture)) {
                    unlink($oldpicture);
                  }
                  $developer->picture = $picture;

            }

              if($request->hasFile('cover'))
            {
                $img = $request->File('cover');
                $filename = $img->getClientOriginalName();
                $extension = $img->getClientOriginalExtension();
                $cover = sha1($filename.time()).'.'. $extension;

                $oldcover = base_path().'/files/developer/cover/'.$developer->cover_image.'';
                if (file_exists($oldcover)) {
                    unlink($oldcover);
                   }
                $developer->cover_image = $cover;
            } 
                    
               $developer->save();

            if($request->hasFile('picture'))
              {
             $destinationPath = base_path().'/files/developer/picture';
             $request->file('picture')->move($destinationPath, $picture);
             }

             if($request->hasFile('cover'))
              {
             $destinationPath = base_path().'/files/developer/cover/';
             $request->file('cover')->move($destinationPath, $cover);
             }


              return  redirect('/admin/developer/v/'.$developer->id.' ')->with('success_msg', 'developer created successfull');;
            



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
        $developer = mdeveloper::find($id);
         if ($developer->id == null) {
            # code...
            return redirect()->back()->with('error_msg', 'developer with that id those not exist');
        }


                 $oldpicture = base_path().'/files/developer/cover/'.$developer->cover_image.'';
                $oldcover =  base_path().'/files/developer/picture/'.$developer->picture.'';

                if (file_exists($oldcover)) {
                    # code...
                    unlink($oldcover);
                }

                if (file_exists($oldpicture)) {
                    # code...
                    unlink($oldpicture);
                }

                $developer->delete();

            return redirect('admin/developer')->with('success_msg', 'developer deleted successfull');


        
    }


    
}
