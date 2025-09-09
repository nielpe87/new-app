<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

</head>
<body>
    <div class="container">


        <form action="{{ route('authenticate') }}" method="post">
            @csrf()
            <div class="group m-3">
                <label for="">Email</label>
                <input type="email" name="email" class="form-control">
                 <div>
                    @error('email')
                        {{$message}}
                    @enderror
        </div>
            </div>
            <div class="group m-3">
                <label for="">Senha</label>
                <input type="password" name="password" class="form-control">
                 @error('password')
                        {{$message}}
                    @enderror
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
        </form>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>

</body>
</html>
