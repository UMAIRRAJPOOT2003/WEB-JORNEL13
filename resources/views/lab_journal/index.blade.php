@extends('layouts.app')

@section('content')
    <h1>Lab Journals</h1>
    <a href="{{ route('lab-journal.create') }}">Create New Entry</a>
    @foreach ($journals as $journal)
        <div>
            <h3>{{ $journal->title }}</h3>
            <p>{{ $journal->description }}</p>
            <p>{{ $journal->date }}</p>
            <a href="{{ route('lab-journal.show', $journal->id) }}">View</a>
            <a href="{{ route('lab-journal.edit', $journal->id) }}">Edit</a>
            <form action="{{ route('lab-journal.destroy', $journal->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit">Delete</button>
            </form>
        </div>
    @endforeach
@endsection
