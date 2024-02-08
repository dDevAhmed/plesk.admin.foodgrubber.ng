@extends('layouts.app')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Foodpartners /</span> Foodpartner</h4>

        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <!-- Account -->
                    <div class="card-body">
                        <div class="d-flex align-items-start align-items-sm-center gap-4">
                            <img src="{{ $foodpartner->image ? asset('img/stores/' . $admin->image) : asset('img/no-image.png') }}"
                                alt="Avatar" class="rounded" height="160" width="160" />
                        </div>
                    </div>
                    <hr class="my-0" />
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6 mb-3">
                                <label for="nameBasic" class="form-label">Name</label>
                                <input type="text" id="nameBasic" class="form-control" name=""
                                    value="{{ $foodpartner->name }}" readonly />
                            </div>
                            <div class="col-6 mb-3">
                                <label for="nameBasic" class="form-label">Phone</label>
                                <input type="text" id="nameBasic" class="form-control" name=""
                                    value="{{ $foodpartner->phone }}" readonly />
                            </div>
                            <div class="col-12 mb-3">
                                <label for="nameBasic" class="form-label">Address</label>
                                <input type="text" id="nameBasic" class="form-control" name=""
                                    value="{{ $foodpartner->address }}" readonly />
                            </div>
                            <div class="col-4 mb-3">
                                <label for="nameBasic" class="form-label">City</label>
                                <input type="text" id="nameBasic" class="form-control" name=""
                                    value="{{ $foodpartner->city }}" readonly />
                            </div>
                            <div class="col-4 mb-3">
                                <label for="nameBasic" class="form-label">State</label>
                                <input type="text" id="nameBasic" class="form-control" name=""
                                    value="{{ $foodpartner->state }}" readonly />
                            </div>
                            <div class="col-4 mb-3">
                                <label for="nameBasic" class="form-label">Postcode</label>
                                <input type="text" id="nameBasic" class="form-control" name=""
                                    value="{{ $foodpartner->postcode }}" readonly />
                            </div>
                            <div class="col-12 mb-3">
                                <label for="nameBasic" class="form-label">Description</label>
                                <textarea name="" id="" cols="30" rows="10" class="form-control" readonly>{{ $foodpartner->description }}</textarea>
                            </div>
                            <div class="col-6 mb-3">
                                <label for="nameBasic" class="form-label">Food Certificate Number</label>
                                <input type="text" id="nameBasic" class="form-control" name=""
                                    value="{{ $foodpartner->food_cert_number }}" readonly />
                            </div>
                            <div class="col-6 mb-3">
                                <label for="nameBasic" class="form-label">Food Certificate</label>
                                <div class="btn-group d-block" role="group" aria-label="Basic example">
                                    <button type="button" class="btn"
                                        style="background-color: var(--foodgrubber-tertiary-color); color: var(--foodgrubber-primary-color);">View</button>
                                    <button type="button" class="btn"
                                        style="background-color: var(--foodgrubber-primary-color); color: var(--foodgrubber-tertiary-color);">Download
                                        <i class="tf-icons bx bx-download"></i></button>
                                </div>
                                {{-- <input type="text" id="nameBasic" class="form-control" name=""
                                    value="{{ $foodpartner->food_cert }}" /> --}}
                            </div>
                            <div class="col-4 mb-3">
                                <label for="nameBasic" class="form-label">Account Number</label>
                                <input type="text" id="nameBasic" class="form-control" name=""
                                    value="{{ $foodpartner->account_number }}" readonly />
                            </div>
                            <div class="col-4 mb-3">
                                <label for="nameBasic" class="form-label">Sort Code</label>
                                <input type="text" id="nameBasic" class="form-control" name=""
                                    value="{{ $foodpartner->sort_code }}" readonly />
                            </div>
                            <div class="col-4 mb-3">
                                <label for="nameBasic" class="form-label">Bank</label>
                                <input type="text" id="nameBasic" class="form-control" name=""
                                    value="{{ $foodpartner->bank }}" readonly />
                            </div>
                        </div>
                        <div class="mb-3"></div>
                        @if ($foodpartner->staus == 'p')
                            <form action="{{ route('foodpartners.accept', $foodpartner->id) }}" method="POST">
                                @csrf
                                @method('PUT') <input type="hidden" name="foodpartner_id"
                                    value="{{ $foodpartner->id }}">
                                <button type="submit" class="btn"
                                    style="background-color: var(--foodgrubber-tertiary-color); color: var(--foodgrubber-primary-color);">Accept</button>
                            </form>
                        @endif
                    </div>
                    <!-- /Account -->
                </div>

                @if (isset($foodpartnerProducts))
                    <h5 class="card-header">Products</h5>
                    <div class="card-body">
                        <div class="row">
                            @foreach ($foodpartnerProducts as $foodpartnerProduct)
                                <div class="col-sm-6 col-md-4 col-lg-3 mb-3">
                                    <div class="card">
                                        <img class="card-img-top"
                                            {{-- src="{{ $foodpartnerProduct->image1 ? asset('img/products/' . $foodpartnerProduct->image1) : asset('img/no-image.png') }}" --}}
                                            src="{{ asset('img/no-image.png') }}"
                                            alt="Product Image" style="height: 200px; object-fit:cover;" />
                                        <div class="card-body text-start">
                                            <h6 class="card-subtitle text-muted mb-3">
                                                ({{ $foodpartnerProduct->category }})
                                            </h6>
                                            <h5 class="card-title">{{ $foodpartnerProduct->name }}</h5>
                                            {{-- <p class="card-text">
                                            {{ $product->description ? Str::words($product->description, 10, '...') : 'No product description available' }}
                                        </p> --}}
                                            {{-- <h5 class="card-title">&#8358;{{ $product->price }}</h5> --}}
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
    </div>
@endsection
