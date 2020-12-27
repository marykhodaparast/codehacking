@extends('layouts.blog-post')
@section('content')

    <!-- Blog Post -->

    <!-- Title -->
    <h1>{{$post->title}}</h1>

    <!-- Author -->
    <p class="lead">
        by <a href="#">{{$post->user->name}}</a>
    </p>

    <hr>

    <!-- Date/Time -->
    <p><span class="glyphicon glyphicon-time"></span> Posted {{$post->created_at->diffForHumans()}}</p>

    <hr>

    <!-- Preview Image -->
    <img class="img-responsive" src="{{$post->photo->file}}" alt="">

    <hr>

    <!-- Post Content -->
    <p>{{$post->body}}</p>
    <hr>

    <!-- Blog Comments -->
    @if(\Illuminate\Support\Facades\Session::has('comment_message'))
        {{session('comment_message')}}
    @endif
    <!-- Comments Form -->
    @if(\Illuminate\Support\Facades\Auth::check())
        <div class="well">
            <h4>Leave a Comment:</h4>
            {!! Form::open(['method' => 'post', 'action' => 'PostCommentsController@store']) !!}
            <input type="hidden" name="post_id" value="{{$post->id}}">
            <div class="form-group">
                {!! Form::label('body','Body:') !!}
                {!! Form::textarea('body',null,['class' => 'form-control','rows' => 3]) !!}
            </div>
            <div class="form-group">
                {!! Form::submit('Submit comment',['class' => 'btn btn-primary']) !!}
            </div>
            {!! Form::close() !!}
        </div>
    @endif

    <hr>

    <!-- Posted Comments -->

    <!-- Comment -->
    @if(count($comments)>0)
        @foreach($comments as $comment)
            <div class="media">
                <a class="pull-left" href="#">
                    <img class="media-object" src="{{$comment->photo}}" alt="" height="64">
                </a>
                <div class="media-body">
                    <h4 class="media-heading">{{$comment->author}}
                        <small>{{$comment->created_at->diffForHumans()}}</small>
                    </h4>
                {{$comment->body}}
                <!-- Nested Comment -->
                    <div class="media">
                        <a class="pull-left" href="#">
                            <img class="media-object" src="http://placehold.it/64x64" alt="">
                        </a>
                        <div class="media-body">
                            <h4 class="media-heading">Nested Start Bootstrap
                                <small>August 25, 2014 at 9:30 PM</small>
                            </h4>
                            Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin
                            commodo.
                            Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc
                            ac nisi
                            vulputate fringilla. Donec lacinia congue felis in faucibus.
                        </div>
                        {!! Form::open(['method' => 'post', 'action' => 'CommentRepliesController@createReply']) !!}
                        <input type="hidden" name="comment_id" value="{{$comment->id}}">
                        <div class="form-group">
                            {!! Form::label('body','Body:') !!}
                            {!! Form::textarea('body',null,['class' => 'form-control','rows' => 1]) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::submit('submit',['class' => 'btn btn-primary']) !!}
                        </div>
                        {!! Form::close() !!}
                    </div>
                    <!-- End Nested Comment -->
                </div>
            </div>
        @endforeach
    @endif

    <!-- Comment -->
    {{--        <div class="media">--}}
    {{--            <a class="pull-left" href="#">--}}
    {{--                <img class="media-object" src="http://placehold.it/64x64" alt="">--}}
    {{--            </a>--}}
    {{--            <div class="media-body">--}}
    {{--                <h4 class="media-heading">Start Bootstrap--}}
    {{--                    <small>August 25, 2014 at 9:30 PM</small>--}}
    {{--                </h4>--}}
    {{--                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras--}}
    {{--                purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate--}}
    {{--                fringilla. Donec lacinia congue felis in faucibus.--}}
    {{--               --}}
    {{--            </div>--}}
    {{--        </div>--}}

@endsection
