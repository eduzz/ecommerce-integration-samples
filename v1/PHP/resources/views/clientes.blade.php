@extends("master")

@section("content")

    @include("navbar")

    @if (\Illuminate\Support\Facades\Cache::get("error"))
        <div class="alert alert-danger">
            {{ \Illuminate\Support\Facades\Cache::get("error") }}
        </div>
    @endif

    <div class="content-wrapper">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Cadastrar clientes</h5>
            </div>
            <div class="card-body">
                <form action="{!! route("clientes.create") !!}" method="POST">
                    <div class="form-group">
                        <label for="name">Nome</label>
                        <input type="text" name="name" id="name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="email">E-mail</label>
                        <input type="text" name="email" id="email" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="cellphone">Celular</label>
                        <input type="text" name="cellphone" id="cellphone" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="document">Documento</label>
                        <input type="text" name="document" id="document" class="form-control">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary btn-block">Salvar</button>
                    </div>
                </form>
            </div>
        </div>

        @if ($clients->count() > 0)
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Clientes cadastrados</h5>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead class="thead-dark">
                        <tr>
                            <th>Nome</th>
                            <th>E-mail</th>
                            <th>Celular</th>
                            <th>Documento</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($clients as $client)
                            <tr>
                                <td>{{ $client->name }}</td>
                                <td>{{ $client->email }}</td>
                                <td>{{ $client->cellphone }}</td>
                                <td>{{ $client->document }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endif
    </div>

@endsection

@section("styles")

    <style>
        .card {
            margin: 5%;
        }
        .content-wrapper {
            margin-top: 10%;
        }
        .alert {
            margin-top: 10%;
        }
    </style>

@endsection
