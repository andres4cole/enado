<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\model\mservices;
use App\Http\Requests;
use App\Http\Controllers\admin;

class services extends admin
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
          $services = mservices::where('status','=','active')->orderby('id','DESC')->paginate(4);

      return view('admin.services.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.services.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\rservices $request)
    {
        //
        $service = new mservices();
        $service->userid = $request->userid;
        $service->title = $request->title;
        $service->service = $request->services;
        $service->status = "active";


         if($request->hasFile('picture'))
            {
                $img = $request->File('picture');
                $filename = $img->getClientOriginalName();
                $extension = $img->getClientOriginalExtension();
                $picture = sha1($filename.time()).'.'. $extension;
            }
       $service->picture = $picture;
       $service->save();


       if($service->id){

           if($request->hasFile('picture'))
              {
             $destinationPath = base_path().'/files/services/';
             $request->file('picture')->move($destinationPath, $picture);
             }

             return  redirect('admin/services')->with('success_msg', 'service created successfull');

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
        //\
           $services =  mservices::find($id);

          if($services == null ){

           return redirect()->back()->with('error_msg', 'services with that id dose not exist');
          }

          return view('admin.services.show', compact('services'));
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

           $services =  mservices::find($id);

          if($services == null ){

           return redirect()->back()->with('error_msg', 'services with that id dose not exist');
          }

          return view('admin.services.edit', compact('services'));
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

         $service =  mservices::find($id);

          if($service == null ){

           return redirect()->back()->with('error_msg', 'services with that id dose not exist');
          }
        $service->userid = $request->input('userid');
        $service->title = $request->input('title');
        $service->service = $request->input('services');
        $service->status = "active";

       

       if($request->hasFile('picture'))
           {
            $img = $request->File('picture');
             $filename = $img->getClientOriginalName();
             $extension = $img->getClientOriginalExtension();
            $image = sha1($filename.time()).'.'.$extension;
           }


           if(empty($image)){
            $service->save();
            return redirect('admin/services/v/'.$service->id.'')->with('success_msg', 'services edited succesfully');
           }
           elseif ($image) {
               # code...
             $oldpicture = base_path().'/files/services/'.$service->picture.'';
            if(file_exists($oldpicture)) {
            
                unlink($oldpicture);
            }

            $service->picture = $image;
            $service->save();

            if ($request->hasFile('picture')) {
                # code...
                $destinationPath = base_path().'/files/services/';
                $request->file('picture')->move($destinationPath, $image);
            }
                    return redirect('admin/services/v/'.$service->id.'')->with('success_msg', 'service edited succesfully');

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

          $service =  mservices::find($id);

          if($service == null ){

           return redirect()->back()->with('error_msg', 'services with that id dose not exist');
          }
                 $filepicture = base_path().'/files/services/'.$service->picture.'';

                if (file_exists($filepicture)) {
                    # code...
                    unlink($filepicture);
                }

                $service->delete();

                           return redirect('admin/services')->with('success_msg', 'services deleted successfull');


    }
}
