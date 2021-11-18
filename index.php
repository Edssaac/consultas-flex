<?php

    // Verificando se foi passado algum CEP:
    if ( isset($_GET['cep']) && !empty($_GET['cep']) )
    {
        $cep = $_GET['cep'];
    }
    else
    {
        $cep = "";
        $mensagem = "";
    }

    // Base que preencherá os campos de informação:
    $form =
    [
        "cep" => "",
        "logradouro" => "",
        "complemento" => "",
        "bairro" => "",
        "localidade" => "",
        "uf" => "",
        "ibge" => "",
        "gia" => "",
        "ddd" => "",
        "siafi" => ""
    ];


    // Tratando do CEP recebido:
    if ( !empty($cep) )
    {
        $mensagem = "";
        if ( strlen($cep) != 8 ) // Veficiando se há 8 dígitos:
        {
            $mensagem = '<div class="alert alert-danger" role="alert">
                            Atenção! CEP deve possuir 8 caracteres.
                        </div>';
        }
        elseif ( !is_numeric($cep) ) // Verificando se os 8 dígitos são númericos:
        {
            $mensagem = '<div class="alert alert-danger" role="alert">
                            Atenção! CEP deve conter apenas caracteres numéricos.
                        </div>';
        }
        else // Buscando o CEP validado na API:
        {
            $json = file_get_contents("https://viacep.com.br/ws/".$cep."/json/");
            $info = json_decode($json, true);
            
            if ( !$info) // Verificando se recebeu algo:
            {
                $mensagem = '<div class="alert alert-danger" role="alert">
                    Desculpe, erro ao buscar por CEP informado.
                </div>';
            }
            elseif ( isset($info['erro']) ) // Verificando se houve "erro"
            {
                $mensagem = '<div class="alert alert-danger" role="alert">
                    CEP não encontrado, verifique o código e tente novamente.
                </div>';
            }
            else // Caso esteja tudo correto:
            {
                // Atualizando o array das informações:
                foreach ($info as $key => $value) {
                    if (empty($value))
                        $form[$key] = "-";
                    else
                        $form[$key] = $value;
                }
            }
        }
    }
?>


<!doctype html>
<html lang="pt_br">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

        <link rel="shortcut icon" href="https://img.icons8.com/emoji/96/000000/house-emoji.png" type="image/x-icon">
        
        <style>
            @media screen and (max-width: 992px) {
                    .line {
                        display: none;
                    }
                }
        </style>

        <title>Consultar CEP</title>
    </head>

    <body class="bg-dark text-light">

        <main class="container">
            
            <div class="jumbotron bg-danger rounded text-center my-5 py-5">
                <h1>Consulte seu CEP</h1>
                <p>Digite um CEP válido e tenha acesso a todas as informações disponíveis</p>
            </div>
    
            <div>
                <?=$mensagem?>
            </div>

            <div class="card row justify-content-between mx-0 mb-5">
                <div class="row">
                    <form action="" class="col-lg-2 text-dark mx-3 mt-3">
                        <div class="form-group">
                            <label for="cep"> CEP: </label>
                            <input class="form-control" type="text" name="cep" placeholder="01001000" value="<?=$cep?>" minlength="8" maxlength="8" size="8">
                        </div>
    
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Consultar</button>
                        </div>
                    </form>

                    <div class="col-lg-1 line">
                        <div class="bg-danger" style="height:100%; width:5px;">&nbsp;</div>
                    </div>
                    
                    <form class="col text-dark mx-3 my-3">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="cidade">Cidade</label>
                                <input type="text" class="form-control" id="cidade" placeholder="São Paulo" value="<?=$form['localidade']?>" readonly>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="uf">UF</label>
                                <input type="text" class="form-control" id="uf" placeholder="SP" value="<?=$form['uf']?>" readonly>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="endereco">Endereço</label>
                            <input type="text" class="form-control" id="endereco" placeholder="Praça da Sé" value="<?=$form['logradouro']?>" readonly>
                        </div>

                        <div class="form-group">
                            <label for="bairro">Bairro</label>
                            <input type="text" class="form-control" id="bairro" placeholder="Sé" value="<?=$form['bairro']?>" readonly>
                        </div>

                        <div class="form-group">
                            <label for="complemento">Complemento</label>
                            <input type="text" class="form-control" id="complemento" placeholder="lado ímpar" value="<?=$form['complemento']?>" readonly>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-2">
                                <label for="ibge">IBGE</label>
                                <input type="text" class="form-control" id="ibge" placeholder="3550308" value="<?=$form['ibge']?>" readonly>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="gia">GIA</label>
                                <input type="text" class="form-control" id="gia" placeholder="1004" value="<?=$form['gia']?>" readonly>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="siafi">SIAFI</label>
                                <input type="text" class="form-control" id="siafi" placeholder="7107" value="<?=$form['siafi']?>" readonly>
                            </div>
                            <div class="form-group col-md-2">
                                <label for="ddd">DDD</label>
                                <input type="text" class="form-control" id="ddd" placeholder="11" value="<?=$form['ddd']?>" readonly>
                            </div>
                            <div class="form-group col-md-2">
                                <label for="cep">CEP</label>
                                <input type="text" class="form-control" id="cep" placeholder="01001-000" value="<?=$form['cep']?>" readonly>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </main>

        <!-- Bootstrap Bundle with Popper -->
        <script 
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" 
            integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" 
            crossorigin="anonymous">
        </script>

    </body>
</html>
