@extends('base')

@section('title', 'Articles')

@section('content')

    <!-- Navbar -->


    <!-- Title -->
    <div class="container mt-4">
        <h1 class="text-center fw-bold text-dark">Last Articles</h1>
    </div>

    <div class="container mt-4">
        <div class="row">
            @foreach ($articles as $article)
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card article-card shadow-lg border-0 rounded-4 overflow-hidden">
                        <div class="card-header bg-primary text-white text-center fw-bold">
                            {{ $article->title }}
                        </div>
                        <img src="{{ asset('storage/' . $article->image) }}" class="card-img-top"
                            style="height: 200px; object-fit: cover;">
                            <div class="text-center mt-2">
                                <span class="badge bg-info text-white px-3 py-2 fw-bold">
                                    {{ $article->category?->name }}
                                </span>
                            </div>
                            
                        <div class="card-body text-center">
                            <p class="card-text text-muted">{{ Str::limit($article->content, 100, '...') }}</p>
                            <a href="#" class="btn btn-primary fw-bold">Read More</a>
                        </div>
                        <div class="card-footer">
                            <small class="text-muted">{{$article->created_at}}</small>
                        </div>
                    </div>
                  
                </div>
            @endforeach
        </div>

 
        <div class="d-flex justify-content-center mt-4">
            {{ $articles->links() }}
        </div>
    </div>


    <style>
        .badge {
        font-size: 14px;
        border-radius: 20px;
        display: inline-block;
        }

        .article-card {
            transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
        }

        .article-card:hover {
            transform: scale(1.05);
            box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.2);
        }
    </style>

@endsection
