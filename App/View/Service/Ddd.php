<main class="container">
    <div class="jumbotron bg-danger bg-opacity-50 rounded text-center my-5 py-5">
        <h1>Consulte seu DDD</h1>
        <p>Digite um DDD válido e tenha acesso a todas as informações disponíveis</p>
    </div>

    <div class="alert alert-danger text-center d-none" role="alert">
    </div>

    <div class="card row justify-content-between mx-0 mb-5 bg-light bg-opacity-50">
        <div class="row">
            <form class="col-lg-3 text-dark mx-3 mt-3" id="fetchData">
                <div class="mb-3">
                    <label for="requested_ddd" class="form-label">DDD:</label>
                    <input class="form-control" type="text" name="requested_ddd" id="requested_ddd" placeholder="11" minlength="2" maxlength="2" size="2" required>
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
                <div class="row align-items-baseline mb-3">
                    <label for="state" class="form-label col-auto">Estado</label>
                    <input type="text" class="form-control col-3 col-md-2" name="state" id="state" placeholder="SP" disabled readonly>
                </div>

                <div class="mb-3">
                    <table class="table table-bordered bg-light bg-opacity-75 text-center" name="cities">
                        <thead>
                            <tr>
                                <th scope="col">Cidades</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Lista das cidades disponíveis neste DDD.</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </form>
        </div>
    </div>
</main>