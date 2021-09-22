@extends('layouts.default')

@section('title')
    Edit user
@endsection

@section('content')
<div class="container mt-5">
  <div class="row justify-content-center">
      <div class="col-md-8">
          <div class="card">
              <div class="card-header">{{ __('Edit profile') }}</div>
              @if(Session::get('error'))
              <div class="alert alert-danger" role="alert">
                {{Session::get('error')}}
              </div>
              @endif
              <div class="card-body">
                  <form method="POST" action="/profile">
                      @csrf

                      <div class="form-group row mt-2">
                          <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                          <div class="col-md-6">
                              <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$user->name}}" >

                              @error('name')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                          </div>
                      </div>
                      <div class="form-group row mt-2">
                          <label for="username" class="col-md-4 col-form-label text-md-right">{{ __('Username') }}</label>

                          <div class="col-md-6">
                              <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{$user->username}}" >

                              @error('username')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                          </div>
                      </div>

                      <div class="form-group row mt-2">
                          <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                          <div class="col-md-6">
                              <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{$user->email}}" required autocomplete="email">

                              @error('email')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                          </div>
                      </div>
                      
                      <div class="form-group row mt-2">
                          <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Phone number') }}</label>

                          <div class="col-md-6">
                              <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{$user->phone}}" required autocomplete="phone">

                              @error('phone')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                          </div>
                      </div>

                      
                      <div class="form-group row mt-2">
                          <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('New Password') }}</label>

                          <div class="col-md-6">
                              <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                              @error('password')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                          </div>
                      </div>

                      <div class="form-group row mt-2">
                          <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm New Password') }}</label>

                          <div class="col-md-6">
                              <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                          </div>
                      </div>

                      <div class="form-group row mb-0 mt-2">
                          <div class="col-md-6 offset-md-4">
                              <button type="submit" class="btn btn-success">
                                  {{ __('Save') }}
                              </button>
                          </div>
                      </div>
                  </form>
              </div>
          </div>
      </div>
  </div>
</div>
@endsection