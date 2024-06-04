<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="/public/css/bootstrap.min.css">
    <link rel="stylesheet" href="/public/css/bootstrap-grid.min.css">
    <link rel="stylesheet" href="/public/css/main.css">

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
    <script src="/public/js/jquery-3.6.0.min.js" defer></script>
    <script src="/public/js/jquery.mask.min.js" defer></script>
    <script src="/public/js/main.js" defer></script>

    <title><?= $data['title'] ?></title>
</head>

<body class="bg-dark bg-opacity-50">

    <nav class="navbar navbar-expand-lg bg-secondary bg-opacity-75">
        <div class="container-fluid align-items-center">
            <a class="navbar-brand" href="/">
                <i class="fa-solid fa-bullseye"></i>
                Consultas Flex
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#servicesList">
                <i class="fa-solid fa-caret-down"></i>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="servicesList">
                <div class="navbar-nav text-end mt-3">
                    <a class="nav-link" href="/">Home</a>
                    <a class="nav-link" href="/service/cep">CEP</a>
                    <a class="nav-link" href="/service/ddd">DDD</a>
                    <a class="nav-link" href="/service/cnpj">CNPJ</a>
                    <a class="nav-link" href="/service/banco">Bancos</a>
                </div>
            </div>
        </div>
    </nav>