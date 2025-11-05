@extends('layout.app')
@section('title', 'Login')

@section('content')
<link rel="stylesheet" href="/css/auth.css">
<div class="container-fluid min-vh-100 p-0">
    <div class="row g-0 min-vh-100">
        <div class="col-12 login-left d-flex align-items-center justify-content-center bg-white">
            <div class="card login-card card-shadow">
                <div class="card-body">
                    <h5 class="text-center fw-bold mb-4">Register</h5>
                    <form method="">
                        <div class="mb-3">
                            <label class="form-label small">Name</label>
                            <input type="text" name="name" class="form-control input-underline" />
                        </div>

                        <div class="mb-3">
                            <label class="form-label small">Email</label>
                            <input type="text" name="email" class="form-control input-underline" />
                        </div>

                        <div class="mb-3">
                            <label class="form-label small">phone number</label>
                            <input type="tel" name="phone" class="form-control input-underline" />
                        </div>

                        <div class="mb-3">
                            <label class="form-label small">Password</label>
                            <input type="password" name="password" class="form-control input-underline" />
                        </div>

                        <div class="mb-4">
                            <label class="form-label small">Confirm Password</label>
                            <input type="password" name="password_confirmation" class="form-control input-underline" />
                        </div>

                        <button type="submit" class="login-btn w-100 py-2 text-white">Register</button>
                        
                        <p class="text-center mt-3 mb-0">
                            Already have an account?
                            <a href="/login" class="fw-semibold" style="color:#5D71D6; text-decoration:underline;">
                                Login now
                            </a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-12 d-none d-md-block login-right"
             style="background-image: url('/images/login/login-image.webp'); background-size: cover; background-position: center;">
        </div>
    </div>
</div>
@endsection