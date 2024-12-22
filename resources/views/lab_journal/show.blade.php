@extends('layouts.app')

@section('content')
    <h1>{{ $labJournal->title }}</h1>
    <p>{{ $labJournal->description }}</p>
    <p>{{ $labJournal->date }}</p>
    <a href="{{ route('lab-journal.index') }}">Back to List</a>
@endsection
