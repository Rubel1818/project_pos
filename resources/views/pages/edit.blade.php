
@extends('layouts.app')
@section('content')


<div class="container mt-5 col-sm-4">
<form action="/update" method="POST">
   @csrf
   <p class="text-secondary h2">Update User Information</p>
   
   @method('PUT')
   <input type="hidden" name="id" value="{{ $item->id }}">
        
 
             <div class="mb-3 mt-3">
                <label class="form-label" for="fname">First Name</label>
                <input type="text" class="form-control" id="fname" placeholder="{{$item->firstName}}" name="firstName" required>
              </div> 
    
             <div class="mb-3 mt-3">
               <label class="form-label" for="lname">Last name:</label>
               <input type="text" class="form-control" id="lname" placeholder="{{$item->lastName}}" name="lastName" required>
             </div> 

             <div class="mb-3 mt-3">
                <label class="form-label" for="email">Email:</label>
                <input type="email" class="form-control" id="email" placeholder="{{$item->email}}" name="email" required>
              </div>

              @if ($errors->has('email'))
              <div class="alert alert-danger">
                  {{ $errors->first('email') }}
              </div>
              @endif

              <button type="submit" class="btn btn-primary">Update</button>
 
  </form>
</div>
@endsection          
