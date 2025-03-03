@extends('base')

@section('title', 'categories')

@section('content')
    <h1>@yield('title')
        <a href="{{ route('categories.create') }}">Create Category</a>
    </h1>

    <!-- Table to display articles -->
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($categories as $category)
                <tr>
                    <td align="center">{{ $category->id }}</td>
                    <td align="center">{{ $category->name }}</td>
                    <td align="center">
                        <a href="{{ route('categories.show', $category->id) }}" class="btn btn-info btn-sm">show</a>

                        <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <!-- Form for Deletion -->
                        <form action="{{ route('categories.destroy', $category->id) }}" method="POST" class="delete-form" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm delete-btn" data-id="{{ $category->id }}">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center"><h4>No Articles Available</h4></td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{$categories->links()}}
@endsection


    