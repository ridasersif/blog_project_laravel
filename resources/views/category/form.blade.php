@extends('base')

@section('title', ($isUpdate?'Update':'Create').' category')
@php
 $route=route('categories.store');
 if($isUpdate){
    $route=route('categories.update',$category->id);
 }
@endphp

@section('content')
    <h1>@yield('title')
        <a href="{{route('categories.store')}}">List of categories </a> 
    </h1>
    <div class="container mt-5">
    
        <form action="{{$route}}" method="POST" enctype="multipart/form-data">
            @csrf
            
            @if ($isUpdate)
            @method('PUT')
            @endif
            <div class="mb-4">
                <label for="title" class="form-label">name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="title" name="name" value="{{ old('name',$category->name) }}" >
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-success btn-lg w-100">{{$isUpdate?'Save Modifications':'Create  category'}}</button>
        </form>
    </div>
@endsection
