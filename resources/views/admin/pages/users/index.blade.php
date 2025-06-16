@extends('admin.layout.app')

@section('content')
    <section class="section">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>
                            @if ($type == 'agency')
                                Registered Agencies
                            @else
                                Registered Users
                            @endif
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
                                <thead>
                                    <tr>
                                        <th>
                                            @if ($type == 'agency')
                                                Agency ID
                                            @else
                                                User ID
                                            @endif
                                        </th>
                                        <th>
                                            @if ($type == 'agency')
                                                Agency Name
                                            @else
                                                User Name
                                            @endif
                                        </th>
                                        @if ($type == 'agency')
                                            <th>Licence Number</th>
                                        @endif
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                            <td>{{ $user->id }}</td>
                                            <td>{{ $user->name }}</td>
                                            @if ($type == 'agency')
                                                <td>{{ $user->licence_number }}</td>
                                            @endif
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->phone }}</td>
                                            <td>
                                                <form action="{{ route('users.destroy', $user->id) }}" method="POST"
                                                    style="display: inline-block;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger"
                                                        onclick="return confirm('Are you sure you want to delete this user?')">Delete</button>
                                                </form>
                                                @if ($type == 'agency')
                                                    <form action="{{ route('users.updateApprovalStatus', $user->id) }}"
                                                        method="POST" style="display: inline-block;">
                                                        @csrf
                                                        @method('POST')

                                                        @if ($user->is_active == 0)
                                                            <button type="submit" class="btn btn-success"
                                                                onclick="return confirm('Are you sure you want to approve this user?')">Approve</button>
                                                        @else
                                                            <button type="submit" class="btn btn-primary"
                                                                onclick="return confirm('Are you sure you want to disapprove this user?')">Disapprove</button>
                                                        @endif
                                                    </form>
                                                @endif
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
    </section>
@endsection
