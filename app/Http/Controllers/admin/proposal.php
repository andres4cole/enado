<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\model\mproposal;
use Mail;
use App\Http\Requests;
use App\Http\Controllers\admin;

class proposal extends admin
{
    

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $proposals = mproposal::where('status', '=', 'pending')->orderby('id', 'DESC')->paginate();
        return view('admin.proposal.index', compact('proposals'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
          $proposal = mproposal::find($id);

        if ($proposal->id == null) {
            # code...
            return redirect()->back()->with('error_msg', 'proposal with that id those not exist');
        }
         return view('admin.proposal.show', compact('proposal'));
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
             //
          $proposal = mproposal::find($id);

        if ($proposal->id == null) {
            # code...
            return redirect()->back()->with('error_msg', 'proposal with that id those not exist');
        }

        $pathtofile = base_path().'/files/proposal/'.$proposal->proposal_file.'';

        if (file_exists($pathtofile)) {
            # code...
            unlink($pathtofile);

        }
        $proposal->delete();

        return redirect('admin/proposal')->with('success_msg', 'proposal deleted successfull');
    }


}
