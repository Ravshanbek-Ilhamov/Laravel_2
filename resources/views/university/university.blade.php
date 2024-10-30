@extends('layouts.main')

@section('title', 'University Page')

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Button trigger modal for creating a university -->
            <button type="button" class="btn btn-primary m-2" data-toggle="modal" data-target="#createModal">
                Create
            </button>

            <!-- Create Modal -->
            <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="createModalLabel">Create University</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="{{ route('univer.store') }}" method="POST">
                            @csrf
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="univerName">University Name</label>
                                    <input type="text" class="form-control" id="univerName" name="name" placeholder="Enter university name" required>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Success and Error Alerts -->
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{ session('success') }}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            @if (session('error'))
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>{{ session('error') }}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            <!-- Universities Table -->
            <table class="table table-striped table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Number of Faculties</th>
                        <th>Number of Fields</th>
                        <th>Number of Groups</th>
                        <th>Number of Students</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($univers as $univer)
                        <tr>
                            <td>{{ $univer['id'] }}</td>
                            <td>{{ $univer['name'] }}</td>
                            <td>{{ $univer->faculties_count }}</td>
                            <td>{{ $univer->fields_count }}</td>
                            <td>{{ $univer->groups_count }}</td>
                            <td>{{ $univer->students_count }}</td>
                            <td>
                                <!-- Edit Button -->
                                <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editModal{{ $univer['id'] }}">
                                    Edit
                                </button>

                                <!-- Edit Modal -->
                                <div class="modal fade" id="editModal{{ $univer['id'] }}" tabindex="-1" aria-labelledby="editModalLabel{{ $univer['id'] }}" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="editModalLabel{{ $univer['id'] }}">Edit University</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="{{ route('univer.update', $univer['id']) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label for="univerNameEdit{{ $univer['id'] }}">University Name</label>
                                                        <input type="text" class="form-control" id="univerNameEdit{{ $univer['id'] }}" name="name" value="{{ $univer['name'] }}" required>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-warning">Update</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <!-- Delete Button -->
                                <form action="/university/delete/{{ $univer['id'] }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>
@endsection
