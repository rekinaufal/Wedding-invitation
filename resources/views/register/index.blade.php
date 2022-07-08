@extends('layouts.main')
@section('content')
<div class="row justify-content-center">
    <div class="col-lg-5">
        <main class="form-registration">
            <h1 class="h3 mb-3 fw-normal text-center">Registrasi Form</h1>
            <form action="/register" method="post">
                @csrf
                <div class="form-floating">
                    <input type="text" class="form-control rounded-top @error('name') is-invalid @enderror" name="name" id="nama" placeholder="Nama" required value="{{ old('name') }}">
                    <label for="nama">Nama</label>
                    @error('name') 
                    <div class="invalid-feedback">
                        
                    </div>
                    @enderror
                </div>
                <div class="form-floating">
                    <input type="text" class="form-control" name="username" id="username" placeholder="Username" required>
                    <label for="username">Username</label>
                </div>
                <div class="form-floating">
                    <input type="email" class="form-control" name="email" id="email" placeholder="Email" required>
                    <label for="email">Email address</label>
                </div>
                <div class="form-floating">
                    <input type="password" class="form-control rounded-button" name="password" id="password" placeholder="Password" required>
                    <label for="password">Password</label>
                </div>
                <div class="form-floating">
                    <input type="text" class="form-control" name="status" id="status" placeholder="status" value="User" required readonly>
                    <label for="Status">Status</label>
                </div>
                <button class="w-100 btn btn-lg btn-primary mt-3" type="submit">Register</button>
            </form>
          <small class="d-block text-center mt-3">Already register ? <a href="/login">Login</a></small>
        </main>
    </div>
</div>
@endsection