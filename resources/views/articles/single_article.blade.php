@extends('layout.app')

@section('title')
    {{$article->title}}
@endsection

@section('main_content')
  @if(count($errors)>0)
    <div class="alert alert-danger">
      @foreach($errors->all() as $error)
      <p>{{$error}}</p>
      @endforeach
    </div>
  @endif
  
    <p>
    {{$article->content}}
    </p>
    <p>
        @if($article->updated_at != null)
        <p>Created at: {{ $article->created_at->diffForHumans() }}</p>
        <p>Updated at: {{ $article->updated_at->diffForHumans() }}</p>
        <p>Created by: {{ $article->user->name }}</p>
        {{--  <p>Comment: {{ $article->comments }}</p>  --}}
        <p>Comments: </p>
        @foreach($article->comments as $comment)
        <p>{{$comment->comment}} by {{$comment->user->name}}</p>
        @endforeach
        @endif
    </p>
    {{--  {{$article->id}}  --}}
  <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">Edit this article</button> 
  <form method="POST" action='{{url("articles/$article->id/delete")}}'>

    {{ csrf_field() }}
    {{method_field('delete')}}

{{--  <a class="btn btn-danger" href='{{url("articles/$article->id/delete")}}'>Delete</a>  --}}
    <button class="btn btn-danger">Delete this article</button>
  </form>

@if(Session::has('create_comment_success'))
        <div class="alert alert-success">
        {{Session::get('create_comment_success')}}
        </div>
    @endif 
    
<form action='{{url("articles/$article->id/comment")}}' method="POST">
   {{ csrf_field() }}
  <div class="form-group">
  <div class="col-sm-12">
  <textarea class="form-control" rows="5" id="comment" name="comment"></textarea>
  </div>
  <button class="btn btn-success">Add Comment</button>
  </div>
</form>

<form action='{{url("articles/$article->id/tags")}}' method="POST">
  {{ csrf_field() }}
  @foreach($tags as $tag)
  <div class="checkbox">
  <label><input type="checkbox" name="tag[]" value="{{$tag->id}}">{{$tag->name}}</label>
  </div>
  @endforeach
 <button type="submit" class="btn btn-info">Add</button>
</form>

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" method="POST" action='{{url("articles/$article->id/edit")}}'>
            
            {{csrf_field()}}

            <div class="panel panel-default">
                <div class="panel-heading">Add New Article</div>
                <div class="panel-body">
  <div class="form-group">
    <label class="control-label col-sm-2" for="title">Title</label>
    <div class="col-sm-10">
    <input type="text" class="form-control" id="title" name="title" value="{{$article->title}}">
    </div>
  </div>

  <div class="form-group">
  <label class="control-label col-sm-2" for="content">Content</label>
  <div class="col-sm-10">
  <textarea class="form-control" rows="5" id="content" name="content">{{$article->content}}</textarea>
  </div>
</div>

  <div class="form-group"> 
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-success pull-right">Save</button>
    </div>
  </div>
                </div>
            </div>
</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
@endsection