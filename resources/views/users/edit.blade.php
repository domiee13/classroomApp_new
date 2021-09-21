<!-- View user's profile and send message  -->
@extends('layouts.app')

@section('title')
Edit user
@endsection

@section('content')
<hr>
<h1>{{$user->fullname}}</h1>

<nav class="mt-3">
    <div class="nav nav-tabs " id="nav-tab" role="tablist">
        <button class="nav-link active" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="true">Profile</button>
        <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Contact</button>
        <button class="nav-link" id="nav-sent-tab" data-bs-toggle="tab" data-bs-target="#nav-sent" type="button" role="tab" aria-controls="nav-sent" aria-selected="false">Sent</button>
    </div>
</nav>
<div class="tab-content mt-4" id="nav-tabContent">
    <div class="tab-pane fade show active" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">
                </div>
                <div class="col-md-6">
                    <div class="mb-3 row">
                        <label for="fullname" class="col-sm-2 col-form-label">Fullname</label>
                        <div class="col-sm-10">
                            <input type="text" readonly disabled class="form-control" id="fullname" value="{{$user->fullname}}">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="inputPassword">
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
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
    <div class="tab-pane fade" id="nav-sent" role="tabpanel" aria-labelledby="nav-sent-tab">Sent</div>
</div>
</div>
@endsection