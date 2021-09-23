@extends('layouts.default')

@section('title')
    Challenge
@endsection

@section('content')
    <div class="card mt-5">
        <div class="card-header">
            <h3>Challenge</h3>
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
                        <th scope="col">Challenge name</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($challenges as $item)
                        <tr>
                            <th scope="row">{{ $item->id }}</th>
                            <td>{{ $item->name }}</td>
                            <td>
                                <button class="btn btn-success" data-bs-toggle="modal"
                                data-bs-target="#detailModal{{$item->id}}">Detail</button>
                                <button class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#deleteModal{{$item->id}}">Delete</button>
                            </td>
                        </tr>
                    @endforeach


                </tbody>
            </table>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger mt-2">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <!-- Add challenge modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog ">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add new challenge</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    {{-- Add new modal --}}
                    <form action="/challenges/add" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="challengename">Challenge name</label>
                            <input class="form-control" type="text" id="challengename" name="challengename" required>
                            <div class="mt-2">
                                <label for="hint">Hint</label>
                                <textarea class="form-control" placeholder="" id="hint" name="hint" required></textarea>
                            </div>
                            <div class="mt-3">
                                <label for="formFile" class="form-label">File</label>
                                <input class="form-control" type="file" id="formFile" name="file" required>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Add challenge</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Delete modal -->
    @foreach($challenges as $item)
    <form action="/challenges/delete" method="POST">
      @csrf
    <div class="modal fade" id="deleteModal{{$item->id}}" tabindex="-1" aria-labelledby="deleteModalLabel{{$item->id}}" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
              <input class="d-none" type="text" value="{{$item->id}}" name="id_chall">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel{{$item->id}}">Modal title</h5>
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
  <div class="modal fade" id="detailModal{{$item->id}}" tabindex="-1" aria-labelledby="detailModalLabel{{$item->id}}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
          <input class="d-none" type="text" value="{{$item->id}}" name="id_chall">
            <div class="modal-header">
                <h5 class="modal-title" id="detailModalLabel{{$item->id}}">Challenge detail</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <label for="">Challenge name</label><input class="form-control my-2" type="text" value="{{$item->name}}" aria-label="Disabled input example" disabled readonly>
              <label for="">Hint</label><input class="form-control my-2" type="text" value="{{$item->hint}}" aria-label="Disabled input example" disabled readonly>
              <label for="">File</label><input class="form-control my-2" type="text" value="{{$item->filepath}}" aria-label="Disabled input example" disabled readonly>
              <a href="/challenges/{{$item->id}}">Download</a>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>
  @endforeach
    </div>
@endsection
