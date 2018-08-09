<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <a class="navbar-brand" href="{!! route("home") !!}">
        <img src="http://blog.eduzz.com/wp-content/uploads/2018/01/logo.png" alt="logo">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="{!! route("home") !!}">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{!! route("produtos.index") !!}">Produtos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{!! route("clientes.index") !!}">Clientes</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{!! route("vendas.index") !!}">Vendas</a>
            </li>
        </ul>
    </div>
</nav>