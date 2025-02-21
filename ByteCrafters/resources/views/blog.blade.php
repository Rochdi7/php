@extends('layout.base')

@section('content')
<div class="container py-5 bg-soft-white">
    <div class="row">
        <!-- Blog Articles Section -->
        <div class="col-md-8">
            <h1 class="mb-4 pb-2 border-bottom border-electric-cyan text-deep-blue fw-bold">
                <i class="bi bi-newspaper"></i> Latest Articles
            </h1>
            @foreach ($posts as $post )
            <div class="card mb-4 border-0 rounded-4">
                <div class="card-body">
    
                    <h2 class="card-title text-electric-cyan fw-bold">
                        <i class="bi bi-lightbulb"></i> {{ $post->title }}
                    </h2>
                    <p class="card-text text-cool-gray">{{ $post->text }}</p>
                    <a href="#" class="btn-read">Read More →</a>
                    
                </div>
                
            </div>
            @endforeach
    </div>
           
        <!-- Sidebar - Categories -->
        <div class="col-md-4">
            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-body">
                    <h2 class="h5 text-deep-blue border-bottom border-electric-cyan pb-2 fw-bold">
                        <i class="bi bi-tags"></i> Categories
                    </h2>
                    <ul class="list-group list-group-flush">
                        @foreach ($categories as $categorie)
                        <li class="list-group-item bg-soft-white border-0">
                            <a href="#" class="category-link">
                                <i class="bi bi-chevron-right"></i> {{ $categorie->name }}
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Custom Styles -->
<style>
    /* Button Styling */
    .btn-read {
        display: inline-block;
        background: #F97316;
        color: white;
        border: none;
        padding: 5px 15px;
        border-radius: 15px;
        font-weight: bold;
        text-decoration: none;
        transition: all 0.3s ease-in-out;
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
    }

    .btn-read:hover {
        background: #E66310;
        color: white;
        transform: translateY(-2px);
        box-shadow: 0px 6px 12px rgba(0, 0, 0, 0.15);
    }

    /* Category Link Styling */
    .category-link {
        color: #0EA5E9;
        font-weight: 500;
        text-decoration: none;
        transition: all 0.3s ease-in-out;
        display: flex;
        align-items: center;
    }

    .category-link i {
        margin-right: 8px;
        transition: margin 0.3s ease-in-out;
    }

    .category-link:hover {
        color: #F97316;
        text-decoration: underline;
    }

    .category-link:hover i {
        margin-right: 12px;
    }
</style>
@endsection
