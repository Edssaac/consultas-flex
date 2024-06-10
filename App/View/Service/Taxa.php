<main class="container">
    <div class="jumbotron bg-opacity-50 rounded text-center my-5 py-5">
        <h1>Consulte uma Taxa</h1>
        <p class="mx-2">Escolha uma taxa e tenha acesso ao seu valor atual</p>
    </div>

    <div class="alert alert-danger text-center d-none" role="alert">
    </div>

    <div class="card row justify-content-between mx-0 mb-5 bg-light bg-opacity-50">
        <div class="row">
            <form class="col-lg-3 text-dark mx-3 mt-3" id="fetchData">
                <div class="mb-3">
                    <label for="requested_taxa" class="form-label">Taxa:</label>
                    <input type="datalist" class="form-control" list="taxa_list" name="requested_taxa" id="requested_taxa" placeholder="CDI" required>
                    <datalist id="taxa_list">
                        <?php if (empty($data['taxas'])) { ?>
                            <option value="Nenhuma taxa disponível.">
                            <?php } ?>
                            <?php foreach ($data['taxas'] as $taxa) { ?>
                            <option value="<?= $taxa['nome'] ?>" code="<?= $taxa['nome'] ?>">
                            <?php } ?>
                    </datalist>
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
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="nome" class="form-label">Nome</label>
                        <input type="text" class="form-control" name="nome" id="nome" placeholder="CDI" disabled readonly>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="valor" class="form-label">Valor</label>
                        <input type="text" class="form-control" name="valor" id="valor" placeholder="10.4" disabled readonly>
                    </div>
                </div>
            </form>
        </div>
    </div>
</main>