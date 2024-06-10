<main class="container">
    <div class="jumbotron bg-opacity-50 rounded text-center my-5 py-5">
        <h1>Consulta Personalizada</h1>
        <p class="mx-2">Informe os dados de uma requisição e tenha acesso a todas as informações disponíveis</p>
    </div>

    <div class="alert alert-danger text-center d-none" role="alert">
    </div>

    <div class="card row justify-content-between mx-0 mb-5 bg-light bg-opacity-50">
        <div class="row">
            <form class="col-lg-3 text-dark mx-3 mt-3" id="fetchData">
                <div class="mb-3">
                    <label for="requested_endpoint" class="form-label">URL da Requisição:</label>
                    <input class="form-control" type="text" name="requested_endpoint" id="requested_endpoint" required>
                </div>

                <div class="mb-3">
                    <label for="requested_endpoint" class="form-label">Tipo da Requisição:</label>
                    <select class="form-select" name="requested_type" id="requested_type" required>
                        <option value="1">GET</option>
                        <option value="2">POST</option>
                        <option value="3">PUT</option>
                        <option value="4">DELETE</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="requested_body" class="form-label">Corpo da Requisição (JSON):</label>
                    <textarea class="form-control" name="requested_body" id="requested_body"></textarea>
                </div>

                <div class="mb-3">
                    <label for="requested_header" class="form-label">Cabeçalho da Requisição (JSON):</label>
                    <textarea class="form-control" name="requested_header" id="requested_header"></textarea>
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
                    <label for="data" class="form-label">Resposta da Requisição</label>
                    <textarea class="form-control" name="data" id="data" disabled readonly></textarea>
                </div>
            </form>
        </div>
    </div>
</main>