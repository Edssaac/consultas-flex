<main class="container">
    <div class="jumbotron bg-opacity-50 rounded text-center my-5 py-5">
        <h1>Consulte seu Banco</h1>
        <p class="mx-2">Escolha um banco e tenha acesso a todas as informações disponíveis</p>
    </div>

    <div class="alert alert-danger text-center d-none" role="alert">
    </div>

    <div class="card row justify-content-between mx-0 mb-5 bg-light bg-opacity-50">
        <div class="row">
            <form class="col-lg-3 text-dark mx-3 mt-3" id="fetchData">
                <div class="mb-3">
                    <label for="requested_bank" class="form-label">Banco:</label>
                    <input type="datalist" class="form-control" list="bank_list" name="requested_bank" id="requested_bank" placeholder="Banco do Brasil S.A." required>
                    <datalist id="bank_list">
                        <?php if (empty($data["banks"])) { ?>
                            <option value="Nenhum banco disponível.">
                            <?php } ?>
                            <?php foreach ($data["banks"] as $bank) { ?>
                            <option value="<?= $bank["fullName"] ?>" code="<?= $bank["code"] ?>">
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
                <div class="mb-3">
                    <label for="name" class="form-label">Nome</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="BCO DO BRASIL S.A." autocomplete="." disabled readonly>
                </div>

                <div class="mb-3">
                    <label for="fullname" class="form-label">Nome Completo</label>
                    <input type="text" class="form-control" name="fullname" id="fullname" placeholder="Banco do Brasil S.A." disabled readonly>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="ispb" class="form-label">
                            ISPB
                            <i class="fa-solid fa-circle-question" data-bs-toggle="tooltip" data-bs-title="Identificador de Sistema de Pagamentos Brasileiro"></i>
                        </label>
                        <input type="text" class="form-control" name="ispb" id="ispb" placeholder="00000000" disabled readonly>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="code" class="form-label">Código da Instituição</label>
                        <input type="text" class="form-control" name="code" id="code" placeholder="001" disabled readonly>
                    </div>
                </div>
            </form>
        </div>
    </div>
</main>