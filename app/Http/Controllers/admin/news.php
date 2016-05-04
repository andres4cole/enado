<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\model\mnews;
use Mail;
use App\user;
use App\Http\Requests;
use App\Http\Controllers\admin;

class news extends admin
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
        $news = mnews::where('status', '=', 'active')->orderby('id', 'DESC')->simplepaginate(10);
        return view('admin.news.index', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        //$cat = mcategories::all();
         return view('admin.news.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\rnews $request)
    {
        //
        $news =  new mnews();
    $news->userid = $request->userid;
   //$news->category_id = $request->catid;
    $news->summary = $request->summary;
     $news->title = $request->title;
     $news->news = $request->news;
     //$news->video = $request->input('video');
     $news->status = 'active';
    
    if($request->hasFile('picture'))
           {
            $img = $request->File('picture');
             $filename = $img->getClientOriginalName();
             $extension = $img->getClientOriginalExtension();
            $image = sha1($filename.time()).'.'.$extension;
           }

           $news->picture = $image;
           $news->save();
          

           if($request->hasFile('picture'))
          {
            $destinationPath = base_path().'/files/news/';
            $request->file('picture')->move($destinationPath, $image);
           }

          
             
           if($news->id)
          {

            $users = user::all();
            $newz = mnews::find($news->id);
            foreach ($users as $user) {

              Mail::send('email.news', ['newz' => $newz], function($message) use ($user, $newz){
                $message->to($user->email);
                $message->from('connect@phpmit.com', 'phpmit media inc');
                $message->subject($newz->title);
               });

            }

            return redirect('admin/news')->with('succes_msg', 'news created succesfully');
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
           $news = mnews::find($id);
        if($news == null){
          return  redirect()->back()->with('error_msg', 'content with that id dose not exist');
        }
         return view('admin.news.show', compact('news'));
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
             $news = mnews::find($id);
        if($news == null){
          return  redirect()->back()->with('error_msg', 'content with that id dose not exist');
        }
         return view('admin.news.edit', compact('news'));
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
             $news = mnews::find($id);
        if($news == null){
          return  redirect()->back()->with('error_msg', 'content with that id dose not exist');
        }

    $news->userid = $request->input('userid');
    $news->category_id = $request->input('catid');
    $news->summary = $request->input('summary');
     $news->title = $request->input('title');
     $news->news = $request->input('news');
    // $news->video = $request->input('video');
     $news->status = 'active';

         if($request->hasFile('picture'))
           {
            $img = $request->File('picture');
             $filename = $img->getClientOriginalName();
             $extension = $img->getClientOriginalExtension();
            $image = sha1($filename.time()).'.'.$extension;
           }


           if(empty($image)){
            $news->save();
            return redirect('admin/news/v/'.$news->id.'')->with('success_msg', 'news edited succesfully');
           }
           elseif ($image) {
               # code...
                $oldpicture = base_path().'/files/news/'.$news->picture.'';

            if (file_exists($oldpicture)) {
                # code...]
                unlink($oldpicture);
            }

            $news->picture = $image;
            $news->save();

            if ($request->hasFile('picture')) {
                # code...
                $destinationPath = base_path().'/files/news/';
                $request->file('picture')->move($destinationPath, $image);
            }
                    return redirect('admin/news/v/'.$news->id.'')->with('success_msg', 'news edited succesfully');

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
        $news = mnews::find($id);
//        $comments = mcomments::find($news->id);
        if($news == null){
          return  redirect()->back()->with('error_msg', 'content with that id dose not exist');
        }
        $picture = base_path().'/files/news/'.$news->picture.'';

        if (file_exists($picture)) {
            # code...
            unlink($picture);
        }
        
        //$comments->delete();
        $news->delete();
       return redirect('admin/news')->with('success_msg', 'news  deleted successfull');

    }



    
}
