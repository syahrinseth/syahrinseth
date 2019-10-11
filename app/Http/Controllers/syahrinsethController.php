<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

use App\Contact;
use App\MasterPortfolio;
use App\Mail\ContactForm;

class syahrinsethController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function home()
    {
        // Home page);
        $portfoliosRand = MasterPortfolio::inRandomOrder()->take(3)->get();
        return view('welcome', compact('portfoliosRand'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function services()
    {
        // services page
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function portfolio(Request $request)
    {
        // portfolio page
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function blog($id)
    {
        // blog page
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function contactSend(Request $request)
    {
        // post method from client (contact form)
        $this->validate(request(), [
            'email'=>'required'
        ]);

        Mail::to('syah@syahrinseth.com')->send(new ContactForm(new Contact(
            $request->name,
            $request->email,
            $request->message
        )));
        $request->session()->flash('alert-success', 'Message Send.');
        return back();

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
    }
}
