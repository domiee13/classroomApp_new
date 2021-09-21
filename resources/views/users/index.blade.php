@extends('layouts.default')

@section('title')
    Users
@endsection

@section('content')
    <!-- <div class="row"> -->
    <div class="d-flex justify-content-between">
        <h1>Users</h1>
        <a href="" class="btn btn-success d-inline-block h-25 align-self-center">Add</a>
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
                        <!-- {{ $user }} -->
                        <tr>
                            <td>
                                {{ $user->id }}
                            </td>
                            <td>
                                {{ $user->username }}
                            </td>
                            <td>
                                {{ $user->fullname }}
                            </td>
                            <td>
                                {{ $user->phonenumber }}
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
                                <a href="/users/{{ $user->id }}" class="btn btn-success">View details</a>
                                <a href="/users/edit/{{ $user->id }}" class="btn btn-primary">Edit</a>
                                <a href="" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
@endsection
