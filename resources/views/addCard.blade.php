@extends('layouts.app')

@section('content')
<form action="{{ route('addGoalsItem') }}" method="POST">
    @csrf
    Card : <input name="name">
    <input type="hidden" name="goal_id" value="{{ $goal->id }}">
    <input type="hidden" name="list_id" value="{{ $goal->list_id }}">
    <button>SUBMIT</button>
</form>
@endsection
