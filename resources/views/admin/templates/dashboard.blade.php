@extends('admin.templates.default')

@section('title', 'Dashboard')

@section('content')
    <h1 class="text-center">Hai {{ auth()->user()->name }}, Selamat Datang</h1>
@endsection