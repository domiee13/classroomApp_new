@extends('layouts.default')

@section('title')
  Assignments
@endsection

@section('content')
    <div class="card mt-5">
        <div class="card-header">
            <h3>Assignments</h3>
        </div>

        <div class="col-md-3 my-3 ms-3">
            <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Add <i class="fas fa-plus-square"></i>
            </button>
        </div>
        <div class="card-body">
            <table class="table table-bordered ">
                <thead class="bg-primary text-white">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Due to</th>
                        <th scope="col">Description</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                  @foreach ($assignments as $item)
                  <tr>
                    <th scope="row">{{$item->id}}</th>
                    <td>{{date('d-m-Y', strtotime($item->deadline))}}</td>
                    <td>{{$item->desc}}</td>
                    <td>
                        <a href="/assignments/admin/{{$item->id}}"class="btn btn-success">Detail</a>
                        <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirmModal{{$item->id}}">Delete</button>
                    </td>
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
        <!-- Add assignment modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog ">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add new assignment</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <form action="/assignments/add" method="POST" autocomplete="off" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                          <label for="datepicker">Deadline:</label>  
                          <input class="form-control" type="text" id="datepicker" name="deadline" required>
                          <div class="mt-2">
                            <label for="description">Description</label>
                            <textarea class="form-control" placeholder="" id="description" name="desc" required></textarea>
                          </div>
                          <div class="mt-3">
                            <label for="formFile" class="form-label">File</label>
                            <input class="form-control" type="file" id="formFile" name="file" required>
                          </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Add assignment</button>
                    </div>
                  </form>
                </div>
            </div>
        </div>
        <!-- Delete confirm modal -->
        @foreach($assignments as $item)
    <form action="/assignments/admin/del" method="POST">
      @csrf
    <div class="modal fade" id="confirmModal{{$item->id}}" tabindex="-1" aria-labelledby="confirmModalLabel{{$item->id}}" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
              <input class="d-none" type="text" value="{{$item->id}}" name="assignment_id">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmModalLabel{{$item->id}}">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger">Delete</button>
                </div>
            </div>
        </div>
    </div>
  </form>
  @endforeach
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"
        integrity="sha512-uto9mlQzrs59VwILcLiRYeLKPPbS/bT71da/OEBYEwcdNUk8jYIy+D176RYoop1Da+f9mvkYrmj5MCLZWEtQuA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $(function() {
            $("#datepicker").datepicker({ dateFormat: 'dd-mm-yy' });
        });
    </script>
    </script>

@endsection
