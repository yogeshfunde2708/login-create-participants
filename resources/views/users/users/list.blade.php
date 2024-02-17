@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Users List (Total: {{$getRecord->total()}})</h1>
          </div>
          <div class="col-sm-6" style="text-align:right;">
        <a href="{{url('users/users/add')}}" class="btn btn-primary">Add New User</a>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Users Table</li>
            </ol>
          </div>
        </div>
      </div>
    </section>
    <section class="content">
      <div class="container-fluid">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Search User</h3>
              </div>
              <form method="get" action="">
                <div class="card-body">
                  <div class="row">
                <div class="form-group col-md-3">
                    <label>Name</label>
                    <input type="text" class="form-control" name="name" value="{{Request::get('name')}}" placeholder="Enter Name">
                  </div>
                  <div class="form-group col-md-3">
                    <label >Email</label>
                    <input type="text" class="form-control" name="email" value="{{Request::get('email')}}" placeholder="Enter Email">
                  </div>
                  <div class="form-group col-md-3">
                    <label >Date</label>
                    <input type="date" class="form-control" name="date" value="{{Request::get('date')}}">
                  </div>
                  <div class="form-group col-md-3">
                    <button class="btn btn-primary" type="submit" style="margin-top:30px">Search</button>
                    <a href="{{url('users/users/list')}}" class="btn btn-success"  style="margin-top:30px">Reset</a>
                  </div>
                </div>
                </div>
              </form>
            </div>
        </div>
        <div class="row">
          <div class="col-md-12">
          @include('message')
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Users List</h3>
              </div>
              <div class="card-body p-0">
                <table class="table">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Created date</th>
                      <th>Edit</th>
                      <th>Delete</th>
                    </tr>
                  </thead>
                  <tbody>
                   @foreach($getRecord as $value)
                   <tr>
                    <td>{{$value->id}}</td>
                    <td>{{$value->name}}</td>
                    <td>{{$value->email}}</td>
                    <td>{{date('d-m-Y H:i A', strtotime($value->created_at))}}</td>
                    <td ><a href="{{url('users/users/edit/'.$value->id)}}" class="btn btn-success">Edit</a></td>
                    <td ><a href="{{url('users/users/delete/'.$value->id)}}" class="btn btn-danger">Delete</a></td>
                   </tr>
                   @endforeach
                  </tbody>
                </table>
                <div style="padding:10px; float:right">
                {!! $getRecord->appends(Request::except('page'))->links() !!}

              </div>
              </div>
            </div>

        </div>

      </div>
    </section>
  </div>
@endsection
