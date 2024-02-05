@extends('layouts.app')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">People /</span> Admins</h4>

        <div class="row">
            <div class="col-md-12">
                <ul class="nav nav-pills flex-column flex-md-row mb-3">
                    <li class="nav-item">
                        <a class="nav-link active" href="javascript:void(0);" data-bs-toggle="modal"
                            data-bs-target="#addAdminModal"><i class="bx bx-user me-1"></i> Add Admin</a>
                    </li>
                    {{-- <li class="nav-item">
                        <a class="nav-link" href="pages-account-settings-notifications.html"><i class="bx bx-bell me-1"></i>
                            Notifications</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="pages-account-settings-connections.html"><i
                                class="bx bx-link-alt me-1"></i> Connections</a>
                    </li> --}}
                </ul>

                <!-- Add admin Modal -->
                <div class="modal fade" id="addAdminModal" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <form action="{{ route('admins.store') }}" method="post">
                                @csrf
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel1">Add Admin</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-6 mb-3">
                                            <label for="nameBasic" class="form-label">Name</label>
                                            <input type="text" id="nameBasic" class="form-control" name="name" />
                                        </div>
                                        <div class="col-6 mb-3">
                                            <label for="nameBasic" class="form-label">Phone</label>
                                            <input type="text" id="nameBasic" class="form-control" name="phone" />
                                        </div>
                                    </div>
                                    <div class="row g-2">
                                        <div class="col mb-0">
                                            <label for="emailBasic" class="form-label">Email</label>
                                            <input type="email" id="emailBasic" class="form-control" name="email" />
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                        Close
                                    </button>
                                    <button type="submit" class="btn btn-primary">Add</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Add admin Modal -->

                <div class="card mb-5">
                    <h5 class="card-header">System Admins</h5>
                    <div class="table-responsive text-nowrap p-3">
                        <table class="table table-hover dataTable">
                            <thead>
                                <tr>
                                    <th>Avatar</th>
                                    <th>Name</th>
                                    <th>Address</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                @foreach ($admins as $admin)
                                    <tr>
                                        <td><img src="{{ $admin->image ? asset('img/avatars/' . $admin->image) : asset('img/avatars/default_profile_picture.png') }}"
                                                alt="Avatar" class="rounded" height="40" width="40" /></td>
                                        <td>{{ $admin->name }}</td>
                                        <td>{{ $admin->state }}</td>
                                        <td><span
                                                class="badge {{ $admin->active == 1 ? 'bg-label-primary' : 'bg-label-warning' }} me-1">{{ $admin->active == 1 ? 'Active' : 'Not Active' }}</span>
                                        </td>
                                        <td>
                                            <a class="" href="{{ route('admins.admin', $admin->id) }}"><i
                                                    class="bx bx-view me-1"></i> View</a>
                                            {{-- <div class="dropdown">
                                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                                <i class="bx bx-dots-vertical-rounded"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="{{route('admins.edit', $admin->id)}}"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                                                <a class="dropdown-item" href="{{route('admins.delete', $admin->id)}}"><i class="bx bx-trash me-1"></i> Delete</a>
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
    </div>
@endsection
