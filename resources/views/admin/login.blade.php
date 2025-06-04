<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Admin login_blade</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
  </head>

   <body class="bg-light">
    <div class="container">
        <div class="row my-5">
            <div class="col-md-6 mx-auto">
                @session('error')
                    <div class="alert alert-danger my-2">
                        {{session('error')}}
                    </div>
                @endsession
                <div class="card shadow-sm p-5">
                    <div class="card-header bg-white text-center">
                        <h3 class="mt-2">LOGIN</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.auth')}}" method="post">
                            @csrf
                            <div class="form-floating mb-3">
                              <input type="email" class="form-control @error('email') is-invalid @enderror " name="email"
                                id="floatingInput" placeholder="Correo electronico">
                              <label for="floatingInput">Correo electronico</label>
                              @error('email')
                                <span class="invalid-feedback">
                                    <strong>{{$message}}</strong>
                                </span>
                              @enderror
                            </div>
                            <div class="form-floating mb-3">
                              <input type="password" class="form-control @error('password') is-invalid @enderror " name="password"
                                id="floatingPassword" placeholder="Contraseña">
                              <label for="floatingPassword">Contraseña</label>
                              @error('password')
                                <span class="invalid-feedback">
                                    <strong>{{$message}}</strong>
                                </span>
                              @enderror
                            </div>
                            <div class="mb-2">
                                <button type="submit" class="btn btn-lg btn-primary">
                                    Iniciar sesión
                                </button>
                            </div>
                        </form>

                    </div>
                </div>

            </div>

        </div>

    </div>







    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
  </body>

</html>
