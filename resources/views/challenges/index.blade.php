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
                <th scope="row">{{$item->id}}</th>
                <td>{{$item->name}}</td>
                <td>
                  <button class="btn btn-success">Detail</button>
                  <button class="btn btn-danger">Delete</button>
                </td>
              </tr>
              @endforeach
              
              
            </tbody>
          </table>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog ">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Add new assignment</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                {{-- Add new modal  --}}
                <form>
                  <div class="form-group">
                    <label for="challengename">Challenge name</label>  
                    <input class="form-control" type="text" id="challengename">
                    <div class="mt-2">
                      <label for="hint">Hint</label>
                      <textarea class="form-control" placeholder="" id="hint"></textarea>
                    </div>
                    <div class="mt-3">
                      <label for="formFile" class="form-label">File</label>
                      <input class="form-control" type="file" id="formFile">
                    </div>
                  </div>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Save changes</button>
              </div>
            </form>
          </div>
      </div>
  </div>
</div>
@endsection
