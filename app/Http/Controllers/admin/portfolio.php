<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\model\mportfolio;
use App\Http\Requests;
use App\Http\Controllers\admin;

class portfolio extends admin
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
            $portfolios = mportfolio::where('status', '=', 'active')->orderby('id','DESC')->paginate(10);
        return view('admin.portfolio.index', compact('portfolios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
                return view('admin.portfolio.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\rportfolio $request)
    {
        //
        $pt = new mportfolio;

        $pt->name = $request->name;  
        $pt->client = $request->client;
        $pt->budget = $request->budget;
        $pt->title = $request->title;
        $pt->cost = $request->cost;
        $pt->technologies = $request->technologies;
        $pt->website = $request->website;
        $pt->description = $request->description;
        $pt->start_time = $request->start_time;
        $pt->end_time = $request->end_time;
        $pt->status = 'active';

         if($request->hasFile('picture')){

            $image = $request->file('picture');

            $filename = $image->getClientOriginalName();
            $extension = $image->getClientOriginalExtension();

            $img = sha1($filename.time()).'.'.$extension;


         }

         $pt->image = $img;
         $pt->save();

         $ptid = $pt->id;

         if($request->hasFile('picture')){

            $destinationPath = base_path().'/files/portfolio/';

            $request->file('picture')->move($destinationPath, $img);
         }
 
         if($ptid){

            \Session::flash('success_msg', 'new portfolio added successfulll ');

            return redirect('/admin/portfolio');
         }
         else {

            \Session::flash('error_msg', 'something wrong with your input field');
            return redirect()->back()->withInput()->withErrors();
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
               $portfolio = mportfolio::find($id);

               if ($portfolio == null) {
                   # code...
                redirect()->back()->with('error_msg', 'portfolio with that id those not exist');
               }

               return view('admin.portfolio.show', compact('portfolio'));
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
           $portfolio = mportfolio::find($id);

               if ($portfolio == null) {
                   # code...
                redirect()->back()->with('error_msg', 'portfolio with that id those not exist');
               }

               $pf = $portfolio;

               return view('admin.portfolio.edit', compact('pf'));
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

           $portfolio = mportfolio::find($id);

               if ($portfolio == null) {
                   # code...
                redirect()->back()->with('error_msg', 'portfolio with that id those not exist');
               }

               $pt  = $portfolio;

        $pt->name = $request->input('name');  
        $pt->client = $request->input('client');
        $pt->budget = $request->input('budget');
        $pt->title = $request->input('title');
        $pt->cost = $request->input('cost');
        $pt->technologies = $request->input('technologies');
        $pt->website = $request->input('website');
        $pt->description = $request->input('description');
        $pt->start_time = $request->input('start_time');
        $pt->end_time = $request->input('end_time');
        $pt->status = 'active';

        //$oldimage = base_path().'/files/portfolio/'.$pt->images.'';

          if($request->hasFile('picture'))
           {
            $img = $request->File('picture');
             $filename = $img->getClientOriginalName();
             $extension = $img->getClientOriginalExtension();
            $image = sha1($filename.time()).'.'.$extension;
           }

            if(empty($image)){
            $pt->save();
            return redirect('admin/portfolio/v/'.$pt->id.'')->with('success_msg', 'portfolio edited succesfully');
           }
           elseif ($image) {
               # code...
                $oldpicture = base_path().'/files/portfolio/'.$pt->image.'';

            if (file_exists($oldpicture)) {
                # code...]
                unlink($oldpicture);
            }

            $pt->image = $image;
            $pt->save();

            if ($request->hasFile('picture')) {
                # code...
                $destinationPath = base_path().'/files/portfolio/';
                $request->file('picture')->move($destinationPath, $image);
            }
                    return redirect('admin/portfolio/v/'.$pt->id.'')->with('success_msg', 'portfolio edited succesfully');

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

           $portfolio = mportfolio::find($id);

               if ($portfolio == null) {
                   # code...
                redirect()->back()->with('error_msg', 'portfolio with that id those not exist');
               }

            $oldimage = base_path().'/files/portfolio/'.$portfolio->image.'';

            if (file_exists($oldimage)) {
                # code...
                unlink($oldimage);
            }

            $portfolio->delete();

            return redirect('admin/portfolio')->with('success_msg', 'portfolio deleted successfulll');


    }



}
