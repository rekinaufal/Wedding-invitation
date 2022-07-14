@extends('admin.index')
  @section('content')
  <div class="card-body">
    <div class="table-responsive">
      <form method="POST" action="{{ route('user.update', $User->id) }}"  role="form" enctype="multipart/form-data">
        {{ method_field('PATCH') }}
        @csrf
          <div class="form-group">
            <label">Name</label>
            <input type="text" class="form-control" name="name" value="{{$User->name}}">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" class="form-control" id="exampleInputEmail1" name="email" value="{{$User->email}}">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
          </div>
          <div class="form-group">
            <label for="sel1">Select list:</label>
            <select class="form-control" name="status">
              {{$status = $User->status}}
              @if(!empty($status))
                <option value="{{$status}}">{{$status}}</option>
              @else
                <option value="">-- Select one --</option>
              @endif
              <option value="Admin">Admin</option>
              <option value="User">User</option>
            </select>
          </div>
        <!-- <div class="form-group">
          <label for="exampleInputPassword1">Password</label>
          <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Password">
        </div> -->
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
  </div>
  @endsection