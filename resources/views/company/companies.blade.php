@extends('layouts.app')

@section('content')
<div class="container">
    <table class="table">
    <thead class="thead-light md-8">
        <tr>
        <th scope="col">Company</th>
        <th scope="col">Status</th>
        <th scope="col">Delete</th>
        </tr>
    </thead>
    <tbody>
        @foreach($companies as $company)
        <tr>
            <td>{{$company->name}}</td>
            <td>
                <a href="{{route('com.status',['company'=>$company->id])}}">
                    <button type="button" class="btn btn-{{ ($company->status=='active') ? "success" : "secondary" }}" >{{$company->status}}</button>
                </a>
            </td>
            <td>
                <a href="{{route('com.delete',['company'=>$company->id])}}">
                    <button type="button" class="btn btn-danger">Delete</button>
                </a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Add Company
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog ">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('addcom') }}">
                    @csrf
                        <div class="form-group row">
                            <label for="inputname" class="col-sm-4 col-form-label">Name of Company</label>
                            <div class="col-sm-7">
                                <input type="text" name="name" class="form-control" id="inputname" placeholder="Name">
                            </div>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="radios" id="exampleRadios1" value="active" checked>
                                <label class="form-check-label" for="exampleRadios1">
                                Active
                                </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="radios" id="exampleRadios2" value="inactive">
                                <label class="form-check-label" for="exampleRadios2">
                                inactive
                                </label>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit"class="btn btn-primary">Add</button>
                        </div>
                    </form>
            </div>
        </div>
    </div>


</div>
@endsection
