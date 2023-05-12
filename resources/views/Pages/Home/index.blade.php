@extends('Layouts\app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="title">Student Records</h1>
            </div>

            @if (session()->has('message'))
                <div class="alert alert-success text-center" role="alert">
                    {{ session()->get('message') }}
                </div>
            @endif

            <div class="col-lg-12 mt-5">
                <div class="wrapper">

                    <table class="table table-dark table-striped">
                        <thead>
                            <tr>
                                <th scope="col"></th>
                                <th scope="col">St ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Image</th>
                                <th scope="col">Age</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($inserts as $key => $insert)
                                <tr>
                                    <th scope="row">{{ ++$key }}</th>
                                    <td>{{ $insert->stid }}</td>
                                    <td>{{ $insert->name }}</td>
                                    <td><img src="{{ asset($insert->image) }}" alt="Student Image" width="50"></td>
                                    <td>{{ $insert->age }}</td>

                                    <td>

                                        @if ($insert->status == 0)
                                            <a type="button" href="{{ route('home.status', $insert->id) }}"
                                                class="btn  btn-warning"
                                                style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .85rem;">
                                                Inactive
                                            </a>
                                        @else
                                            <a type="button" href="{{ route('home.status', $insert->id) }}"
                                                class="btn  btn-success"
                                                style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .75rem; --bs-btn-font-size: .85rem;">
                                                Active
                                            </a>
                                        @endif
                                    </td>


                                    <td>
                                        <a href="{{ route('home.delete', $insert->id) }}"
                                            class="btn btn-danger padding-right=2"><i class="uil uil-trash-alt"></i></a>
                                        <a href="{{ route('EditProfile.edit', $insert->stid) }}"
                                            class="btn btn-info padding-right=2"><i class="uil uil-edit-alt"></i></i></a>

                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>


            </div>

        </div>
    </div>
@endsection

@push('css')
    <style>
        .title {
            padding-top: 15px;
            font-size: 4rem;

        }
    </style>
@endpush
