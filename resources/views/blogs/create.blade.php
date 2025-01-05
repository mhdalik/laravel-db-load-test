@extends('layouts.app')

@section('content')
<h1>Create Blog</h1>
<form action="{{ route('blogs.store') }}" method="POST">
    @csrf
    <label for="title">Title:</label>
    <input type="text" name="title" id="title" required>
    <label for="content">Content:</label>
    <textarea name="content" id="content" required></textarea>
    <button type="submit">Submit</button>
</form>
<script>
    CKEDITOR.replace('content');
</script>
@endsection