@extends('admin.layout.app')

@section('content')
    <section class="section">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Update Password</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('password.change') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="password">Enter New Password</label>
                                        <input type="text" name="password" id="password" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-success">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

