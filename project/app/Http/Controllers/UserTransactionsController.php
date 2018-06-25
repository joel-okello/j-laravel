<?php

namespace App\Http\Controllers;

use App\Transactions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
Use DB;
use Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class UserTransactionsController extends Controller
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
    {

        $movies = transactions::all()->toArray();
       $movie = null;
       $id = null;
       //dd($movies);
        return view('maketransaction',compact('movies','movie','id'));    }

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
        

        $rules = [
      'phone' => 'required',
      'first_name' => 'required|max:255',
      'last_name'=> 'required|max:255',
      'amount'=> 'required|lesser|greater',
      'Description_of_payment' => 'required',
      'phone' => 'required',
      
    ];
    
    // custom rule for 'password'
   
    Validator::extend('greater', function( $attribute, $value, $parameters ) {


        //pass if true->true if price is greater than 500 
      return ($value <= config('settings.maximum_allowed_amount'));
    });


    Validator::extend('lesser', function( $attribute, $value, $parameters ) {
      // compare the entered password with what the database has, e.g. validates the current password

        //pass if true->true if price is greater than 500 
      return $value >= config('settings.minimum_allowed_amount') ;
    });
    
    // custom message if validation for password fails
    $lessmessage = "Minimum amount is".config('settings.minimum_allowed_amount');
    $greatermessage = "Maximum amount is".config('settings.maximum_allowed_amount');
    $messages = [ 'lesser' => $lessmessage,'greater' => $greatermessage];
   // $messages = [ 'password' => 'Price is less than 500' ];
    
    // validate input with rules, adding in custom messages
    $validation = Validator::make( Input::all(), $rules, $messages );
    
    // if validation fails, redirect back to previous page
    if ( $validation->fails() ) {
      return Redirect::back()->withInput()->withErrors( $validation->messages() );
    }
    


        
        $idadmin = Auth::id();
        $admin = DB::table('admins')->where('id', '=',$idadmin)->get();
        foreach ($admin as $emails) {
    $adminemail = $emails->email;
}
        $movie = new Transactions([
            'first name' => $request->get('first_name'),
            'last name' => $request->get('last_name'),
            'amount' => $request->get('amount'),
            'phone' => $request->get('phone'),
            'payment status' => 'COMPLETED',
            'description of payment' => $request->get('Description_of_payment'),
            'email' => $adminemail,

        ]);
        $movie->save();
        return redirect()->route('transactions.index')->with('success','Movie Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Transactions  $transactions
     * @return \Illuminate\Http\Response
     */
    public function show(Transactions $transactions)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Transactions  $transactions
     * @return \Illuminate\Http\Response
     */
    public function edit(Transactions $transactions)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Transactions  $transactions
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transactions $transactions)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Transactions  $transactions
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transactions $transactions)
    {
        
    }
}
