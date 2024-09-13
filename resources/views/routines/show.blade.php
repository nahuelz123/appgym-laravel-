@extends('layouts.app')

@section('content')
<a href="#">Back</a>
    <h1>Title: {{ $user->name }}</h1>
    <p>Description: {{ $user->email }}</p>

@endsection