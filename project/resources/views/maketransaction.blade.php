@extends('layouts.app')
@section('content')




<div class="container">
<div class="row">
  <div class="col-md-12"> 
    <h3 align="center" class="page-header">Movies Crude operation</h3>
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
    
   

   

@if(!$movie)
 <form method="post" action="{{url('usertransactions')}}">
    {{csrf_field()}}
    <table class='table table-hover table-responsive table-bordered'>
 
        <tr>
            <td>first name: </td>  
            <td><input type="text" class="form-control" name="first_name"></td>
        </tr>

        <tr>
            <td>last name:</td>  
            <td><input type="text" class="form-control" name="last_name"></td>
        </tr>
         <tr>
            <td>amount:</td>  
            <td><input type="number" class="form-control" name="amount"></td>
        </tr>
        <tr>
            <td>Description of payment:</td>  
            <td><input type="text" class="form-control" name="Description_of_payment"></td>
        </tr>
        <tr>
            <td>Phone number:</td>  
            <td><input type="text" class="form-control" name="phone"></td>
        </tr>

        
        <tr>
            <td></td>  
            <td><button type="submit" class="btn btn-primary">Submit</button></td>
        </tr>
      </table>
      
          
    </form> 
  @endif


  </div>
</div>


<br>
<br>
<br>

@endsection  