@extends('layouts.app')

@section('content')
<h1>{{ $blog->title }}</h1>
<div class="blog-content">
    {!! $blog->content !!}
</div>
<a href="{{ route('blogs.index') }}" class="btn btn-secondary mt-3">Back to Blogs</a>
@endsection