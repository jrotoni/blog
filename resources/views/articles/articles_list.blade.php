@extends('layout.app')

@section('name')
Tuitt Inc
@endsection

@section('title')
    Articles List
@endsection

@section('main_content')
    @if(Session::has('create_article_success'))
        <div class="alert alert-success">
        {{Session::get('create_article_success')}}
        </div>
    @endif        
    <ul>
    @foreach($articles as $article)
        {{--  <li><a href="articles/{{$article->id}}">{{$article->title}}</a></li>  --}}
        <li><a href={{url("/articles/$article->id")}}>{{$article->title}}</a></li>
    @endforeach
    </ul>
    
@endsection

