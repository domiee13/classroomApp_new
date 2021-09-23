@extends('layouts.default')

@section('title')
    Challenge
@endsection

@section('content')
    <div class="card mt-5">
        <div class="card-header">
            <h3>Challenge</h3>
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
                                <a class="btn btn-success" href="/challenges/view/{{$item->id}}">Detail</a>
                            </td>
                        </tr>
                    @endforeach


                </tbody>
            </table>
        </div>
    </div>
    {{-- Detail model  --}}
{{-- @foreach($challenges as $item)
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
  @endforeach --}}
    </div>
@endsection
