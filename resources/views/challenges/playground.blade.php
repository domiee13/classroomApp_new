@extends('layouts.default')

@section('title')
    Challenge
@endsection

@section('content')
    <a href="/challenges" class="btn btn-primary mt-3 "><i class="fas fa-chevron-left"></i> Back </a>
    <div class="card mt-2">
        <div class="card-header">
            <h1 class="text-center">{{ $chall->name }}</h1>
        </div>


        <div class="card-body d-flex flex-column align-items-center">
            <div class="container">
                <div class="row">
                    <div class="col text-center my-2">
                        <button class="btn btn-success text-center" data-bs-toggle="modal" data-bs-target="#hintModal">
                            Show hint <i class="far fa-eye"></i>
                        </button>
                    </div>
                </div>
                <div class="row">
                    <div class="col text-center my-2">
                        <form action="/challenges/view/{{$chall->id}}" method="POST">
                          @csrf
                            <input class="form-control form-control-lg" type="text" placeholder="Type your answer"
                                aria-label=".form-control-lg example" name="answer">
                            <button class="btn btn-primary my-2" type="submit">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
            @if (Session::get('true'))
            <div class="row alert alert-success" role="alert">
                <p>{{Session::get('true')}}</p>
              </div>
            @endif
            @if (Session::get('error'))
            <div class="alert alert-danger mt-2 mx-2">
                <ul>
                    {{Session::get('error')}}
                </ul>
            </div>
        @endif
        </div>
    </div>


    </div>
    <!-- Hint modal -->
    <div class="modal fade" id="hintModal" tabindex="-1" aria-labelledby="hintModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="hintModalLabel">Hint</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    {{ $chall->hint }}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection
