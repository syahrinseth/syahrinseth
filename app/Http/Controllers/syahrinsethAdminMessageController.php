<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Contact;

class syahrinsethAdminMessageController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $contacts = Contact::all();
        return View('adminmessages.index', compact('contacts'));
    }

    public function ajax(Request $request, $id){
        $contact = Contact::find($id);
        return response()->json([
            'name' => $contact->name,
            'email' => $contact->email,
            'phone' => $contact->phone,
            'company' => $contact->company,
            'message' => $contact->message,
        ]);
    }
}
