@extends('layouts.app')

@section('content')
    <h1>Edit Lab Journal Entry</h1>
    <form action="{{ route('lab-journal.update', $labJournal->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label>Title:</label>
        <input type="text" name="title" value="{{ $labJournal->title }}" required>
        <label>Description:</label>
        <textarea name="description" required>{{ $labJournal->description }}</textarea>
        <label>Date:</label>
        <input type="date" name="date" value="{{ $labJournal->date }}" required>
        <button type="submit">Update</button>
    </form>
@endsection
