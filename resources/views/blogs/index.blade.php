@extends('layouts.app')

@section('content')
<h1>Blogs</h1>
<a href="{{ route('blogs.create') }}">Create Blog</a>
<ul>
    @foreach($blogs as $blog)
    <li>
        <h2>{{ $blog->title }}</h2>
        <p>{!! $blog->content !!}</p>
        <a href="{{ route('blogs.edit', $blog->id) }}">Edit</a>
        <form action="{{ route('blogs.destroy', $blog->id) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit">Delete</button>
        </form>
    </li>
    @endforeach
</ul>
@endsection