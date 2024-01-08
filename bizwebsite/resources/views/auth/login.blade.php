<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login Biz Website</title>
    <link rel="stylesheet" href="{{asset('backend/themes/red-theme.scss')}}">
    <link rel="stylesheet" href="{{asset('backend/themes/green-theme.scss')}}">
</head>
<body>
    
<div class="auth-container">
	<div class="card">
		<header class="auth-header">
			<h1 class="auth-title">
				User Login 
			</h1>
		</header>
		<div class="auth-content">
			<p class="text-center">LOGIN TO CONTINUE</p>
			<form id="login-form"  action="/index.html" method="GET" novalidate="">
				<div class="form-group">
					<label for="username" >Username</label>
					<input type="email" class="form-control underlined" name="username" id="username" placeholder="Your email address" required>
				</div>
				<div class="form-group">
					<label for="password" >Password</label>
					<input type="password" class="form-control underlined" name="password" id="password" placeholder="Your password" required>
				</div>
				<div class="form-group">
					<label for="remember">
						<input class="checkbox" id="remember" type="checkbox">
						<span>Remember me</span>
					</label>

					<a href="reset.html" class="forgot-btn pull-right">Forgot password?</a>
				</div>
				<div class="form-group">
					<button type="submit" class="btn btn-block btn-primary">Login</button>
				</div>
				<div class="form-group">
					<p class="text-muted text-center">Do not have an account? <a href="signup.html">Sign Up</a></p>
				</div>
			</form>
		</div>
	</div>
	<div class="text-center">
		<a href="index.html" class="btn btn-secondary btn-sm">
			<i class="fa fa-arrow-left"></i> Back to dashboard
		</a>
	</div>
</div>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

    
</body>
</html>