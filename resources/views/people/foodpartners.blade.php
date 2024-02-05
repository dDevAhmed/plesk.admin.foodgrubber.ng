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
                                Foof Partners
                            </button>
                        </li>
                        <li class="nav-item">
                            <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                                data-bs-target="#navs-pills-top-profile" aria-controls="navs-pills-top-profile"
                                aria-selected="false">
                                New Applications
                                <span class="badge rounded-pill badge-center h-px-20 w-px-20 bg-danger">3</span>

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
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody class="table-border-bottom-0">
                                        @foreach ($foodpartners as $foodpartner)
                                            <tr>
                                                <td><img src="{{ $foodpartner->image ? asset('img/avatars/' . $admin->image) : asset('img/avatars/default_profile_picture.png') }}" alt="Avatar"
                                                        class="rounded" height="40" width="40" /></td>
                                                <td>{{ $foodpartner->name }}</td>
                                                <td>{{ $foodpartner->state }}</td>
                                                <td><span
                                                        class="badge {{ $foodpartner->status == 'active' ? 'bg-label-success' : 'bg-label-warning' }} me-1">{{ $foodpartner->status }}</span>
                                                </td>
                                                <td>
                                                    <a class=""
                                                        href="{{ route('foodpartners.partner', $foodpartner->id) }}"><i
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
                            <p>
                                Donut dragée jelly pie halvah. Danish gingerbread bonbon cookie wafer candy oat cake ice
                                cream. Gummies halvah tootsie roll muffin biscuit icing dessert gingerbread. Pastry ice
                                cream
                                cheesecake fruitcake.
                            </p>
                            <p class="mb-0">
                                Jelly-o jelly beans icing pastry cake cake lemon drops. Muffin muffin pie tiramisu halvah
                                cotton candy liquorice caramels.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
