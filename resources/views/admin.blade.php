@extends('layouts.main')
    
@section('content') 
@foreach ($works as $work)
    <p>{{$work -> title}}</p>
    <img src="{{ asset('images/'.$work->path_img) }}" alt="profile Pic" height="200" width="200">
@endforeach
@endsection 