<main class="container">
    <div class="jumbotron bg-opacity-50 rounded text-center my-5 py-5">
        <h1>Consulte seu CNPJ</h1>
        <p class="mx-2">Digite um CNPJ válido e tenha acesso a todas as informações disponíveis</p>
    </div>

    <div class="alert alert-danger text-center d-none" role="alert">
    </div>

    <div class="card row justify-content-between mx-0 mb-5 bg-light bg-opacity-50">
        <div class="row">
            <form class="col-lg-3 text-dark mx-3 mt-3" id="fetchData">
                <div class="mb-3">
                    <label for="requested_cnpj" class="form-label">CNPJ:</label>
                    <input class="form-control" type="text" name="requested_cnpj" id="requested_cnpj" placeholder="00000000000191" minlength="14" maxlength="14" size="14" required>
                </div>

                <div class="d-flex justify-content-between align-items-center mb-3">
                    <button type="submit" class="btn btn-primary">Consultar</button>

                    <div class="spinner-border text-danger text-opacity-50 d-none" role="status">
                        <span class="visually-hidden">Carregando...</span>
                    </div>
                </div>
            </form>

            <div class="col-lg-1 d-none d-lg-block">
                <div class="line bg-opacity-50 h-100 w-5px">&nbsp;</div>
            </div>

            <form class="col text-dark mx-3 my-3">
                <div class="mb-3">
                    <label for="fantasia" class="form-label">Nome Fantasia</label>
                    <input type="text" class="form-control" name="fantasia" id="fantasia" placeholder="DIRECAO GERAL" disabled readonly>
                </div>

                <div class="mb-3">
                    <label for="nome" class="form-label">Razão Social</label>
                    <input type="text" class="form-control" name="nome" id="nome" placeholder="BANCO DO BRASIL SA" disabled readonly>
                </div>

                <div class="row align-items-end">
                    <div class="mb-3 col-md-4">
                        <label for="cnpj" class="form-label">CNPJ</label>
                        <input type="text" class="form-control" name="cnpj" id="cnpj" placeholder="00000000000191" disabled readonly>
                    </div>
                    <div class="mb-3 col-md-3">
                        <label for="abertura" class="form-label">Data de Abertura</label>
                        <input type="text" class="form-control" name="abertura" id="abertura" placeholder="01/08/1966" disabled readonly>
                    </div>
                    <div class="mb-3 col-md-3">
                        <label for="situacao" class="form-label">Situação</label>
                        <input type="text" class="form-control" name="situacao" id="situacao" placeholder="ATIVA" disabled readonly>
                    </div>
                </div>

                <hr>

                <div class="row">
                    <div class="mb-3 col-md-6">
                        <label for="email" class="form-label">E-mail</label>
                        <input type="text" class="form-control" name="email" id="email" placeholder="secex@bb.com.br" autocomplete="@" disabled readonly>
                    </div>
                    <div class="mb-6 col-md-6">
                        <label for="telefone" class="form-label">Telefone</label>
                        <input type="text" class="form-control" name="telefone" id="telefone" placeholder="(61) 34939002" disabled readonly>
                    </div>
                </div>

                <hr>

                <div class="row">
                    <div class="mb-3 col-md-4">
                        <label for="cep" class="form-label">CEP</label>
                        <input type="text" class="form-control" name="cep" id="cep" placeholder="70040912" disabled readonly>
                    </div>
                    <div class="mb-3 col-md-4">
                        <label for="municipio" class="form-label">Município</label>
                        <input type="text" class="form-control" name="municipio" id="municipio" placeholder="Brasília" disabled readonly>
                    </div>
                    <div class="mb-3 col-md-4">
                        <label for="uf" class="form-label">Estado</label>
                        <input type="text" class="form-control" name="uf" id="uf" placeholder="DF" disabled readonly>
                    </div>
                </div>

                <div class="row">
                    <div class="mb-3 col-md-12">
                        <label for="bairro" class="form-label">Bairro</label>
                        <input type="text" class="form-control" name="bairro" id="bairro" placeholder="ASA NORTE" disabled readonly>
                    </div>
                </div>

                <div class="row">
                    <div class="mb-3 col-md-10">
                        <label for="logradouro" class="form-label">Logradouro</label>
                        <input type="text" class="form-control" name="logradouro" id="logradouro" placeholder="SAUN QUADRA 5 LOTE B TORRES I, II E III" disabled readonly>
                    </div>
                    <div class="mb-3 col-md-2">
                        <label for="numero" class="form-label">Número</label>
                        <input type="text" class="form-control" name="numero" id="numero" placeholder="SN" disabled readonly>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="complemento" class="form-label">Complemento</label>
                    <input type="text" class="form-control" name="complemento" id="complemento" placeholder="ANDAR T I SL S101 A S1602 T II SL C101 A C1602 TIII SL N101 A N1602" disabled readonly>
                </div>
            </form>
        </div>
    </div>
</main>