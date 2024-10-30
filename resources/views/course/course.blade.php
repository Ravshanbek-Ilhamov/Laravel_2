@extends('layouts.main')

@section('title', 'Course Page')

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary m-2" data-toggle="modal" data-target="#exampleModal">
                Create
            </button>
            
            {{-- <!-- Create Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Create University</h5>
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
            </div> --}}

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
                        <th>Level</th>
                        <th>Faculty ID</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($courses as $course)
                        <tr>
                            <td>{{ $course['id'] }}</td>
                            <td>{{ $course['level'] }}</td>
                            <td>{{ $course['faculty_id'] }}</td>
                            {{-- <td>
                                <button type="button" class="btn btn-warning btn-sm edit-coursesity" data-toggle="modal" data-target="#editModal" data-id="{{ $course['id'] }}" data-name="{{ $course['name'] }}">
                                    Edit
                                </button> --}}
                                    <!-- Edit Modal -->
                                    {{-- <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="editModalLabel">Edit University</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form id="editForm" method="POST" action="{{ route('univer.update',$univer['id']) }}">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <label for="editUniverName">University Name</label>
                                                            <input type="text" class="form-control" id="editUniverName" name="name" required>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Update</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div> --}}
                                    {{-- <form action="/university/delete/{{ $univer['id'] }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form> --}}
                            {{-- </td> --}}
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>



    <!-- Script to Set Edit Modal Data -->
    <script>
        $(document).ready(function() {
            $('.edit-university').on('click', function() {
                const id = $(this).data('id');
                const name = $(this).data('name');
                
                // Replace the __ID__ placeholder with the actual university ID
                const formAction = $('#editForm').attr('action').replace('__ID__', id);
                $('#editForm').attr('action', formAction);
                
                // Set the input values
                $('#editUniverName').val(name);
            });
        });
    </script>
@endsection
