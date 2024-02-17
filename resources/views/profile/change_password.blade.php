@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Change Login User Password</h1>
          </div>
        </div>
      </div>
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
          @include('message')
            <div class="card card-primary">
              <form method="post" action="">
              @csrf
                <div class="card-body">
                <div class="form-group">
                    <label>Old Password</label>
                    <input type="password" class="form-control" name="old_password" required placeholder="old_password">
                  </div>
                  <div class="form-group">
                    <label>New Password</label>
                    <input type="password" class="form-control" name="new_password" required placeholder="new_password">
                  </div>
                </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Update</button>
                </div>
              </form>
            </div>

          </div>

        </div>
      </div>
    </section>
  </div>
@endsection
