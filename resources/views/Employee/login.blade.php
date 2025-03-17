@extends('layouts.app')
@section('main')


    
<div class="d-flex justify-content-center align-items-center vh-100">
    <div class="card shadow-lg border-0 rounded-4 p-4" style="max-width: 800px; width: 100%;">
        <div class="row align-items-center">
            <div class="col-md-5 text-center d-none d-md-block">
                <img src="{{ asset('assets/defult_photos/logo.jpg') }}" alt="Logo" class="img-fluid rounded-3">
            </div>

            <div class="col-md-6 offset-md-1">
                <h3 class="text-center mb-4">Login</h3>
                <p class="text-center text-muted">Welcome back! Please login to your account.</p>

                <form action="" method="POST">
                    @csrf
                    
                    <div class="mb-3">
                        <label for="usr_name" class="form-label">User Name</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-person"></i></span>
                            <input type="text" class="form-control" id="usr_name" name="usr_name" placeholder="Enter your username" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="usr_pwd" class="form-label">Password</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-lock"></i></span>
                            <input type="password" class="form-control" id="usr_pwd" name="usr_pwd" placeholder="Enter your password" required>
                        </div>
                    </div>

                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="rememberMe">
                            <label class="form-check-label" for="rememberMe">Remember me</label>
                        </div>
                        <a href="" class="text-primary">Forgot Password?</a>
                    </div>

                    <div class="d-flex justify-content-center gap-3">
    <button type="submit" class="btn btn-primary ">Login</button>
    <a href="" class="btn btn-outline-primary ">Register</a>
</div>

                    <div class="text-center mt-4">
                        <p class="text-muted">Or login with</p>
                        <div class="d-flex justify-content-center gap-2">
                            <a href="#" class="btn btn-outline-secondary"><i class="bi bi-facebook"></i></a>
                            <a href="#" class="btn btn-outline-secondary"><i class="bi bi-twitter"></i></a>
                            <a href="#" class="btn btn-outline-secondary"><i class="bi bi-google"></i></a>
                            <a href="#" class="btn btn-outline-secondary"><i class="bi bi-github"></i></a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection