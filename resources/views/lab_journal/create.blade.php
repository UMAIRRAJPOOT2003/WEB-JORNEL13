@extends('layouts.app')

@section('content')
    <h1>Create Lab Journal</h1>
    <form action="{{ route('lab-journal.store') }}" method="POST">
        @csrf
        <label>Title:</label>
        <input type="text" name="title" required>
        <label>Description:</label>
        <textarea name="description" required></textarea>
        <label>Date:</label>
        <input type="date" name="date" required>
        <button type="submit">Save</button>
    </form>
@endsection
