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
                <h5 class="card-title">Novo pedido</h5>
            </div>
            <div class="card-body">
                <form action="{!! route("vendas.create") !!}" method="POST">
                    <div class="form-group">
                        <label for="client">Cliente</label>
                        <select name="client" id="client" class="form-control">
                            @foreach ($clients as $client)
                                <option value="{{ $client->id }}">{{ $client->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="product">Produto</label>
                        <select name="product" id="product" class="form-control">
                            @foreach ($products as $product)
                                <option value="{{ $product->id }}">{{ $product->product_title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="amount">Quantidade</label>
                        <input type="number" name="amount" id="amount" class="form-control">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary btn-block">Salvar</button>
                    </div>
                </form>
            </div>
        </div>

        @if ($orders->count() > 0)
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Pedidos de venda</h5>
                </div>
                <div class="card-body">

                    @foreach($orders as $order)
                        <div class="card">
                            <div class="card-header">
                                <h6 class="card-title">Pedido {{ $order->id }}</h6>
                            </div>
                            <div class="card-body">
                                <p><strong>URL de pagamento:</strong> <a href="{!! $order->payment_url !!}">{{ $order->payment_url }}</a></p>
                                <table class="table table-striped">
                                    <thead class="thead">
                                    <tr>
                                        <th>Descrição</th>
                                        <th>Quantidade</th>
                                        <th>Preço</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>{{ $order->items->first()->product->product_title }}</td>
                                            <td>{{ $order->items->first()->amount }}</td>
                                            <td>{{ ($order->items->first()->amount * $order->items->first()->product->price)  }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    @endforeach
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
