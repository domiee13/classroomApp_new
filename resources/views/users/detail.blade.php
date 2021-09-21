<!-- View user's profile and send message  -->
@extends('layouts.app')

@section('title')
    {{ $user->fullname }}'s profile
@endsection

@section('content')
    <hr>
    <h1>{{ $user->fullname }}</h1>

    <nav class="mt-3">
        <div class="nav nav-tabs " id="nav-tab" role="tablist">
            <button class="nav-link active" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile"
                type="button" role="tab" aria-controls="nav-profile" aria-selected="true">Profile</button>
            <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact"
                type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Contact</button>
            <button class="nav-link" id="nav-sent-tab" data-bs-toggle="tab" data-bs-target="#nav-sent" type="button"
                role="tab" aria-controls="nav-sent" aria-selected="false">Sent</button>
        </div>
    </nav>
    <div class="tab-content mt-4" id="nav-tabContent">
        <div class="tab-pane fade show active" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
            <div class="row gutters-sm">
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center">
                                <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin"
                                    class="rounded-circle border border-second border-2" width="150">
                                <div class="mt-3">
                                    <h4>{{$user->fullname}}</h4>
                                    <p class="text-secondary mb-1">Student</p>
                                    {{-- <p class="text-muted font-size-sm">Lorem</p> --}}
                                    {{-- <button class="btn btn-primary">Follow</button>
                                    <button class="btn btn-outline-primary">Message</button> --}}
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                {{-- User's info  --}}
                <div class="col-md-8">
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Username</h6>
                                </div>
                                <div class="col-sm-9 text-dark">
                                    {{$user->username}}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Full Name</h6>
                                </div>
                                <div class="col-sm-9 text-dark">
                                    {{$user->fullname}}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Email</h6>
                                </div>
                                <div class="col-sm-9 text-dark">
                                    {{$user->email}}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Phone</h6>
                                </div>
                                <div class="col-sm-9 text-dark">
                                    {{$user->phonenumber}}
                                </div>
                            </div>
                            
                        </div>
                    </div>


                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
            <form action="">
                <div class="form-group">
                    <label for="messageContent">Message</label>
                    <textarea class="form-control" name="" id="messageContent" cols="30" rows="10"></textarea>
                    <button class="btn btn-success mt-2" type="submit">Send</button>
                </div>

            </form>
        </div>
        <div class="tab-pane fade" id="nav-sent" role="tabpanel" aria-labelledby="nav-sent-tab">Sent
            {{ $messages }}
        </div>
    </div>
    </div>
@endsection
