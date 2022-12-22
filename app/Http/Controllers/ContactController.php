<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;
use Auth;

class ContactController extends Controller
{
    public function index()
    {
        $contacts= Contact::orderBy('id', 'desc')->paginate(10);
        // print_r($contacts);exit;
        return view('auth.dashboard', compact('contacts'));
    }

    public function create()
    {
        return view('contacts.create');
    }

    public function store(Request $request)
    {
        $user_id = \Auth::user()['id'];
        $request->validate([
            'name' => 'required',
            'relation' => 'required',
            'phone' => 'required',
            'city' => 'required',
        ]);
        
        $contact = new Contact();
        $contact = $request->all();
        $contact['user_id'] = $user_id;
        // print_r($contact);exit;
        $response = Contact::create($contact);  
        if ($response){
            return redirect()->route('dashboard')->with('success','Contact Created Successfully.');
        }else{
            return redirect()->route('dashboard')->with('error','Contact Not Created');

        }
    }

    public function edit(Request $request)
    {
        $id = $request->id;
        $contact = Contact::find($id);
        return view('contacts.edit', compact('contact'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'relation' => 'required',
            'phone' => 'required',
            'city' => 'required',
        ]);
        $contact = $request->all();
        $id = $request->id;
        $response = Contact::find($id)->update($contact);
        if ($response){
            return redirect()->route('dashboard')->with('success','Contact Updated Successfully.');
        }else{
            return redirect()->route('dashboard')->with('error','Contact Not Updated');

        }
    }

    public function destroy(Request $request)
    {
        // $contact = $request->all();
        $id = $request->id;
        // print_r($id);exit;
        Contact::find($id)->delete();
        // $contact->delete();
        return redirect()->route('dashboard')->with('success','Contact Deleted Successfully');
    }
}
