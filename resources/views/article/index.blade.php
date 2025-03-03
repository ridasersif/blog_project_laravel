@extends('base')

@section('title', 'Articles')

@section('content')
    <h1>@yield('title')
        <a href="{{ route('articles.create') }}">Create Article</a>
    </h1>

    <!-- Table to display articles -->
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Content</th>
                <th>Category</th>
                <th>Image</th>
                <th>Status</th>

                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($articles as $article)
                <tr>
                    <td align="center">{{ $article->id }}</td>
                    <td align="center">{{ $article->title }}</td>
                    <td align="center">{{ $article->content }}</td>
                    <td align="center">{{ $article->category?->name}}</td>
                  
                    <td align="center"><img src="{{ asset('storage/' . $article->image) }}" alt="image" height="150px" width="150px"></td>
                    <td align="center">
                       
                        <button class="btn btn-{{ $article->status ? 'success' : 'danger' }} btn-sm toggle-status" data-id="{{ $article->id }}">
                            {{ $article->status ? 'Active' : 'Inactive' }}
                        </button>
                    </td>
                    <td align="center">
                        <a href="{{ route('articles.edit', $article->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <!-- Form for Deletion -->
                        <form action="{{ route('articles.destroy', $article->id) }}" method="POST" class="delete-form" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm delete-btn" data-id="{{ $article->id }}">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr align="center">
                    <td colspan="6" class="text-center"><h4>No Articles Available</h4></td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{$articles->links()}}

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(document).ready(function () {
           
            $('.toggle-status').on('click', function () {
                var button = $(this);
                var articleId = button.data('id');
                var currentStatus = button.text().trim().toLowerCase(); 
                Swal.fire({
                    title: 'Are you sure you want to change the status?',
                    text: 'This will change the status of the article.',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, change it!',
                    cancelButtonText: 'No, cancel'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: '/articles/toggle-status/' + articleId, 
                            method: 'POST',
                            data: {
                                _token: '{{ csrf_token() }}',
                                status: currentStatus === 'active' ? 0 : 1, 
                            },
                            success: function (response) {
                                if (response.status === 'success') {
                                    button.text(response.newStatus ? 'Active' : 'Inactive');
                                    button.removeClass('btn-success btn-danger');
                                    button.addClass(response.newStatus ? 'btn-success' : 'btn-danger');
                                }
                            },
                            error: function () {
                                Swal.fire('Error', 'Something went wrong!', 'error');
                            }
                        });
                    }
                });
            });
        });
    </script>
@endsection


    