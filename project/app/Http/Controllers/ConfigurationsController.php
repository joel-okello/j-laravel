<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\movies;
use Validator;
use File;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Auth;

class ConfigurationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response


     */

    public function __construct()
    {
        $this->middleware('auth:admin');
    } 
    
    public function index()
    {
        return view('config',compact('movies','movie','id'));
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
       //dd($request->get('Preferred_Currency'));
        // define validation rules, 'password' will be our custom rule
    $rules = [
      'Pesapal_Consumer_Key' => 'required|max:255',
      'Pesapal_Consumer_Secret'=> 'required|max:255',
      'Preferred_Currency'=> 'required',
      'maximum_allowed_amount'=> 'required',
      'minimum_allowed_amount'=> 'required',
      
    ];
    
    // custom rule for 'password'
    Validator::extend('password', function( $attribute, $value, $parameters ) {
      // compare the entered password with what the database has, e.g. validates the current password

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


   //dd($request->get('Preferred_Currency'));
    
    Config::set('settings.Pesapal_Consumer_Key',$request->get('Pesapal_Consumer_Key'));
    Config::set('settings.Pesapal_Consumer_Secret',$request->get('Pesapal_Consumer_Secret'));
    Config::set('settings.Preferred_Currency',$request->get('Preferred_Currency'));
    Config::set('settings.maximum_allowed_amount',$request->get('maximum_allowed_amount'));
    Config::set('settings.minimum_allowed_amount',$request->get('minimum_allowed_amount'));
  
$file = config_path()."/settings.php";
$contents ="<?php

return [
    'Pesapal_Consumer_Key' => '".$request->get('Pesapal_Consumer_Key')."',
    'Pesapal_Consumer_Secret' => '".$request->get('Pesapal_Consumer_Secret')."',
    'Preferred_Currency' => '".$request->get('Preferred_Currency')."',
    'maximum_allowed_amount' =>'".$request->get('maximum_allowed_amount')."',
    'minimum_allowed_amount'=>'".$request->get('minimum_allowed_amount')."'

    
];
?>";

$bytes_written = File::put($file, $contents);

    

  
return view('config',compact('movies','movie','id'));

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
        dd($request);
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
