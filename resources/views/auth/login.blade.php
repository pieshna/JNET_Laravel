@include('template')
@yield('header')
<div class="container">
    <br>
    <br>
    <div class="container shadow-lg p-3 mb-5 rounded">
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="row">
                <div class=" col-md-6">
                    <img class="img-fluid" src="imagenes/logo.png">
                </div>
                <div class="col-md-6">
                    <br><br><br><br>
                    <div class="justify-content-md-center row">
                        <div class="col-md-6">
                            <label>Correo Electronico</label>

                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <br>
                    <div class="justify-content-md-center row">
                        <div class="col-md-6">
                            <label>Contraseña</label>

                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password" required
                                autocomplete="current-password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <br><br>
                    <div class="form-group row">
                        <div class="col-md-2 offset-md-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                    {{ old('remember') ? 'checked' : '' }}>

                                <label class="form-check-label" for="remember">
                                    Recordarme
                                </label>
                            </div>
                        </div>
                   
                    <div class="col-md-6 offset-1">
                        @if (Route::has('password.request'))
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            Olvide mi contraseña.
                        </a>
                        @endif
                    </div> 
                    </div>
                    <br>
                    <div class=" row justify-content-md-center">

                        <button type="submit" class="btn btn-primary">
                            Iniciar Sesion
                        </button>
                    </div>

                </div>
            </div>
        </form>
    </div>
</div>

@yield('footer')