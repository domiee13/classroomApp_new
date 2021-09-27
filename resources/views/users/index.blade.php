@extends('layouts.default')

@section('title')
    Users
@endsection

@section('content')
    <!-- <div class="row"> -->
    <div class="d-flex justify-content-between">
        <h1>Users</h1>
        <a href="/users/create"
            class="btn btn-success d-inline-block h-25 align-self-center @if (!Auth::user()->isAdmin()) d-none @endif">Add</a>
    </div>

    <!-- </div> -->
    <hr>
    <div class="row">
        <div class="col-md-12">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>
                            #
                        </th>
                        <th>
                            Username
                        </th>
                        <th>
                            Full name
                        </th>
                        <th>
                            Phone
                        </th>
                        <th>
                            Email
                        </th>
                        <th>
                            Role
                        </th>
                        <th>
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>
                                {{ $user->id }}
                            </td>
                            <td>
                                {{ $user->username }}
                            </td>
                            <td>
                                {{ $user->name }}
                            </td>
                            <td>
                                {{ $user->phone }}
                            </td>
                            <td>
                                {{ $user->email }}
                            </td>
                            <td>
                                @if ($user->role == 0)
                                    <p class="text-danger">Teacher</p>
                                @else
                                    Student
                                @endif
                            </td>
                            <td>
                                <a href="home/users/{{ $user->id }}" class="btn btn-success">View details</a>
                                {{-- Check, only admin can edit --}}
                                @if (Auth::user()->role == 0)
                                    <a href="/users/edit/{{ $user->id }}" class="btn btn-primary">Edit</a>
                                @endif

                                {{-- Delete button with user account --}}
                                @if ($user->role == 1)
                                    <button class="btn btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal{{$user->id}} ">Delete {{ $user->id }}</button>
                                @endif

                            </td>
                    
                    <!-- Delete confirm modal -->
                   
                            {{-- {{$users}} --}}
                        {{-- {{ $user->id }} --}}
                        <form action="/users/deluser/{{ $user->id }}" method="POST">
                            @csrf

                            <div class="modal fade" id="exampleModal{{$user->id}}" tabindex="-1" aria-labelledby="exampleModalLabel {{$user->id}}"
                                aria-hidden="true">
                                <input class="" type=" text" name="id_user" value="{{ $user->id }}">


                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel{{$user->id}}">Confirm delete
                                            </h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Are you sure you want to delete this user?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Cancel</button>
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
@endsection
