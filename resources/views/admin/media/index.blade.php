@extends('layouts.admin')
@section('content')
    <h1>Media</h1>
    @if($photos)
        <form action="/delete/media" method="POST" class="form-inline">
            <div class="form-group">
                <select name="checkBoxArray[]" id="" class="form-control">
                    <option value="delete">Delete</option>
                </select>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary">
            </div>
            <table class="table">
                <thead>
                <tr>
                    <th><input type="checkbox" id="options" class="form-control"></th>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Created</th>
                </tr>
                </thead>
                <tbody>
                @foreach($photos as $photo)
                    <tr>
                        <td><input type="checkbox" name="checkBoxArray[]" value="{{$photo->id}}" class="checkboxes"></td>
                        <td>{{ $photo->id }}</td>
                        <td><img src="{{$photo->file}}" alt="" height="50"></td>
                        <td>{{$photo->created_at ? $photo->created_at->diffForHumans() : 'no date'}}</td>
                        <td>
                            {!! Form::open(['method' => 'DELETE', 'action' => ['AdminMediasController@destroy',$photo->id]]) !!}
                            <div class="form-group">
                                {!! Form::submit('Delete',['class' => 'btn btn-danger']) !!}
                            </div>
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </form>
    @endif
@endsection
