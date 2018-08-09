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
                <h5 class="card-title">Cadastrar produto</h5>
            </div>
            <div class="card-body">
                <form action="{!! route("produtos.create") !!}" method="POST">
                    <div class="form-group">
                        <label for="title">Título</label>
                        <input type="text" name="product_title" id="title" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="description">Descrição</label>
                        <input type="text" name="description" id="description" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="price">Preço</label>
                        <input type="text" name="price" id="price" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="currency">Moeda</label>
                        <select name="currency" id="currency" class="form-control">
                            <option value="BRL" selected="selected">BRL</option>
                            <option value="USD">USD</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary btn-block">Salvar</button>
                    </div>
                </form>
            </div>
        </div>

        @if ($products->count() > 0)
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Produtos cadastrados</h5>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead class="thead-dark">
                        <tr>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Price</th>
                            <th>Currency</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <td>{{ $product->product_title }}</td>
                                <td>{{ $product->description }}</td>
                                <td>{{ $product->price }}</td>
                                <td>{{ $product->currency }}</td>
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
