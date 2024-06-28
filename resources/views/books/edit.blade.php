@extends('layouts.parent')
@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="card">
        <div class="card-header bg-success text-lg-center" style="font-size: 30px; color:white">
            Edit book id = {{ $book->BookID }}
        </div>
        <div class="card-body">
            <form action="{{ route('books.update',$book->BookID) }}" enctype="multipart/form-data" method="post">
                @csrf
                @method('PUT')
                <div class="row mb-3">
                    <label for="" class="col-sm-2 col-form-label">Title</label>
                    <div class="col-sm-10">
                        <input type="text" name="Title" id="" class="form-control" value="{{ $book->title }}">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="" class="col-sm-2 col-form-label">Author</label>
                    <div class="col-sm-10">
                        <input type="text" name="Author" id="" class="form-control" value="{{ $book->author }}">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="" class="col-sm-2 col-form-label">Genre</label>
                    <div class="col-sm-10">
                        <input type="text" name="Genre" id="" class="form-control" value="{{ $book->genre }}">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="" class="col-sm-2 col-form-label">PublicationYear</label>
                    <div class="col-sm-10">
                        <input type="date" name="PublicationYear" id="" class="form-control" value ="{{ $book->PublicationYear }}">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="" class="col-sm-2 col-form-label">ISBN</label>
                    <div class="col-sm-10">
                        <input type="text" name="ISBN" id="" class="form-control" value="{{ $book->ISBN }}">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="" class="col-sm-2 col-form-label">CoverImageURL</label>
                    <div class="col-sm-10">
                        <input type="text" name="CoverImageURL" id="" class="form-control" value="{{ $book->CoverImageURL }}">
                    </div>
                </div>
                <div class="text-center">
                    <a href="{{ route('books.index') }}" class="btn btn-secondary">Back</a>
                    <input type="submit" value="Save" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>
@endsection