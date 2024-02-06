@extends('layouts.app')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">People /</span> Food Partners</h4>

        <div class="row">
            <div class="col-md-12">
                <div class="nav-align-top mb-4">
                    <ul class="nav nav-pills mb-3" role="tablist">
                        <li class="nav-item">
                            <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab"
                                data-bs-target="#navs-pills-top-home" aria-controls="navs-pills-top-home"
                                aria-selected="true">
                                Food Partners
                            </button>
                        </li>
                        <li class="nav-item">
                            <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                                data-bs-target="#navs-pills-top-profile" aria-controls="navs-pills-top-profile"
                                aria-selected="false">
                                New Applications
                                <span
                                    class="badge rounded-pill badge-center h-px-20 w-px-20 bg-danger">{{ $newFoodpartnersCount }}</span>

                            </button>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="navs-pills-top-home" role="tabpanel">
                            <div class="table-responsive text-nowrap">
                                <table class="table table-hover dataTable">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>Name</th>
                                            <th>Location</th>
                                            <th>Availability</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody class="table-border-bottom-0">
                                        @foreach ($foodpartners as $foodpartner)
                                            <tr>
                                                <td><img src="{{ $foodpartner->image ? asset('img/stores/' . $admin->image) : asset('img/no-image.png') }}"
                                                        alt="Avatar" class="rounded" height="40" width="40" /></td>
                                                <td>{{ $foodpartner->name }}</td>
                                                <td>{{ $foodpartner->state }}</td>
                                                <td><span
                                                        class="badge {{ $foodpartner->availability == '1' ? 'bg-label-success' : 'bg-label-warning' }} me-1">{{ $foodpartner->availability == '1' ? 'Active' : 'Away' }}</span>
                                                </td>
                                                <td>
                                                    <a class=""
                                                        href="{{ route('foodpartners.partner', $foodpartner->id) }}"
                                                        style="color: var(--foodgrubber-secondary-color);"><i
                                                            class="bx bx-view me-1"></i> View</a>
                                                    {{-- <div class="dropdown">
                                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                                        <i class="bx bx-dots-vertical-rounded"></i>
                                                    </button>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item" href="{{route('foodpartners.edit', $foodpartner->id)}}"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                                                        <a class="dropdown-item" href="{{route('foodpartners.delete', $foodpartner->id)}}"><i class="bx bx-trash me-1"></i> Delete</a>
                                                    </div>
                                                </div> --}}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="navs-pills-top-profile" role="tabpanel">
                            <div class="table-responsive text-nowrap">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            {{-- <th></th> --}}
                                            <th>Name</th>
                                            <th>Location</th>
                                            <th>Phone</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody class="table-border-bottom-0">
                                        @foreach ($newFoodpartners as $newFoodpartner)
                                            <tr>
                                                <td>{{ $newFoodpartner->name }}</td>
                                                <td>{{ $newFoodpartner->state }}</td>
                                                <td>{{ $newFoodpartner->phone }}</td>
                                                <td>
                                                    <form action="{{ route('foodpartners.new', $newFoodpartner->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        <input type="hidden" name="foodpartner_id"
                                                            value="{{ $newFoodpartner->id }}">
                                                        <a href="#" class="" data-bs-toggle="modal"
                                                            data-bs-target="#viewNewFoodpartnerModal"
                                                            style="color: var(--foodgrubber-secondary-color);">View</a>
                                                    </form>

                                                    {{-- <div class="dropdown">
                                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                                        <i class="bx bx-dots-vertical-rounded"></i>
                                                    </button>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item" href="{{route('foodpartners.edit', $foodpartner->id)}}"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                                                        <a class="dropdown-item" href="{{route('foodpartners.delete', $foodpartner->id)}}"><i class="bx bx-trash me-1"></i> Delete</a>
                                                    </div>
                                                </div> --}}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- View New Foodpartner Modal -->
                <div class="modal fade" id="viewNewFoodpartnerModal" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel1">New Foodpartner</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-6 mb-3">
                                        <label for="nameBasic" class="form-label">Name</label>
                                        <input type="text" id="nameBasic" class="form-control" name=""
                                            value="{{ $newFoodpartner->name }}" />
                                    </div>
                                    <div class="col-6 mb-3">
                                        <label for="nameBasic" class="form-label">Phone</label>
                                        <input type="text" id="nameBasic" class="form-control" name=""
                                            value="{{ $newFoodpartner->phone }}" />
                                    </div>
                                    <div class="col-12 mb-3">
                                        <label for="nameBasic" class="form-label">Address</label>
                                        <input type="text" id="nameBasic" class="form-control" name=""
                                            value="{{ $newFoodpartner->address }}" />
                                    </div>
                                    <div class="col-4 mb-3">
                                        <label for="nameBasic" class="form-label">City</label>
                                        <input type="text" id="nameBasic" class="form-control" name=""
                                            value="{{ $newFoodpartner->city }}" />
                                    </div>
                                    <div class="col-4 mb-3">
                                        <label for="nameBasic" class="form-label">State</label>
                                        <input type="text" id="nameBasic" class="form-control" name=""
                                            value="{{ $newFoodpartner->state }}" />
                                    </div>
                                    <div class="col-4 mb-3">
                                        <label for="nameBasic" class="form-label">Postcode</label>
                                        <input type="text" id="nameBasic" class="form-control" name=""
                                            value="{{ $newFoodpartner->postcode }}" />
                                    </div>
                                    <div class="col-12 mb-3">
                                        <label for="nameBasic" class="form-label">Description</label>
                                        <textarea name="" id="" cols="30" rows="10" class="form-control">{{ $newFoodpartner->description }}</textarea>
                                    </div>
                                    <div class="col-6 mb-3">
                                        <label for="nameBasic" class="form-label">Food Certificate Number</label>
                                        <input type="text" id="nameBasic" class="form-control" name=""
                                            value="{{ $newFoodpartner->food_cert_number }}" />
                                    </div>
                                    <div class="col-6 mb-3">
                                        <label for="nameBasic" class="form-label">Food Certificate</label>
                                        <div class="btn-group d-block" role="group" aria-label="Basic example">
                                            <button type="button" class="btn" style="background-color: var(--foodgrubber-tertiary-color); color: var(--foodgrubber-primary-color);">View</button>
                                            <button type="button" class="btn" style="background-color: var(--foodgrubber-primary-color); color: var(--foodgrubber-tertiary-color);">Download <i
                                                    class="tf-icons bx bx-download"></i></button>
                                        </div>
                                        {{-- <input type="text" id="nameBasic" class="form-control" name=""
                                            value="{{ $newFoodpartner->food_cert }}" /> --}}
                                    </div>
                                    <div class="col-4 mb-3">
                                        <label for="nameBasic" class="form-label">Account Number</label>
                                        <input type="text" id="nameBasic" class="form-control" name=""
                                            value="{{ $newFoodpartner->account_number }}" />
                                    </div>
                                    <div class="col-4 mb-3">
                                        <label for="nameBasic" class="form-label">Sort Code</label>
                                        <input type="text" id="nameBasic" class="form-control" name=""
                                            value="{{ $newFoodpartner->sort_code }}" />
                                    </div>
                                    <div class="col-4 mb-3">
                                        <label for="nameBasic" class="form-label">Bank</label>
                                        <input type="text" id="nameBasic" class="form-control" name=""
                                            value="{{ $newFoodpartner->bank }}" />
                                    </div>
                                    <div class="col-6 mb-3">
                                        <label for="nameBasic" class="form-label">Logo</label>
                                        <img src="{{ $newFoodpartner->logo ? asset('img/stores/' . $newFoodpartner->logo) : asset('img/no-image.png') }}"
                                            alt="Avatar" class="rounded d-block" height="100" width="100" />
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline-secondary"
                                    data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- View New Foodpartner Modal -->
            </div>
        </div>
    </div>
@endsection
