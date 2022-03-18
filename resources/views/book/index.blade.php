@extends('layouts.app')
@section('content')
<body>
    <div class="container">
  
        <div class="row justify-content-center">
            <div class="col-md-8">
            @if(Session::has('message'))
            <div class="alert alert-warning alert-dismissible fade show mt-3" role="alert">
                {{Session::get('message')}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
                <div class="card mt-5 overflow-auto">
                    <div class="card-header">List of Books</div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Image</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Category</th>
                                    <th scope="col">Edit</th>
                                    <th scope="col">Delete</th>
                                </tr>
                            </thead>
                            <tbody> 
                                @forelse($books as $book) 
                                <tr>

                                    <td>
                                        @if($book->image)
                                        <img src="{{Storage::url($book->image)}}" alt="{{$book->name}}" width='80'>
                                        @else
                                        <img src="/img/default.jpg" alt="default-image" width='80'>
                                        @endif
                                    </td>
                                    <td>{{ $book->name }}</td>
                                    <td>{{ $book->description }}</td>
                                    <td>{{ $book->category }}</td>
                                    <td>
                                        <a href="{{route('book.edit', $book->id)}}"><button class="btn btn-info">Edit</button></a>
                                    </td>
                                    <td>
                                        <form action="{{route('book.destroy', $book->id)}}" method="post">@csrf
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                    
                                   
                                </tr> 
                                @empty <td>No any books</td> 
                                @endforelse 
                            </tbody>
                        </table>
                    </div>
                    
                </div>
                {{$books->links()}}
            </div>
        </div>
    </div>
@endsection('content')