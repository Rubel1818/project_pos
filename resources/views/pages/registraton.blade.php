
      @extends('layouts.app')
      @section('content')


      

     

      <div class="container text-info col-sm-12 text-center  ">
        <p class="bg-secondary p-4 h1">Laravel CRUD application</p>
        <p class="h3 text-secondary text-center">Add new user</p>
        <p class="h5 text-secondary text-center">Complete the form to add new user</p>
      </div>

      <div class="container mt-5 col-sm-3 ">

        
        
      <form action="/register" method="post">
         @csrf
         
                   <div class="mb-3 mt-3">
                      <label class="form-label" for="fname">First Name</label>
                      <input type="text" class="form-control" id="fname" placeholder="Enter First name" name="firstName" required>
                    </div> 
          
                   <div class="mb-3 mt-3">
                     <label class="form-label" for="lname">Last name:</label>
                     <input type="text" class="form-control" id="lname" placeholder="Enter Last name" name="lastName" required>
                   </div> 

                   <div class="mb-3 mt-3">
                      <label class="form-label" for="email">Email:</label>
                      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" required
                      >
                    </div>
     
                    @if ($errors->has('email'))
                    <div class="alert alert-danger">
                        {{ $errors->first('email') }}
                    </div>
                    @endif

                    <div class="mb-3">
                      <label for="password">Password:</label>
                      <input type="password" class="form-control" id="password" placeholder="Enter password" name="password">
                    </div>
        
                    <button type="submit" class="btn btn-primary">Save</button>
       
        </form>
      </div>
@endsection          
