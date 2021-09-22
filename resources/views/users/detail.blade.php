<!-- View user's profile and send message  -->
@extends('layouts.default')

@section('title')
    {{ $user->name }}'s profile
@endsection

@section('content')
    <hr>
    <h1>{{ $user->name }}</h1>

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
                                    <h4>{{$user->name}}</h4>
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
                                    {{$user->name}}
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
                                    {{$user->phone}}
                                </div>
                            </div>
                            
                        </div>
                    </div>


                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
            <form method="POST" action="/users/{{$user->id}}">
                @csrf
                <div class="form-group">
                    <label for="messageContent">Message</label>
                    <input class="d-none" type="text" name="id_recv" value="{{$user->id}}" id="">
                    <input class="d-none" type="text" name="id_send" value="{{Auth::user()->id}}" id="">
                    {{-- <input class="d-none" type="text" name="time_send" value="{{now()->toDateTimeString('hh:mm::ss YY-mm-dd') }}" id=""> --}}
                    <input class="d-none" type="text" name="name_send" value="{{Auth::user()->name}}" id="">
                    <textarea class="form-control" name="content" id="messageContent" cols="30" rows="10"></textarea>
                    <button class="btn btn-success mt-2" type="submit">Send</button>
                </div>

            </form>
        </div>
        <div class="tab-pane fade" id="nav-sent" role="tabpanel" aria-labelledby="nav-sent-tab">
            <div class="card mt-5">
                <div class="card-header">
                    <h3>Sent Messages</h3>
                </div>
              
                <div class="col-md-3 my-3 ms-3">
                    
                </div>
                <div class="card-body">
                    <table class="table table-bordered ">
                        <thead class="bg-primary text-white">
                            <tr>
                                <th scope="col">Time</th>
                                <th scope="col">Content</th>
                                {{-- <th scope="col"></th> --}}
                            </tr>
                        </thead>
                        <tbody>
                          @foreach ($messages as $item)
                          <tr>
                            {{-- <th scope="row">{{$item->id}}</th> --}}
                            <td>{{$item->time_send}}</td>
                            <td>{{$item->content}}</td>
                            {{-- <td>
                                <button class="btn btn-success">Detail</button>
                                <button class="btn btn-danger">Delete</button>
                            </td> --}}
                            {{-- <td>{{$item->name_send}}</td> --}}
                        </tr>
                          @endforeach
                           
              
                        </tbody>
                    </table>
                </div>
                
              </div>
        </div>
    </div>
    </div>
@endsection
