<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Console\View\Components\Alert;

class ContactController extends Controller
{
    public function index(Request $req)
    {
        $contact = Contact::all();
        return  view('welcome')->with("contact", $contact);
    }
    public function add(Request $req)
    {
        $req->validate(
            [  'name'  => 'required',
               'email' => 'required|email',
               'phone'  => 'required',    
               'password' => 'required',
               'confirmed_password' => 'required|same:password'
          ]);

        $contact = new Contact;
        $contact->email = $req->email;
        $contact->phone = $req->phone;
        $contact->name = $req->name;
        $contact->save();
        return redirect()->back();
    }
    public function delete(Request $req)
    {
        $contact = Contact::find($req->id);
        $contact->delete();
        return redirect()->back();
    }

     public function status ($cont){

      $cont = Contact::find($cont->Id);
        
        if($cont){
            if( $cont->status){
                $cont->status = 0;
            
            } else{
                $cont->status = 1;
                
            }

            $cont->save();
        }
        
        return back();
     }

     
    public function edit(Request $req)
    {
        $contact = Contact::find($req->id);
        return view('edit')->with("contact", $contact);

       
    }
    public function update(Request $req)
    {
        $contact = Contact::find($req->id);
      
        
            // $contact->update([
        //     'name' => 
            // $contact->update([
        //     'name' => $req->name,
        //     'phone' => $req->phone,
        //     'email' => $req->email,
        // ]);$req->name,
        //     'phone' => $req->phone,
        //     'email' => $req->email,
        // ]);
        $contact->name = $req->name;
        $contact->phone = $req->phone;
        $contact->email = $req->email;
        $contact->save();
        return redirect()->route('index');
        
    }
}
