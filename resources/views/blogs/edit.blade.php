@extends('layouts.app')

@section('content')
<h1>Edit Blog</h1>
<form action="{{ route('blogs.update', $blog->id) }}" method="POST">
    @csrf
    @method('PUT')
    <label for="title">Title:</label>
    <input type="text" name="title" id="title" value="{{ $blog->title }}" required>
    <label for="content">Content:</label>
    <textarea name="content" id="content" required>{{ $blog->content }}</textarea>
    <button type="submit">Update</button>
</form>
<script>
    CKEDITOR.replace('content');
</script>
@endsection