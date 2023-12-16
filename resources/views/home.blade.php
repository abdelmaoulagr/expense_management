@extends('layouts.app')

@section('content')
<div class="container ">
    <div class="row justify-content-center">
        <div class="col-xl" style="width: 99%;">
            <div class="card" >

                <div class="card-header">Company :<b> {{ $company->name}}</b>

                    {{-- <div class="position-absolute top-0 end-0">
                        <button type="button" class="btn btn-light ">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-filter-right" viewBox="0 0 10 18">
                                <path d="M14 10.5a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0 0 1h3a.5.5 0 0 0 .5-.5m0-3a.5.5 0 0 0-.5-.5h-7a.5.5 0 0 0 0 1h7a.5.5 0 0 0 .5-.5m0-3a.5.5 0 0 0-.5-.5h-11a.5.5 0 0 0 0 1h11a.5.5 0 0 0 .5-.5"/>
                            </svg>
                            Filter
                        </button>
                    </div> --}}

                    <div class="dropdown position-absolute top-0 end-0">
                        <button class="btn  btn-light dropdown-toggle" type="button" style="background-color:#f1f3f5" data-bs-toggle="dropdown" aria-expanded="false">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-filter-right" viewBox="0 0 10 18">
                                <path d="M14 10.5a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0 0 1h3a.5.5 0 0 0 .5-.5m0-3a.5.5 0 0 0-.5-.5h-7a.5.5 0 0 0 0 1h7a.5.5 0 0 0 .5-.5m0-3a.5.5 0 0 0-.5-.5h-11a.5.5 0 0 0 0 1h11a.5.5 0 0 0 .5-.5"/>
                            </svg>
                            Filter
                        </button>

                        <div class="dropdown-menu">

                            <form method="POST" action="{{ route('filter.expense')}}">
                                @csrf



                                    <li class="dropdown-header"><h6>Payment Methods</h6> </li>

                                    <input type="hidden"name="company_id" value="{{$company->id}}">
                                    <li class="dropdown-item" >
                                        <input class="form-check-input" type="checkbox" name="All_Methods" id="exampleRadios1" value="All" checked >
                                        <label class="form-check-label" for="exampleRadios1">
                                        All
                                        </label>
                                    </li>

                                    <li class="dropdown-item" >
                                        <input class="form-check-input" type="checkbox" name="Debit_Card" id="exampleRadios1" value="Debit Card" >
                                        <label class="form-check-label" for="exampleRadios1">
                                        Debit Card
                                        </label>
                                    </li>

                                    <li class="dropdown-item" >
                                        <div  class="form-check">
                                            <input class="form-check-input" type="checkbox" name="Cache" id="exampleRadios1" value="Cache" >
                                            <label class="form-check-label" for="exampleRadios1">
                                            Cache
                                            </label>
                                        </div>
                                    </li>

                                    <li class="dropdown-item" >
                                        <div  class="form-check">
                                            <input class="form-check-input" type="checkbox" name="Checks" id="exampleRadios1" value="Checks" >
                                            <label class="form-check-label" for="exampleRadios1">
                                            Checks
                                            </label>
                                        </div>
                                    </li>

                                    <li class="dropdown-item" >
                                        <div  class="form-check">
                                            <input class="form-check-input" type="checkbox" name="Bank_Transfer" id="exampleRadios1" value="Bank Transfer" >
                                            <label class="form-check-label" for="exampleRadios1">
                                            Bank Transfer
                                            </label>
                                        </div>
                                    </li>

                                    <li class="dropdown-item" >
                                        <div  class="form-check">
                                            <input class="form-check-input" type="checkbox" name="Autopay" id="exampleRadios1" value="Autopay" >
                                            <label class="form-check-label" for="exampleRadios1">
                                            Autopay
                                            </label>
                                        </div>
                                    </li>



                                <li><hr class="dropdown-divider"></li>



                                    <li class="dropdown-header"><h6>Category</h6> </li>

                                    <li class="dropdown-item" >
                                        <input class="form-check-input" type="checkbox" name="All_Categories" id="exampleRadios1" value="All" checked >
                                        <label class="form-check-label" for="exampleRadios1">
                                        All
                                        </label>
                                    </li>

                                    <li class="dropdown-item" >
                                        <input class="form-check-input" type="checkbox" name="Office" id="exampleRadios1" value="Office" >
                                        <label class="form-check-label" for="exampleRadios1">
                                        Office
                                        </label>
                                    </li>

                                    <li class="dropdown-item" >
                                        <input class="form-check-input" type="checkbox" name="Utilities" id="exampleRadios1" value="Utilities" >
                                        <label class="form-check-label" for="exampleRadios1">
                                        Utilities
                                        </label>
                                    </li>

                                    <li class="dropdown-item" >
                                        <input class="form-check-input" type="checkbox" name="Equipment" id="exampleRadios1" value="Equipment" >
                                        <label class="form-check-label" for="exampleRadios1">
                                        Equipment
                                        </label>
                                    </li>

                                    <li class="dropdown-item" >
                                        <input class="form-check-input" type="checkbox" name="Insurance" id="exampleRadios1" value="Insurance" >
                                        <label class="form-check-label" for="exampleRadios1">
                                        Insurance
                                        </label>
                                    </li>

                                    <li class="dropdown-item" >
                                        <input class="form-check-input" type="checkbox" name="Travel" id="exampleRadios1" value="Travel" >
                                        <label class="form-check-label" for="exampleRadios1">
                                        Travel
                                        </label>
                                    </li>


                                <ul class="dropdown-item">
                                    <div class="d-grid ">
                                    <button type="submit"class="btn btn-primary">Apply</button>
                                    </div>
                                </ul>
                            </form>


                        </div>
                    </div>

                </div>


                <div class="card-body text-center">
                    {{-- table of Expenses --}}
                    <table class="table">
                        <thead class="thead-light md-8">
                            <tr>
                            <th scope="col">Title</th>
                            <th scope="col">Amount</th>
                            <th scope="col">Payment Method</th>
                            <th scope="col">Category</th>
                            {{-- <th scope="col">Edit</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($expenses as $expense)
                            <tr>
                                <td>{{$expense->title}}</td>
                                <td>{{$expense->amount}} $ </td>
                                <td>{{$expense->method}}</td>
                                <td>{{$expense->category}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <br>
    <!-- Button trigger modal -->
    <div >
        <button type="button" class="btn btn-primary p-t-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Add Expense
        </button>
    </div>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Expense</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body ">
                        <form method="POST" action="{{ route('addexp')}}">
                        @csrf
                            <div class="form-group row gap-2">

                                <input type="hidden" name="company_id" value="{{$company->id}}">
                                <label for="inputname" class="col-sm-4 col-form-label">Title :</label>
                                <div class="col-sm-7">
                                    <input type="text" name="title" class="form-control" id="inputname" >
                                </div>

                                <label for="inputname" class="col-sm-4 col-form-label">Amount :</label>
                                <div class="col-sm-7">
                                    <div class="input-group ">
                                        <input type="number" name="amount" id="inputname"  step="0.01"  class="form-control" aria-label="Dollar amount (with dot and two decimal places)">
                                            <span class="input-group-text">$</span>
                                            <span class="input-group-text">0.00</span>
                                    </div>
                                </div>

                                <label for="inputname" class="col-sm-4 col-form-label">Payment Method :</label>
                                <div class="col-sm-7">
                                    <select class="form-select"  name="payment_method" id="inputname"  aria-label="Default select example">
                                        <option selected>Debit Card</option>
                                        <option value="Cash">Cash</option>
                                        <option value="Checks">Checks</option>
                                        <option value="Bank Transfer">Bank Transfer</option>
                                        <option value="Autopay">Autopay</option>
                                    </select>
                                </div>

                                <label for="inputname" class="col-sm-4 col-form-label">Category :</label>
                                <div class="col-sm-7">
                                    <select class="form-select" name="category" id="inputname"  aria-label="Default select example">
                                        <option selected>Office</option>
                                        <option value="Utilities">Utilities</option>
                                        <option value="Equipment">Equipment</option>
                                        <option value="Insurance">Insurance</option>
                                        <option value="Travel">Travel</option>
                                    </select>
                                </div>
                            </div>

                            {{-- <div class="form-check">
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
                            </div> --}}
                            <br>
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
