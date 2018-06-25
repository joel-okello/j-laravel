<?php

namespace App\Http\Controllers;

use App\Transactions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
Use DB;

class TransactionsController extends Controller
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

        $movies = transactions::all()->toArray();
       $movie = null;
       $id = null;
       //dd($movies);
        return view('viewtransactions',compact('movies','movie','id'));    }

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
        $this->validate($request,['first_name' => 'required', 'last_name' => 'required', 'amount' => 'required','Description_of_payment' => 'required',]);
        
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
