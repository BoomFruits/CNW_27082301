@extends('layouts.parent')
@section('content')
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            {{ $message }}
        </div>
    @endif
    <div class="container mt-5">
        <h1 class="text-primary mt-3 mb-4 text-center"><b>Management Book</b></h1>
    </div>
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col col-md-6">
                    <b></b>
                </div>
                <div class="col col-md-6">
                    <a href="{{ route('books.create') }}" class="btn btn-success btn-sm float-end">Add new</a>
                </div>
                <div class="card-body">
                   <table class="table table-bordered">
                    <tr>
                        <th>BookID</th>
                        <th>Title</th>
                        <th>Author</th>
                        <th>Genre</th>
                        <th>PublicationYear</th>
                        <th>ISBN</th>
                        <th>CoverImageURL</th>
                        <th>Action</th>
                    </tr>
                    @if (count($books) > 0)
                        @foreach ($books as $row)
                            <tr>
                                <td>{{ $row->BookID }}</td>
                                <td>{{ $row->title }}</td>
                                <td>{{ $row->author }}</td>
                                <td>{{ $row->genre }}</td>
                                <td>{{ $row->PublicationYear }}</td>
                                <td>{{ $row->ISBN }}</td>
                                <td>{{ $row->CoverImageURL }}</td>
                                
                                {{-- <td>@if ($row->StudentGender == 0)
                                    Nam
                                @else Nữ @endif</td> --}}
                                {{-- <td>{{ $row->ClassRoom->ClassRoomName }}</td> --}}
                                <td>
                                    
                                        <a href="{{ route('books.show',$row->BookID) }}" class="btn btn-primary">Details</a>
                                        <a href="{{ route('books.edit',$row->BookID) }}" class="btn btn-warning">Edit</a>
                
                                        {{-- <input type="submit" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $row->BookID ?>" value="Delete"> --}}
                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $row->BookID ?>">Delete</button>
                                    </form>
                                </td>
                            </tr>
                             <td>
                         <!-- Modal -->
                        <div class="modal fade" id="exampleModal<?php echo $row->BookID ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Delete confirm</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Are you sure want to delete book id = <?php echo $row->BookID ?>
                                </div>
                                <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <form action="{{ route('books.destroy',$row->BookID) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    
                                    <button type="submit" class="btn btn-success">Yes</button>
                                </form>
                                </div>
                            </div>
                            </div>
                        </div>
                    </td>
                        @endforeach
                    @else
                            <tr>
                                <td colspan="3" class="text-center">No Data Found</td>
                            </tr>
                    @endif
                   </table>
                   {{-- {!! $books->links() !!} --}}
                </div>
            </div>
        </div>
    </div>
@endsection