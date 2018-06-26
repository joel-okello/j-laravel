<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\movies;
use Validator;
use Storage;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
Use DB;
class MoviesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

   public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {$movie = null;
       $id = null;
        //$movies = movies::all()->toArray();
             $idadmin = Auth::id();
        $admin = DB::table('users')->where('id', '=',$idadmin)->get();
        foreach ($admin as $emails) {
    $adminemail = $emails->email;
}
//dd($adminemail);

        if($adminemail=="okellojoelacaye@gmail.com")
        $movies = DB::table('movies2')->where('email', '=',$adminemail)->get()->toArray();
        $movies = DB::table('movies2')->get()->toArray();
        //$movies = movies::all();
        //dd($movies);
        
        return view('movies',compact('movies','movie','id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $movie = null;
       $id = null;
        //$movies = movies::all()->toArray();
             $idadmin = Auth::id();
        $admin = DB::table('users')->where('id', '=',$idadmin)->get();
        foreach ($admin as $emails) {
    $adminemail = $emails->email;
}


 if($adminemail=="okellojoelacaye@gmail.com")
        $movies = DB::table('movies2')->where('email', '=',$adminemail)->get()->toArray();
        $movies = DB::table('movies2')->get()->toArray();;

        return view('movies',compact('movies','movie','id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
         $this->validate($request,['name' => 'required', 'actor' => 'required', 'price' => 'required']);

           $idadmin = Auth::id();
       $admin = DB::table('users')->where('id', '=',$idadmin)->get()->first();    
        $adminemail = $admin->email;


 

  $path = $request->file('file')->store('public');
   $patterns = "public/";
  $replacements = "storage/";
  $visibility = Storage::setVisibility($path,'public');
  $path = str_replace($patterns,$replacements,$path);
  
        $movie = new movies([
            'name' => $request->get('name'),
            'price' => $request->get('price'),
            'actor' => $request->get('actor'),
            'file' => $path,
            'email' => $adminemail
        ]);
        $movie->save();
        //dd($path);
        return redirect()->route('movies.index')->with('success','Movie Added');
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         //dd(config('app.timezone'));
         $idadmin = Auth::id();
        $admin = DB::table('users')->where('id', '=',$idadmin)->get()->first();    
        $adminemail = $admin->email;

        $movie = movies::find($id);
         if($adminemail=="okellojoelacaye@gmail.com")
        $movies = DB::table('movies2')->where('email', '=',$adminemail)->get()->toArray();
        $movies = DB::table('movies2')->get()->toArray();
        return view('movies',compact('movie','movies','id'));
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

        
    
// define validation rules, 'password' will be our custom rule
    $rules = [
      'name' => 'required|max:255',
      'actor'=> 'required|max:255',
      'price'=> 'required|password',
      
    ];
    
    // custom rule for 'password'
    Validator::extend('password', function( $attribute, $value, $parameters ) {
      

        //pass if true->true if price is greater than 500 
      return $value >= 500 ;
    });
    
    // custom message if validation for password fails
    $messages = [ 'password' => 'Price is less than 500' ];
    
    // validate input with rules, adding in custom messages
    $validation = Validator::make( Input::all(), $rules, $messages );
    
    // if validation fails, redirect back to previous page
    if ( $validation->fails() ) {
      return Redirect::back()->withInput()->withErrors( $validation->messages() );
    }
    


        $patterns = "storage/";
        $replacements = "public/";
        $movie = movies::find($id);
        $path = $movie->file;
        $path = str_replace($patterns,$replacements,$path);


        if($request->file('file')){
        Storage::delete($path);
        $path = $request->file('file')->store('public');
        $visibility = Storage::setVisibility($path,'public');
        $path = str_replace($patterns,$replacements,$path);}
  

        
        $movie->name = $request->get('name');
        $movie->price = $request->get('price');
        $movie->actor = $request->get('actor');
        if($request->file('file'))
            $movie->file = $path;
        $movie->save();
        return redirect()->route('movies.index')->with('success','Data Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {


        $movies = movies::find($id);
        $path = $movies->file;
        $patterns = "storage/";
        $replacements = "public/";
        $path = str_replace($patterns,$replacements,$path);

        Storage::delete($path);
        
        $movies ->delete();

        return redirect()->route('movies.index')->with('success','Movie Deleted sucessfully');;
    }


}
