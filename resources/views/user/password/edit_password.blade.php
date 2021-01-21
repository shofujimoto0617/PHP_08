@extends('user.user_master')

@section('user')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <div style="padding: 20px">
        <div class="col-md-6">
            <h4>Change Password</h4>
            <form method="post" action="{{ route('password.update') }}">

                @csrf
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Current Password</label>
                    <input id="current_password" type="password" name="oldpassword" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">New Password</label>
                    <input id="password" type="password" name="password" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Confirm Password</label>
                    <input id="password_confirmation" type="password" name="password_confirmation" class="form-control">
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div> <!-- // End OL MD 6 -->
    </div> <!-- // END ROW -->

@endsection