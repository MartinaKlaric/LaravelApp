@extends('app')

@section('style')
     <style>
         .my-background{
            background-color:pink;
         }
     </style>
@endsection

@section('content')
<div class="container flex justify-center my-background">
   <div class="mt-16">
    <h1>{{ $title }}</h1>

    @isset($data)    
       @forelse ($data as $media) 
          <p>{{ $media }}</p> 
       @empty
          <p>No data!</p>  
       @endforelse                
    @endisset

    <p>Random value is @random </p>

    {{date('d.m.Y', time())}}

@endsection



