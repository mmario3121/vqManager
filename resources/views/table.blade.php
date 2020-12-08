@extends('layouts.app')

@section('content')
@foreach ($list as $l)
    <div class="form-group" style="width: 40%; margin-left:30%">
        <input style="text-align: center" class=" border border-0 form-control"  value="{{ $l->name }}" style="background-color: #4a76a8; align-item:center;">
    </div>
@endforeach
    <div class="row mt-3 pr-4">
        <div class="col-1 offset-11 d-flex justify-content-end">
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="false" aria-expanded="false">
                    <i class="fas fa-ellipsis-h"></i>
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="#">Delete</a>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col p-5">
        <div class="progress">
            <div class="progress-bar bg-info" role="progressbar" aria-valuenow="70"
            aria-valuemin="0" aria-valuemax="100" style="width:70%">
            70%
            </div>
        </div>
        </div>
    </div>
    <div class="row d-flex justify-content-left">
        @foreach ($goals as $goal)
            <div class="col pl-5">
                <div class="list-group" style="max-width: fit-content;">
                    <a href="#" class="list-group-item list-group-item-action active">
                        {{ $goal->name }}
                    </a>
                    @foreach ($items as $i)
                        @if ($goal->id === $i->goal_id)
                            <a href="#" class="list-group-item list-group-item-action">
                                {{ $i->name }}
                            </a>
                        @endif


                    @endforeach
                    <a class="list-group-item list-group-item-action list-group-item-success" href="{{ route('addcard', $goal->id) }}">Add new card</a>
                </div>
            </div>
        @endforeach
            <div class="col pr-5">
                <div class="list-group" style="max-width: fit-content;">
                        <button  class="list-group-item list-group-item-action active" data-toggle="modal" data-target="#exampleModal">
                            + Add new column
                        </button>
                </div>
            </div>
    </div>

<div class="modal fade" id="exampleModal" data-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Name of the column: </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            @foreach ($list as $l)
                <form method="POST" action="{{ route('addGoals') }}">
                    @csrf
                    <input type="hidden" name="list_id" value="{{ $l->id }}">
                    <div class="modal-body">
                        <div class="form-group">
                            <input class="form-control" name="name">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary" >Add</button>
                    </div>
                </form>
            @endforeach

            </div>
        </div>
    </div>
</div>





@endsection
