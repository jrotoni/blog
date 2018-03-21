@extends('layout.app')

@section('name')
Tuitt Inc
@endsection

@section('title')
    Articles List
@endsection

@section('main_content')
        
    <ul>
    @foreach($articles as $article)
        {{--  <li><a href="articles/{{$article->id}}">{{$article->title}}</a></li>  --}}
        <li><a href={{url("/articles/$article->id")}}>{{$article->title}}</a></li>
    @endforeach
    </ul>
    
@endsection

