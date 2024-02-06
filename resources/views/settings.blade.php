@extends('layouts.app')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">App /</span> Settings</h4>

        <div class="row">
            <div class="col-md-4">
                <div class="card mb-4">
                    <h5 class="card-header">Product Categories</h5>
                    <!-- Account -->
                    <div class="card-body">
                        <form method="POST" action="{{ route('app.settings.categories') }}">
                            @csrf
                            <div class="d-flex align-items-start align-items-sm-center gap-4">
                                <div>
                                    <img src="img/no-image.png" alt="Category Image" class="d-block rounded" height="100"
                                        width="100" id="categoryImage" />
                                    <i class="bx bx-camera p-1 cursor-pointer"
                                        style="color: var(--foodgrubber-primary-color);
                                        background-color: var(--foodgrubber-tertiary-color); border-radius:50%; position: relative; bottom:10px; left:35px;"></i>
                                </div>
                                <input class="form-control" type="file" id="image" name="image" hidden />
                                <div class="button-wrapper">
                                    <input class="form-control" type="text" id="category" name="category" required />
                                    <button type="submit" class="btn btn-primary mt-3">
                                        <i class="bx bx-plus"></i>
                                        Add Category
                                    </button>
                                </div>
                            </div>
                        </form>
                        <div class="mb-3"></div>
                        @if (isset($categories))
                            <div class="table-responsive text-nowrap">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Image</th>
                                            <th>Category</th>
                                            {{-- <th>Action</th> --}}
                                        </tr>
                                    </thead>
                                    <tbody class="table-border-bottom-0">
                                        @foreach ($categories as $category)
                                            <tr>
                                                <td><img src="{{ $category->image ? asset('img/categories/' . $category->image) : asset('img/no-image.png') }}"
                                                        alt="Category Image" class="rounded" height="40"
                                                        width="40" /></td>
                                                <td>{{ $category->category }}</td>
                                                {{-- <td>
                                                    <a class="" href="{{ route('category.remove', $category->id) }}">
                                                    <a class="" href="#">
                                                        <i class="bx bx-trash text-danger"></i>
                                                    </a>
                                                </td> --}}
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    @endsection
