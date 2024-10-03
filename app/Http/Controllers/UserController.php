<?php

namespace App\Http\Controllers;
use App\Models\registration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Input\Input;

class UserController extends Controller
{
    public function show( )
    {
        return view('pages.registraton');
    }

    public function store(Request $request){
        $request->validate([
            'email' => 'required|email|unique:registrations,email',
            // Add other validation rules for your fields if needed
        ], [
            'email.unique' => 'The email address must be unique. Please enter a different email.',
        ]);;
    
        registration::create($request->Input());
        return redirect('/show_page')->with('messege','Successfully added!');
        }
        
        function show_page(){
            $items=registration::get();
            return view('pages.show', compact('items'));     
        }

       
        public function delete(Request $request){

            registration::where('id','=',$request->id)->delete();
            return redirect('/show_page')->with('delete','delete successfuly');
        }
        public function edit(Request $request){
            $id=$request->id;

           // if (!$request->has('id')) {
                //Handle the case where the 'id' parameter is missing
             //   return redirect('/show_page')->with('error', 'ID parameter missing in the request.');
            //}

            $item=registration::find($id);
            if (!$item) {
                // Handle the case where the registration item with the given ID does not exist
                abort(404); // For example, you could abort with a 404 error
            }
            return view('pages.edit',compact('item'));

        }
        public function update(Request $request){
            $id = $request->id;
            $registration = Registration::find($id);
            if (!$request->has('id')) {
                //Handle the case where the 'id' parameter is missing
                return redirect('/show_page')->with('error', 'ID parameter missing in the request.');
            }
            
            $data = $request->except(['_token']);

            $request->validate([
                'email' => 'required|email|unique:registrations,email',
                // Add other validation rules for your fields if needed
            ], [
                'email.unique' => 'The email address must be unique. Please enter a different email.',
            ]);;


            $registration->update($data);
            $success ='Registration updated successfully.';
            return redirect('/show_page')->with('success', $success);;

        }
        public function search(Request $request)
        {
            $query = $request->input('query');
            $items = Registration::where('firstName', 'LIKE', "%{$query}%")
                         ->orWhere('lastName', 'LIKE', "%{$query}%")
                         ->orWhere('email', 'LIKE', "%{$query}%")
                         ->get();
    
            return view('pages.search', compact('items'));
        }


    }

  

