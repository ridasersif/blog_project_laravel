@extends('base')

@section('title', ($isUpdate?'Update':'Create').' Articles')
@php
 $route=route('articles.store');
 if($isUpdate){
    $route=route('articles.update',$article->id);
 }
@endphp

@section('content')
    <h1>@yield('title')
        <a href="{{route('articles.store')}}">List of Articles </a> 
    </h1>
    <div class="container mt-5">
    
        <form action="{{$route}}" method="POST" enctype="multipart/form-data">
            @csrf
            
            @if ($isUpdate)
            @method('PUT')
            @endif
            
   
            <div class="mb-4">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title',$article->title) }}" >
                @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
     
            <div class="mb-4">
                <label for="content" class="form-label">Content</label>
                <textarea class="form-control @error('content') is-invalid @enderror" id="content" name="content" rows="6" >{{ old('content',$article->content) }}</textarea>
                @error('content')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
     
        
            <div class="mb-4">
                <label for="image" class="form-label">Image</label>
                <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image" accept="image/*">
                @error('image')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                @if ($isUpdate)
                    <div>
                        <td><img src="/storage/{{$article->image }}" alt="image" height="100px" width="100px"></td>
                    </div>
                @endif
                
            </div>
       
            <button type="submit" class="btn btn-success btn-lg w-100">{{$isUpdate?'Save Modifications':'Create  Article'}}</button>
        </form>
    </div>
@endsection
