@extends('layouts.app')

@section('content')
<h1>Blogs</h1>
<a href="{{ route('blogs.create') }}" class="btn btn-primary mb-3">Create Blog</a>

<div class="row">
    @foreach($blogs as $blog)
    <div class="col-md-4 mb-4">
        <div class="card">
            <div class="card-body">
                <h2 class="card-title">{{ $blog->title }}</h2>
                <p class="card-text">{!! Str::limit($blog->content, 150) !!}</p>
                <a href="{{ route('blogs.show', $blog->id) }}" class="btn btn-info">Read More</a>
                <a href="{{ route('blogs.edit', $blog->id) }}" class="btn btn-warning">Edit</a>
                <form action="{{ route('blogs.destroy', $blog->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection