@extends('layouts.default')

@section('title')
  Assignments
@endsection

@section('content')
    <a href="/assignments" class="btn btn-primary mt-2">Back</a>
    <div class="card mt-3">
        <div class="card-header">
            <h3>Assignments</h3>
        </div>

        <div class="col-md-3 my-3 ms-3">
            {{-- <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Add <i class="fas fa-plus-square"></i>
            </button> --}}
        </div>
        <div class="card-body">
            
            <div class="row">
                <p class="col-md-6">File: <a  href="/assignments/{{$assignment->id}}/get">{{end(explode("\\",$item->filepath))}}</a></p>
                <div class="col-md-6 text-danger">Due to: {{$assignment->deadline}}</div>
            </div>
            <div class="row">
                <h5 class="">Description:</h5>
                <div>{{$assignment->desc}}</div>
            </div>
            <form action="/assignments/{{$assignment->id}}" method="POST" enctype="multipart/form-data">
                @csrf
            <div class="my-3">
                <input class="d-none" type="text" value="{{$assignment->id}}" name="assignment_id">
                <input class="d-none" type="text" value="{{Auth::id()}}" name="user_id">
                <label for="formFile" class="form-label">Turn in</label>
                <input class="form-control" type="file" id="formFile" name="file">
            </div>
            <button type="submit" class="btn btn-success">Turn in</button>
        </form>
        <h4 class="mt-3">Your submitted exercise</h4>
        <table class="table table-bordered ">
            <thead class="bg-success text-white">
                <tr>
                    <th scope="col">Time submit</th>
                    <th scope="col">File</th>
                    <th scope="col">Student</th>
                </tr>
            </thead>
            <tbody>
              @foreach ($exercises as $item)
              <tr>
                <th scope="row">{{$item->time_send}}</th>
                <td><a  href="/assignments/admin/{{$item->id}}/get">{{end(explode("\\",$item->filepath))}}</a></td>
                <td>{{$item->student_name}}</td>
                {{-- <td>
                    <a href="/assignments/admin/{{$item->id}}"class="btn btn-success">Detail</a>
                    <button class="btn btn-danger">Delete</button>
                </td> --}}
            </tr>
              @endforeach
               

            </tbody>
        </table>
        </div>
        @if ($errors->any())
        <div class="alert alert-danger mt-2 mx-2">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
        

    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"
        integrity="sha512-uto9mlQzrs59VwILcLiRYeLKPPbS/bT71da/OEBYEwcdNUk8jYIy+D176RYoop1Da+f9mvkYrmj5MCLZWEtQuA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $(function() {
            $("#datepicker").datepicker();
        });
    </script>
    </script>

@endsection
