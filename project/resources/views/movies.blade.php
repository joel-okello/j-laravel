@extends('layouts.app')

@section('content')




<div class="container">
<div class="row">
  <div class="col-md-12"> 
  </br>
</br>
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
    


    @if($movie)
    <form method="post" enctype="multipart/form-data" action="{{action('MoviesController@update',$id)}}">
    {{csrf_field()}}

    <!--<table class='table table-hover table-responsive table-bordered'>-->
      <table class="table table-hover">
        <input type="hidden" name="_method" value="PATCH">
        <tr>
            <td>Movie Name </td>  
            <td><input type="text" class="form-control" name="name" value="{{$movie->name}}"></td>
        </tr>
        <tr>
            <td>Movie Actor </td>  
            <td><input type="text" class="form-control" name="actor" value="{{$movie->actor}}"></td>
        </tr>
       <tr>
            <td>File Upload </td>  
            <td><a href='{{asset($movie->file)}}'>View</a><input type="file" name="file" id="file"></td>
        </tr>
        <!--<tr>
            <td>Open Filed Now </td>  
            td><a id="new_tab" href="{{ asset($movie->file) }}">Open</a> </td>
            <td><button id="new_tab">Open</button>  </td>
        </tr>-->
          

        <tr>
            <td>Movie Price </td>  
            <td><input type="number" class="form-control" name="price" value="{{$movie->price}}"></td>
        </tr>
        <tr>
            <td></td>  
            <td><button type="submit" class="btn btn-primary">Submit</button></td>
        </tr>
      </table>
      <script type="text/javascript" language="javascript">
   // <![CDATA[
   $(document).ready(function() {
      $('#new_tab').click(function() {
        //alert("Hello world!");
        window.open('{{ asset($movie->file) }}');
      });
   });
   // ]]>
   </script>
    </form> 
    @endif

@if(!$movie)
 <form method="post" enctype="multipart/form-data" action="{{url('movies')}}">
    {{csrf_field()}}
    <table class='table table-hover'>
 
        <tr>
            <td>Movie Name </td>  
            <td><input type="text" class="form-control" name="name"></td>
        </tr>

        <tr>
            <td>Movie Actor:</td>  
            <td><input type="text" class="form-control" name="actor"></td>
        </tr>
         <tr>
            <td>Movie Price:</td>  
            <td><input type="number" class="form-control" name="price"></td>
        </tr>
        <tr>
            <td>File Upload </td>  
            <td><input type="file" name="file" id="file"></td>
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

 <div class="row">
  <div class="col-md-12">   
        
  <table class="table table-striped table-hover">
    <thead>
      <tr>
        <th>Movie Name</th>
        <th>Actor</th>
        <th>Price</th>
        <th>Email</th>
        <td>View File</td>
        <th>Edit</th>
        <th>Delete</th>
      </tr>
    </thead>

    <tbody>
      @if($movies)
      @foreach($movies as $row)
      <tr>
        <td>{{$row->name}}</td>
        <td>{{$row->actor}}</td>
         <td>{{$row->price}}</td>
         <td>{{$row->email}}</td>
         <td><a href="{{asset($row->file)}}" >Open file</a></td>
        <td><a href="{{action('MoviesController@edit',$row->id)}}">
          <button type="button" class="btn btn-success">Edit</button></a></td>
        <td><form method="post" action="{{action('MoviesController@destroy',$row->id)}}">
    {{csrf_field()}}
          <input type="hidden" name="_method" value="DELETE">
          <button type="submit" class="btn btn-danger" value="Edit">Delete</button>
    </form> </td>

      </tr>

      @endforeach
      @endif
    </tbody>
  </table>
</div>
</div>
<br>
<br>
<br>

@endsection  
