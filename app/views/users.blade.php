@extends('layout')

@section('content')
    @foreach($users as $user)
        <p>{{ $user->name }} at {{ $user->email }}</p>
    @endforeach
@stop
