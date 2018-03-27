@extends('layout.app')

@section('main_content')
<p>Name: {{$profile->name}}</p>
<p>Email: {{$profile->email}}</p>

@if(count($profile->articles)>0)
Articles:
<ul>
    @foreach($profile->articles as $article)
    <li>{{$article->title}}</li>     
    @endforeach
</ul>
@endif

@if(count($profile->comments)>0)
Comments:
<ul>
    @foreach($profile->comments as $comment)
    <li>{{$comment->comment}}</li>     
    @endforeach
</ul>
@endif
@endsection