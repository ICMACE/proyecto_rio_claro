@extends('layouts.guest')

@section('content')

<div class="row justify-content-center">

    <div class="col-md-5">

        <div class="card login-card">

            <div class="card-body">

                <h3 class="text-center mb-4">

                    Río Claro

                </h3>

                <form method="POST"
                      action="{{ route('login') }}">

                    @csrf

                    <div class="form-group">

                        <label>Email</label>

                        <input
                            type="email"
                            name="email"
                            class="form-control"
                            value="correo@mail.com"
                            required>
                        <span class="text-muted">
                            <small>correo@mail.com</small>
                        </span>
                        <span class="text-danger">
                            @error('email')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>

                    <div class="form-group">

                        <label>Contraseña</label>

                        <input
                            type="password"
                            name="password"
                            class="form-control"
                            value="root1234"
                            required>
                        <span class="text-muted">
                            <small>root1234</small>
                        </span>
                        <span class="text-danger">
                            @error('password')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>

                    <button
                        type="submit"
                        class="btn btn-primary btn-block">

                        Iniciar sesión

                    </button>

                </form>

            </div>

        </div>

    </div>

</div>

@endsection
