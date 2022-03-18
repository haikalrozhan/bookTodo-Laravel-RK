@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                
                <div class="card mt-5">
                
                    <div class="card-header">Update a new Book</div>
                    <div class="card-body">
                        <form action="{{ route('book.update', $book->id) }}" method="post" enctype="multipart/form-data" >@csrf <label for="">Name of book</label>
                            <input type="text" name="name" class="form-control" value="{{$book->name}}">
                            @if($errors->has('name'))
                                <span class="text-danger">{{$errors->first('name')}}</span>
                            @endif
                            <br>
                            <label for="">Description of book</label>
                            <textarea name="description" class="form-control">{{$book->description}}</textarea>
                            @if($errors->has('description'))
                                <span class="text-danger">{{$errors->first('description')}}</span>
                            @endif
                            <br>
                            <label for="">Category</label>
                            <select name="category" class="form-control">
                                <option value="">Select</option>
                                <option value="fictional" @if($book->category == 'fictional')selected @endif>Fictional Book</option>
                                <option value="history" @if($book->category == 'history')selected @endif>History Book</option>
                                <option value="comedy" @if($book->category == 'comedy')selected @endif>Comedy Book</option>
                            </select>
                            @if($errors->has('category'))
                                <span class="text-danger">{{$errors->first('category')}}</span>
                            @endif
                            <br>
                            <label for="">Image of book</label>
                            <input type="file" name="image" class="form-control">
                            @if ($errors->has('image'))
                                <span class="text-danger">{{ $errors->first('image') }}</span>
                            @endif
                            <br>
                            <input type="submit" value='Update' class="btn btn-primary">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection