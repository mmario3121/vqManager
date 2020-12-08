@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-3 d-flex justify-content-center border-right">
        <ul class="nav flex-column pt-5">
            <li class="nav-item">
                <p style="color:darkgray">Lists</p>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="#">All lists</a>
            </li><li class="nav-item">
                <a class="nav-link active" style="color:black" href="#">In progress lists</a>
              </li><li class="nav-item">
                <a class="nav-link active" style="color:black" href="#">Complete lists</a>
              </li>
            <li class="nav-item">
                <p style="color:darkgray">My teams</p>
            </li>
            <li class="nav-item">
              <a class="nav-link" style="color:black" href="#">CSSE-1803</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" style="color:black" href="#">IITU</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" style="color:black" href="#">Caesar</a>
            </li>
          </ul>
    </div>
    <div class="col-9">
        <h2 class="pt-5"  style="color:#727272">My Lists</h2>
        <div class="row pt-5">
            @foreach ($lists as $list)
                @if ($list->user_id === Auth::user()->id)
                    <div class="col pr-0">
                        <a type="button" class="btn btn-info" href="{{ route('list', $list->id) }}" style="padding: 40px;">{{ $list->name }}</a>
                    </div>
                @endif

            @endforeach

        </div>

        <h2 class="pt-5"  style="color:#727272">Add List</h2>
        <div class="row pt-5">
            <div class="col">
                <button type="button" class="btn btn-outline-info" style="padding: 40px; size: 20px;" data-toggle="modal" data-target="#exampleModal">+</button>
            </div>
        </div>
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <form method="POST" action="{{ route('addList') }}">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            Name of the list: <input class="form-control" name="name">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary" >Add</button>
                        <a class="btn btn-secondary" href="{{ route('home') }}">Close</a>
                    </div>
                </form>
              </div>
            </div>
        </div>
    </div>
</div>
<br>
<br>
@endsection
