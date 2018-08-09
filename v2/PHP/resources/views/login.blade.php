@extends("master")

@section("content")

<div class="login-box">
    <div class="login-header text-center">
        <img src="http://blog.eduzz.com/wp-content/uploads/2018/01/logo.png" alt="logo">
    </div>
    <div class="text-center login-panel card">
        <form action="{{ route("signin") }}" method="POST">
            <div class="form-group row">
                <label for="email">Usuário:</label>
                <input type="text" id="email" class="form-control">
            </div>
            <div class="form-group row">
                <label for="password">Senha:</label>
                <input type="text" id="password" class="form-control">
            </div>
            <div class="form-group row">
                <button class="btn btn-primary btn-block">Login</button>
            </div>
        </form>
    </div>
</div>

@endsection

@section("styles")
    <style>
        body {
            background-color: #607D8B;
        }
        .login-header {
            padding: 5%;
        }
        .login-panel {
            margin: auto;
            width: 40%;
            padding: 5%;
        }
    </style>
@endsection