<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\model\mabouts;
use App\model\mcountries;
use App\model\mdeveloper;
use App\model\mnews;
use App\model\mportfolio;
use App\model\mservices;
use App\model\msliders;
use App\model\msubscriptions;
use App\model\mtestimonies;
use Mail;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class all extends Controller
{
    
  
  /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $developers = mdeveloper::where('status', '=', 'active')->orderby('id', 'DESC')->take(6)->get();
        $news = mnews::where('status', '=', 'active')->orderby('id', 'DESC')->take(4)->get();
        $portfolios = mportfolio::where('status', '=', 'active')->orderby('id', 'DESC')->take(4)->get();
        $services = mservices::where('status', '=', 'active')->orderby('id', 'DESC')->take(4)->get();
        $sliders = msliders::where('status', '=', 'active')->orderby('id', 'DESC')->take(4)->get();
        $testimony = mtestimonies::where('status', '=', 'active')->orderby('id', 'DESC')->take(4)->get();
        //$ = ::where('status', '=', 'active')->oderby('id', 'DESC')->take()->get();

        return view('welcome', compact('developers', 'news', 'portfolios', 'services', 'sliders', 'testimony'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function about()
    {
        // 
        $id = '1';
        $about = mabouts::find($id);
         return view('about.index', compact('about'));
    }
 

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function developer()
    {
        //
        $developers = mdeveloper::where('status', '=', 'active')->orderby('id', 'DESC')->paginate(10);
         return view('developer.index', compact('developers'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showdeveloper($id)
    {
        //
        $developer = mdeveloper::find($id);
         
        if($developer == null){

            return redirect()->back()->with('error_msg', ' developer with that id those not exist');

        }

        $country = mcountries::find($developer->country);

         return view('developer.show', compact('developer', 'country'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function news()
    {
        //
        $news = mnews::where('status', '=', 'active')->orderby('id', 'DESC')->paginate(8);
        return view('news.index', compact('news'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function shownews($id)
    {
        //
        $news = mnews::find($id);

        if($news->id == null){

            redirect()->back()->with('error_msg', 'news with that id those not exist');

        }
        return view('news.show', compact('news'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function portfolio()
    {
        //
        $portfolios = mportfolio::where('status', '=', 'active')->orderby('id', 'DESC')->paginate(10);
         return view('portfolio.index', compact('portfolios'));
    }

    public function showportfolio($id)
    {
        //
        $portfolio = mportfolio::find($id);

        if($portfolio->id == null){

            redirect()->back()->with('error_msg', 'portfolio with that id those not exist');

        }
         return view('portfolio.show', compact('portfolio'));
    }

    public function services()
    {
        //
        $services = mservices::where('status', '=', 'active')->orderby('id', 'DESC')->paginate(10);
         return view('services.index', compact('services'));
    }

    public function pages($url)
    {
        //
         return view('pages.index');
    }

   public function  newsletter(Requests\rsubscriptions $request){
        $sub = new msubscriptions();
        $sub->email = $request->email;
        $sub->save();
         $success = $sub->id;
             $mail = msubscriptions::find($success);
           Mail::send('email.newsletter', ['mail' => $mail ], function($message) use ($mail) {
           $message->from('connect@enadoo.com', 'enadoo inc');
           $message->to($mail->email);
           $message->subject('thank you for joining our mail list');
           });
             return redirect()->back()->with('success_msg', 'thank you for joining our mail list') ;
         }
   


}
