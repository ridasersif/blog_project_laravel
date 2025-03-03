@extends('base')

@section('title', 'categories')

@section('content')
    <h1>Category : {{$category->name}}
        <a href="{{ route('categories.index') }}">Go back</a>
    </h1>

    <!-- Table to display articles -->
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>name</th>
                <th>Update article</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($articles as $article)
                <tr>
                    <td align="center">{{ $article->id }}</td>
                    <td align="center">{{ $article->title }}</td>
                    <td align="center">
                        <a href="{{ route('articles.edit', $article->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center"><h4>No Articles Available</h4></td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection


    