<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\model\msettings;
use Auth;
use App\Http\Requests;
use App\Http\Controllers\admin;

class settings extends admin
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
           $settings = msettings::where('status', '=', 'active')->orderby('id', 'ASC')->paginate(10);

         return view('admin.settings.index', compact('settings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
         return view('admin.settings.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\rsettings $request)
    {
        //
         $setting = new msettings();

        $setting->title = $request->title;
        $setting->name = $request->name;
        $setting->description = $request->description;
        $setting->address = $request->address;
        $setting->type = $request->type;
        $setting->email = $request->email;
        $setting->fax = $request->fax;
        $setting->phone = $request->phone;
        $setting->facebook = $request->facebook;
        $setting->twitter = $request->twitter;
        $setting->google = $request->google;
        $setting->status = "active";

         if($request->hasFile('logo'))
            {
                $logo = $request->File('logo');
                $filename = $logo->getClientOriginalName();
                $extension = $logo->getClientOriginalExtension();
                $logos = sha1($filename.time()).'.'. $extension;
            }

             if($request->hasFile('background'))
            {
                $bg = $request->File('background');
                $filename = $bg->getClientOriginalName();
                $extension = $bg->getClientOriginalExtension();
                $background_image = sha1($filename.time()).'.'. $extension;
            }

            $setting->logo = $logos;
            $setting->background_image = $background_image;
            $setting->save();

        if($setting->id){

             if($request->hasFile('logo'))
              {
             $destinationPath = base_path().'/files/setting/logo/';
             $request->file('logo')->move($destinationPath, $logos);
             }

             if($request->hasFile('background'))
              {
             $destinationPath = base_path().'/files/setting/background/';
             $request->file('background')->move($destinationPath, $background_image);
             }

             return  redirect('/admin/settings')->with('success_msg', 'setting created successfull');

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
               $setting =  msettings::find($id);

          if($setting == null ){

           return redirect()->back()->with('error_msg', 'setting with that id dose not exist');
          }

          return view('admin.settings.show', compact('setting'));

         //return view('admin.settings.show');
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
               $setting =  msettings::find($id);

          if($setting == null ){

           return redirect()->back()->with('error_msg', 'setting with that id dose not exist');
          }

          return view('admin.settings.edit', compact('setting'));

        // return view('admin.settings.edit');
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
          $setting =  msettings::find($id);

          if($setting == null ){

           return redirect()->back()->with('error_msg', 'setting with that id dose not exist');
          }
        $setting->title = $request->input('title');
        $setting->name = $request->input('name');
        $setting->description = $request->input('description');
        $setting->address = $request->input('address');
        $setting->type = $request->input('type');
        $setting->email = $request->input('email');
        $setting->fax = $request->input('fax');
        $setting->phone = $request->input('phone');
        $setting->facebook = $request->input('facebook');
        $setting->twitter = $request->input('twitter');
        $setting->google = $request->input('google');
        $setting->status = "active";

         if($request->hasFile('logo'))
            {
                $logo = $request->File('logo');
                $filename = $logo->getClientOriginalName();
                $extension = $logo->getClientOriginalExtension();
                $logo = sha1($filename.time()).'.'. $extension;

                 $filelogo = base_path().'/files/setting/logo/'.$setting->logo.'';
                 if(file_exists($filelogo)){
                unlink($filelogo);
                 } 
                $setting->logo = $logo;
            }

             if($request->hasFile('background'))
            {
                $bg = $request->File('background');
                $filename = $bg->getClientOriginalName();
                $extension = $bg->getClientOriginalExtension();
                $background_image = sha1($filename.time()).'.'. $extension;

                $file = base_path().'/files/setting/background/'.$setting->background_image.'';
                	if( file_exists($file)){             
                       unlink($file);
                      }
                   $setting->background_image = $background_image;
            
            }


            $setting->save();

        if($setting->id){

             if($request->hasFile('logo'))
              {
             $destinationPath = base_path().'/files/setting/logo/';
             $request->file('logo')->move($destinationPath, $logo);
             }

             if($request->hasFile('background'))
              {
             $destinationPath = base_path().'/files/setting/background/';
             $request->file('background')->move($destinationPath, $background_image);
             }

             return  redirect('/admin/settings')->with('success_msg', 'setting edited successfull');

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
         $setting =  msettings::find($id);

          if($setting == null ){

           return redirect()->back()->with('error_msg', 'setting with that id dose not exist');
          }

             $filelogo = base_path().'/files/setting/logo/'.$setting->logo.'';
             $file = base_path().'/files/setting/background/'.$setting->background_image.'';
             
             if( file_exists($file))
             {

                unlink($file);
             } 

             if(file_exists($filelogo)){
                unlink($filelogo);
             } 

             $setting->delete();

             return redirect('admin/settings')->with('success_msg', 'settings deleted successfull');
    }


}
