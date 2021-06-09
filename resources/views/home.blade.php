@extends('layout.main')

@section('title', 'Home')

@section('content')

    @include("produtos._products", ['lista'=>$lista]) 

@endsection