@extends('layouts.default')

@section('title')
  Your messages
@endsection

@section('content')
<div class="card mt-5">
  <div class="card-header">
      <h3>Messages</h3>
  </div>

  <div class="col-md-3 my-3 ms-3">
      
  </div>
  <div class="card-body">
      <table class="table table-bordered ">
          <thead class="bg-primary text-white">
              <tr>
                  <th scope="col">Time</th>
                  <th scope="col">Content</th>
                  <th scope="col">From</th>
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
              <td>{{$item->name_send}}</td>
          </tr>
            @endforeach
             

          </tbody>
      </table>
  </div>
  
</div>
@endsection