<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\user;
use DB;
use App\Http\Requests;
use App\Http\Controllers\admin;

class home extends admin
{
    //


    public function index()
    {
        //

        return  view('admin.index');
    }

   

    public function login()
    {
        //
    }

   


    public function checklogin(Request $request)
    {
        //
    }

   

    public function myprofile($id)
    {
        //

        $user = user::find($id);
        if ($user == null) {

            return redirect()->back()->with('error_msg', 'user with that id those not exist');
        }

        return view('admin.home.myprofile', compact('user'));

    }

   

    public function editprofile($id)
    {
        //
            $user = user::find($id);
            $country = DB::table('countries')->get();
        if ($user == null) {

            return redirect()->back()->with('error_msg', 'user with that id those not exist');
        }

        return view('admin.home.editprofile', compact('user', 'country'));

    }

   


       public function updateprofile(Request $request, $id)
    {
        //
            //
            $user = user::find($id);
        if ($user == null) {

            return redirect()->back()->with('error_msg', 'user with that id those not exist');
        }


        $user->firstname = $request->input('firstname');
        $user->lastname = $request->input('lastname');
        $user->occupation = $request->input('occupation');
        $user->skills = $request->input('skills');
        $user->phone = $request->input('phone');
        $user->sex = $request->input('sex');
        $user->country = $request->input('country');
        $user->state = $request->input('state');
        $user->city = $request->input('city');

         if($request->hasFile('picture'))
           {
            $img = $request->File('picture');
             $filename = $img->getClientOriginalName();
             $extension = $img->getClientOriginalExtension();
            $picture = sha1($filename.time()).'.'.$extension;

            $oldpicture = base_path().'/user/'.$user->id.'/background/'.$user->picture.'';

            if (file_exists($oldpicture)) {
                unlink($oldpicture);
            }
              $user->picture = $picture; 
           } //end here


            if($request->hasFile('cover'))
              {
            $cover_img = $request->File('cover');
             $filename = $cover_img->getClientOriginalName();
             $extension = $cover_img->getClientOriginalExtension();
            $cover = sha1($filename.time()).'.'.$extension;

            $oldcover  = base_path().'/user/'.$user->id.'/cover/'.$user->cover_img.'';
            if (file_exists($oldcover)) {
                # code...
                unlink($oldcover);
            }
             $user->cover_image = $cover;
           } // cover image end here


            if($request->hasFile('background'))
              {
            $bg_img = $request->File('background');
             $filename = $bg_img->getClientOriginalName();
             $extension = $bg_img->getClientOriginalExtension();
            $background = sha1($filename.time()).'.'.$extension;

            $oldbackgroud = base_path().'/user/'.$user->id.'/background/'.$user->background_img.'';

            if (file_exists($oldbackgroud)) {
                # code...
                unlink($oldbackgroud);
            }
              $user->background_img = $background;
           } // old background ends here


          if ($user->save())
          {
            
             if($request->hasFile('picture'))
          {
            $destinationPath = base_path().'/files/user/'.$user->id.'/picture/';
            $request->file('picture')->move($destinationPath, $picture);
           }

            if($request->hasFile('cover'))
          {
            $destinationPath = base_path().'/files/user/'.$user->id.'/cover/';
            $request->file('cover')->move($destinationPath, $cover);
           }

            if($request->hasFile('background'))
          {
            $destinationPath = base_path().'/files/user/'.$user->id.'/background/';
            $request->file('background')->move($destinationPath, $background);
           }

          return redirect('admin/account/'.$user->id.'')->with('success_msg', 'account edited successfull ');

          }
    }


}
