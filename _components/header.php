<?php
$header = <<<HTML
<style>
  .navbar-glass {
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(10px);
        border-bottom: 1px solid rgba(0,0,0,0.1);
    }
    .logo {
        font-size: 1.5rem;
        font-weight: bold;
    }
  </style>
    <nav class="navbar navbar-expand-lg navbar-glass mx-3">
        <a class="navbar-brand logo text-dark" href="#">
            <i class="fas fa-layer-group text-info"></i>
            QuickWork
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav3">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav3">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link text-dark fw-medium" href="../home">Clientes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark fw-medium" href="../categoria">Categorias</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark fw-medium" href="../servico">Serviços</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark fw-medium" href="../pedido">Pedidos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark fw-medium" href="../prestador">Prestadores</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark fw-medium" href="../mensagem">Mensagens</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark fw-medium" href="#">
                        <i class="fas fa-search"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <button id="logoff" class="btn btn-danger">Sair</button>
                </li>
            </ul>
        </div>
    </nav>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
HTML;