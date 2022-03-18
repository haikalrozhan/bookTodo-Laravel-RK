@extends('layouts.app')
@section('content')
    <div class="container">
  
        <div class="row justify-content-center">
            <div class="col-md-8">
            @if(Session::has('message'))
                <div class="alert alert-warning alert-dismissible fade show mt-3" role="alert">
                    {{Session::get('message')}}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
                <div class="card mt-5">

                    <div class="card-header">Create a new Book</div>
                    <div class="card-body">
                        <form action="{{ route('book.store') }}" method="post" enctype="multipart/form-data">@csrf <label for="">Name of
                                book</label>
                            <input type="text" name="name" class="form-control" placeholder="name of book">
                            @if ($errors->has('name'))
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                            @endif
                            <br>
                            <label for="">Description of book</label>
                            <textarea name="description" class="form-control"></textarea>
                            @if ($errors->has('description'))
                                <span class="text-danger">{{ $errors->first('description') }}</span>
                            @endif
                            <br>
                            <label for="">Category</label>
                            <select name="category" class="form-control">
                                <option value="">Select</option>
                                <option value="fictional">Fictionnal Book</option>
                                <option value="history">History Book</option>
                                <option value="comedy">Comedy Book</option>
                            </select>
                            @if ($errors->has('category'))
                                <span class="text-danger">{{ $errors->first('category') }}</span>
                            @endif
                            <br>
                            <label for="">Image of book</label>
                            <input type="file" name="image" class="form-control">
                            @if ($errors->has('image'))
                                <span class="text-danger">{{ $errors->first('image') }}</span>
                            @endif
                            <br>
                            <input type="submit" value='Submit' class="btn btn-primary">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection