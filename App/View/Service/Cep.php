<main class="container">
    <div class="jumbotron bg-danger bg-opacity-50 rounded text-center my-5 py-5">
        <h1>Consulte seu CEP</h1>
        <p>Digite um CEP válido e tenha acesso a todas as informações disponíveis</p>
    </div>

    <div class="alert alert-danger text-center d-none" role="alert">
    </div>

    <div class="card row justify-content-between mx-0 mb-5 bg-light bg-opacity-50">
        <div class="row">
            <form class="col-lg-3 text-dark mx-3 mt-3" id="fetchData">
                <div class="mb-3">
                    <label for="requested_cep" class="form-label">CEP:</label>
                    <input class="form-control" type="text" name="requested_cep" id="requested_cep" placeholder="01001000" minlength="8" maxlength="8" size="8" required>
                </div>

                <div class="d-flex justify-content-between align-items-center mb-3">
                    <button type="submit" class="btn btn-primary">Consultar</button>

                    <div class="spinner-border text-danger text-opacity-50 d-none" role="status">
                        <span class="visually-hidden">Carregando...</span>
                    </div>
                </div>
            </form>

            <div class="col-lg-1 d-none d-lg-block">
                <div class="bg-danger bg-opacity-50 h-100 w-5px">&nbsp;</div>
            </div>

            <form class="col text-dark mx-3 my-3">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="localidade" class="form-label">Município</label>
                        <input type="text" class="form-control" name="localidade" placeholder="São Paulo" disabled readonly>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="uf" class="form-label">Estado</label>
                        <input type="text" class="form-control" name="uf" placeholder="SP" disabled readonly>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="logradouro" class="form-label">Logradouro</label>
                    <input type="text" class="form-control" name="logradouro" placeholder="Praça da Sé" disabled readonly>
                </div>

                <div class="mb-3">
                    <label for="bairro" class="form-label">Bairro</label>
                    <input type="text" class="form-control" name="bairro" placeholder="Sé" disabled readonly>
                </div>

                <div class="mb-3">
                    <label for="complemento" class="form-label">Complemento</label>
                    <input type="text" class="form-control" name="complemento" placeholder="lado ímpar" disabled readonly>
                </div>

                <div class="row">
                    <div class="col-md-3 mb-3">
                        <label for="ibge" class="form-label">
                            IBGE
                            <i class="fa-solid fa-circle-question" data-bs-toggle="tooltip" data-bs-title="Instituto Brasileiro de Geografia e Estatística"></i>
                        </label>
                        <input type="text" class="form-control" name="ibge" placeholder="3550308" disabled readonly>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="gia" class="form-label">
                            GIA
                            <i class="fa-solid fa-circle-question" data-bs-toggle="tooltip" data-bs-title="Guia de Informação e Apuração do ICMS"></i>
                        </label>
                        <input type="text" class="form-control" name="gia" placeholder="1004" disabled readonly>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="siafi" class="form-label">
                            SIAFI
                            <i class="fa-solid fa-circle-question" data-bs-toggle="tooltip" data-bs-title="Sistema Integrado de Administração Financeira do Governo Federal"></i>
                        </label>
                        <input type="text" class="form-control" name="siafi" placeholder="7107" disabled readonly>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="ddd" class="form-label">
                            DDD
                            <i class="fa-solid fa-circle-question" data-bs-toggle="tooltip" data-bs-title="Discagem Direta à Distância"></i>
                        </label>
                        <input type="text" class="form-control" name="ddd" placeholder="11" disabled readonly>
                    </div>
                </div>
            </form>
        </div>
    </div>
</main>