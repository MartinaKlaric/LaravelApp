@extends('app')

@section('style')
    <style>
        .border {
            border: 1px solid black;
            padding: 1px;
        }
    </style>
@endsection

@section('content')
    <div class="container flex justify-center mt-16">
        <form action="{{ route('media.store') }}" method="post">
            @csrf
            <x-form.input type="text" :name="$name" class="border"/>
            @error('name')
                <p class="is-invalid"> {{ $message }}</p>
            @enderror
            <br>
            <input type="submit" value="Create" class="button">
        </form>
    </div>
@endsection