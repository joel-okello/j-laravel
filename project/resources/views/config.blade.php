@extends('layouts.app')
@section('content')




<div class="container">
<div class="row">
  <div class="col-md-12"> 
    <h3 align="center" class="page-header">Current configurations</h3>
    @if(count($errors)>0)
    <div class="alert alert-danger alert-dismissable">
      <ul>
        @foreach($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
      </ul>

    </div>
    @endif
    @if(\Session::has('success'))
    <div class="alert alert-success alert-dismissable">
      {{(\Session::get('success'))}}
    </div>
    @endif
    
   

   
    <form method="post" action="{{url('config')}}">
    {{csrf_field()}}

    <table class='table table-hover table-responsive ' style="align: center;">
        <tbody style="align-self:center;" >
        <tr >
            <td>Pesapal Consumer Key </td>  
            <td><input type="text" class="form-control" name="Pesapal_Consumer_Key" value="{{config('settings.Pesapal_Consumer_Key')}}"></td>
        </tr>
        <tr>
            <td>Pesapal Consumer Secret </td>  
            <td><input type="text" class="form-control" name="Pesapal_Consumer_Secret" value="{{config('settings.Pesapal_Consumer_Secret')}}"></td>
        </tr>
        <tr>


            <td>Preferred Currency </td>  

             <td> @if(config('settings.Preferred_Currency')=='USD')
             {!! Form::select('Preferred_Currency',array('USD' => 'USD','UGX' => 'UGX'),'USD'); !!}
             @elseif(config('settings.Preferred_Currency')=='UGX')
             {!! Form::select('Preferred_Currency',array('USD' => 'USD','UGX' => 'UGX'),'UGX'); !!}  
             @endif              
            </td>

        </tr>
        <tr>
            <td>maximum allowed amount </td>  
            <td><input type="text" class="form-control" name="maximum_allowed_amount" value="{{config('settings.maximum_allowed_amount')}}"></td>
        </tr>
        <tr>{{config('settings.Secret')}}
            <td>minimum_allowed_amount </td>  
            <td><input type="text" class="form-control" name="minimum_allowed_amount" value="{{config('settings.minimum_allowed_amount')}}"></td>
        </tr>
        <tr>
            <td></td>  
            <td><button type="Submit" class="btn btn-primary">Update Configuration</button></td>
        </tr>
        </tbody>
      </table>
    </form> 





  </div>
</div>


<br>
<br>
<br>

 
<br>
<br>
<br>
@endsection  