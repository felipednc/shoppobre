<?php
require 'conexao.php';
require 'config.php';
require 'models/auth.php';

$auth = new Auth($pdo, $base);

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="<?=$base?>assets/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <title>shoppobre</title>
</head>

<body>
    <header id="menu_nav">
        <div class="logomenu"><a href="<?=$base?>index.php"> <img class="img-fluid" alt="Logo_img" src="<?=$base?>assets/image/testelogo.png"></a></div>
        <nav>
            <ul>
                <a href="<?=$base?>index.php">
                    <li><button class="btn btn-warning " style="background-color:#fd7e14 ; color:white; " data-bs-toggle="modal" data-bs-target="#loginModal">Pagina Inicial</button></li>
                </a>
                <li><button class="btn btn-warning" style="background-color:#fd7e14 ;color:white; " data-bs-toggle="modal" data-bs-target="#loginModal">Login</button></li>
                <div class="border"></div>
                <li><button type="button" style="color:white;" class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#Cad_modal">Cadastro</button></li>
            </ul>
        </nav>
    </header>

    <div class=" container" style="position: relative; top:100px; ">
        <div class="area_midnav">
            <ul class="nav nav-pills justify-content-center mb-3 shadow p-3 mb-5 bg-body-tertiary rounded" id="pills-tab" role="tablist" style=" background:linear-gradient(360deg, #FF6633, #F53E2D); ">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Home</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Profile</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Contact</button>
                </li>
                <button type="button" class="shop_carrinho" id="liveToastBtn" style="position:relative; right:-500px;  background-color:transparent; border:none;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="25" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
                        <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                    </svg>
                </button>
            </ul>
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab" tabindex="0">...</div>
                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab" tabindex="0">...</div>
                <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab" tabindex="0">...</div>
            </div>
            </ul>
        </div>




    </div>










    <div class="modal fade" id="Cad_modal" tabindex="-1" aria-labelledby="loginModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="Title_login">Login</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="row g-3" method="POST" id="cad_form" action="adicionar_action.php">
                        <div class="col-md-4">
                            <label for="validationDefault01" class="form-label">Nome:</label>
                            <input type="text" class="form-control" name="nome" id="validationDefault01" required>
                        </div>
                        <div class="col-md-4">
                            <label for="validationDefault02" class="form-label">Sobrenome:</label>
                            <input type="text" class="form-control" name="sobrenome" id="validationDefault02" required>
                        </div>
                        <div class="col-md-4">
                            <label for="validationDefault03" class="form-label">E-mail:</label>
                            <input type="email" class="form-control" name="email" id="validationDefault03" required>
                        </div>
                        <div class="col-md-4">
                            <label for="validationDefault03" class="form-label">Idade:</label>
                            <input type="number" class="form-control" name="idade" id="validationDefault03" required>
                        </div>
                        <div class="col-md-4">
                            <label for="validationDefaultUsername" class="form-label">CPF:</label>
                            <div class="input-group">
                                <span class="input-group-text" id="inputGroupPrepend2"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                                        <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3Zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
                                    </svg></span>
                                <input type="number" class="form-control" name="cpf" id="validationDefaultUsername" aria-describedby="inputGroupPrepend2" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="validationDefault02" class="form-label">Senha:</label>
                            <input type="password" minlength="6" maxlength="50" name="senha" class="form-control" id="validationDefault02" required>
                        </div>
                        <div class="col-md-6">
                            <label for="validationDefault05" class="form-label">CEP:</label>
                            <input type="text" class="form-control" name="cep" id="cep" required>
                        </div>
                        <div class="col-md-6">
                            <label for="validationDefault03" class="form-label">Endereço:</label>
                            <input type="text" class="form-control" name="endereco" id="endereco" required>
                        </div>
                        <div class="col-md-6">
                            <label for="validationDefault03" class="form-label">Numero:</label>
                            <input type="text" class="form-control" name="numero" id="numero" required>
                        </div>
                        <div class="col-md-6">
                            <label for="validationDefault03" class="form-label">Cidade:</label>
                            <input type="text" class="form-control" name="cidade" id="cidade" required>
                        </div>
                        <div class="col-md-6">
                            <label for="validationDefault04" class="form-label">Bairro:</label>
                            <input type="text" class="form-control" name="bairro" id="bairro" aria-describedby="inputGroupPrepend2" required>
                        </div>
                        <div class="col-md-6">
                            <label for="validationDefault04" class="form-label">Estado:</label>
                            <input type="text" class="form-control" name="estado" id="estado" aria-describedby="inputGroupPrepend2" required>
                        </div>

                        <div class="col-12">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="invalidCheck2" required>
                                <label class="form-check-label" for="invalidCheck2">
                                    Aceito todos os <a href="#">Termos</a>!
                                </label>
                            </div>
                        </div>
                        <div class="col-12">
                            <button class="btn btn-primary" id="cadBtn" type="submit">Enviar</button>
                        </div>
                    </form>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>

                </div>
            </div>
        </div>
    </div>








































































































<!----------------------------      Area do Carrinho       -----------------------------  -->

    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
        <div class="offcanvas-header">
           <img src="<?=$base?>assets/image/carrinho.gif"> <h5 class="offcanvas-title" id="offcanvasRightLabel">Carrinho</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            ...
        </div>
    </div>

<!----------------------------    FIM  Area do Carrinho       -----------------------------  -->






<!----------------------------      Mensagem carrinho       -----------------------------  -->

    <div class="toast-container position-fixed bottom-0 end-0 p-3">
        <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-circle-fill rounded me-2" viewBox="0 0 16 16">
                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z" />
                </svg>
                <strong class="me-auto">Negado!!</strong>
                <small>1 seconds now</small>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                Você só pode vizualizar o carrinho quando está logado!
            </div>
        </div>
    </div>
<!----------------------------     FIM mensagem carrinho     -----------------------------  -->








<!----------------------------     Form login      -----------------------------  -->
    <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="Title_login">Login</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="<?=$base?>login_action.php">
                        <div class="mb-3">
                            <label for="cpf" class="form-label">CPF:</label>
                            <input type="cpf" name="cpf" maxlength="100" class="form-control" id="cpf" aria-describedby="emailHelp">

                        </div>
                        <div class="mb-3">
                            <label for="senha" class="form-label">Senha:</label>
                            <input type="password" name="senha" class="form-control" id="senha">
                            <div id="emailHelp" class="form-text">Nunca compartilhe sua senha com ninguém.</div>
                        </div>
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input d-inline-flex focus-ring py-1 px-2 text-decoration-none border rounded-2" style="--bs-focus-ring-color: rgba(var(--bs-success-rgb), .25)" id="Checksenha">
                            <label class="form-check-label" for="Checksenha">lembrar senha</label>
                        </div>
                        <button type="submit" class="btn btn-primary">Entrar</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>

                </div>
            </div>
        </div>
    </div>
<!----------------------------      fim Form login      -----------------------------  -->







    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="<?=$base?>assets/js/script.js"></script>

</body>

</html>