
@extends("layouts.app")
@section("content")

<div class="container text-info col-sm-12 text-center">
    <p class="bg-secondary p-4 h1">Laravel CRUD application</p>
</div>

<div class="container mt-3 col-sm-6">
    @if (session('error'))
    <div class="alert alert-success">
        {{ session('error') }}
    </div>
@endif

    
    @if (session('delete'))
    <div class="alert alert-success">
        {{ session('delete') }}
    </div>
@endif

    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
@if (session('messege'))
    <div class="alert alert-success">
        {{ session('messege') }}
    </div>
@endif

    @if($items->isEmpty())
        <h3>No data is available</h3>
    
  @else
  <a href="{{route('registration')}}" class="btn btn-success mb-4">Add record</a>
    <table class="table bg-secondary">
        <thead class="table-primary">
            <tr>
                <th>Id</th>
                <th>FirstName</th>
                <th>LastName</th>
                <th>Email</th>
                <th>Action</th>
                <th>Delete</th>
              
                <!-- Add more table headers as needed -->
            </tr>
        </thead>
        <tbody>
            @foreach ($items as $item )
                
        <tr>
            
            <td> {{$item->id}} </td>
            <td> {{$item->firstName}} </td>
            <td> {{$item->lastName}} </td>
            <td> {{$item->email}} </td>
            <td> <a href="/edit_page/{{$item->id}}" class="btn btn-primary">Edit</button> </td>
            <td> <a href="/delete/{{$item->id}}" class="btn btn-danger">Delete</button> </td>
          
        </tr>
      
        @endforeach
        </tbody>
    </table>
    @endif

    
</body>
</html>
</div>
@endsection