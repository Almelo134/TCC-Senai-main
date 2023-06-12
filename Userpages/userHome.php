<?php
  require 'phpUser/bancoUser.php';
  session_start();
  if (!isset($_SESSION['id_usuario'])) {
    header("Location: index.php");
    exit();
}
$id_usuario = $_SESSION['id_usuario'];
include 'phpUser/projectInfoUser.php';
// include 'phpUser/fotoUpload.php';    
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin</title>
    <link rel="stylesheet" href="../assets/vendors/mdi/css/materialdesignicons.min.css">


    <!-- <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css"> -->
    <!-- <link rel="stylesheet" href="assets/vendors/flag-icon-css/css/flag-icon.min.css"> -->

    <link rel="stylesheet" href="../assets/css/modal.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="shortcut icon" href="../assets/images/favicon.png" />
</head>

<body class="sidebar-icon-only">
    <div class="container-scroller">

        <nav class="sidebar sidebar-offcanvas" id="sidebar">

            <!-- Adicionar Logo -->
            <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
                <a class="sidebar-brand brand-logo" href="userHome.php"><img src="../assets/images/logo.svg" alt="logo" /></a>
                <a class="sidebar-brand brand-logo-mini" href="userHome.php"><img src="../assets/images/logo-mini.svg" alt="logo" /></a>
            </div>

            <ul class="nav">
                <li class="nav-item profile">
                    <div class="profile-desc">
                        <div class="profile-pic">
                            <div class="count-indicator">
                                <img class="img-xs rounded-circle "
                                    src=<?php echo '../assets/images/faces/'.$perfilLogado.'.jpg'?>>
                                <span class="count bg-success"></span>
                            </div>
                            <div class="profile-name">
                                <h5 class="mb-0 font-weight-normal"><?php include '../PHP/addInfo.php'; echo $nome;?></h5>
                            </div>
                        </div>
                        <a href="#" id="profile-dropdown" data-toggle="dropdown"><i
                                class="mdi mdi-dots-vertical"></i></a>
                        <div class="dropdown-menu dropdown-menu-right sidebar-dropdown preview-list"
                            aria-labelledby="profile-dropdown">
                            <a href="config.php" class="dropdown-item preview-item">
                                <div class="preview-thumbnail">
                                    <div class="preview-icon bg-dark rounded-circle">
                                        <i class="mdi mdi-settings text-primary"></i>
                                    </div>
                                </div>
                                <div class="preview-item-content">
                                    <p class="preview-subject ellipsis mb-1 text-small">Configurações</p>
                                </div>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="profile.php" class="dropdown-item preview-item">
                                <div class="preview-thumbnail">
                                    <div class="preview-icon bg-dark rounded-circle">
                                        <i class="mdi mdi-onepassword  text-info"></i>
                                    </div>
                                </div>
                                <div class="preview-item-content">
                                    <p class="preview-subject ellipsis mb-1 text-small">Mudar senha</p>
                                </div>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item preview-item">
                                <div class="preview-thumbnail">
                                    <div class="preview-icon bg-dark rounded-circle">
                                        <i class="mdi mdi-calendar-today text-success"></i>
                                    </div>
                                </div>
                                <div class="preview-item-content">
                                    <p class="preview-subject ellipsis mb-1 text-small">Lista de afazeres</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </li>
                <li class="nav-item nav-category">
                    <span class="nav-link">Navegação</span>
                </li>
                <li class="nav-item menu-items">
                    <a class="nav-link" href="home.php">
                        <span class="menu-icon">
                            <i class="mdi mdi-speedometer"></i>
                        </span>
                        <span class="menu-title">Home</span>
                    </a>
                </li>

                <li class="nav-item menu-items">
                    <a class="nav-link" href="userProfile.php">
                        <span class="menu-icon">
                            <i class="mdi mdi-account-outline"></i>
                        </span>
                        <span class="menu-title">Perfil</span>
                    </a>
                </li>

                <li class="nav-item menu-items">
                    <a class="nav-link" href="userAgenda.php">
                        <span class="menu-icon">
                            <i class="mdi mdi-account-outline"></i>
                        </span>
                        <span class="menu-title">Agenda</span>
                    </a>
                </li>
            </ul>
        </nav>

        <div class="container-fluid page-body-wrapper">

            <nav class="navbar p-0 fixed-top d-flex flex-row">
                <div class="navbar-brand-wrapper d-flex d-lg-none align-items-center justify-content-center">
                    <a class="navbar-brand brand-logo-mini" href="home.php"><img src="../assets/images/logo-mini.svg"
                            alt="logo" /></a>
                </div>
                <div class="navbar-menu-wrapper flex-grow d-flex align-items-stretch">
                    <button class="navbar-toggler navbar-toggler align-self-center" type="button"
                        data-toggle="minimize">
                        <span class="mdi mdi-menu"></span>
                    </button>

                    <ul class="navbar-nav navbar-nav-right">
                        <li class="nav-item dropdown d-none d-lg-block">
                            <a class="nav-link btn btn-success create-new-button" id="createbuttonDropdown"
                                href="devSoft.php">+ Criar novo projeto</a>
                            </a>
                        </li>


                        <li class="nav-item dropdown">
                            <a class="nav-link" id="profileDropdown" href="#" data-toggle="dropdown">
                                <div class="navbar-profile">
                                    <img class="img-xs rounded-circle "
                                        src=<?php echo '../assets/images/faces/'.$perfilLogado.'.jpg'?>>
                                    <p class="mb-0 d-none d-sm-block navbar-profile-name"><?php print $nome; ?></p>
                                    <i class="mdi mdi-menu-down d-none d-sm-block"></i>
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list"
                                aria-labelledby="profileDropdown">
                                <h6 class="p-3 mb-0">Profile</h6>
                                <div class="dropdown-divider"></div>
                                <a href="config.php" class="dropdown-item preview-item">
                                    <div class="preview-thumbnail">
                                        <div class="preview-icon bg-dark rounded-circle">
                                            <i class="mdi mdi-settings text-success"></i>
                                        </div>
                                    </div>
                                    <div class="preview-item-content">
                                        <p class="preview-subject mb-1">Configurações</p>
                                    </div>
                                </a>
                                <div class="logout" onclick="location.href='PHP/logout.php'">
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item preview-item">
                                        <div class="preview-thumbnail">
                                            <div class="preview-icon bg-dark rounded-circle">
                                                <i class="mdi mdi-logout text-danger"></i>
                                            </div>
                                        </div>
                                        <div class="preview-item-content">
                                            <p class="preview-subject mb-1">Log out</p>
                                        </div>
                                    </a>
                        </li>
                    </ul>
                    <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                        data-toggle="offcanvas">
                        <span class="mdi mdi-format-line-spacing"></span>
                    </button>
                </div>
            </nav>

            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="row">
                        <div class="col-md-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex flex-row justify-content-between">
                                        <h4 class="card-title mb-1">Projetos abertos</h4>
                                        <p class="text-muted mb-1">Data de entrega</p>
                                    </div>


                                    <!-- projetos em aberto -->
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="preview-list">
                                                <!-- unico item -->
                                                <?php
                                                // Consulta SQL para buscar todos os itens na tabela
                                                $sql = "SELECT * FROM projeto";

                                                // Executa a consulta SQL
                                                $result = $conn->query($sql);

                                                // Verifica se a consulta retornou resultados
                                                if ($result->num_rows > 0) {
                                                    // Itera sobre os resultados e exibe as informações
                                                    while ($row = $result->fetch_assoc()) {
                                                        // Aqui você pode acessar as colunas do resultado pelo nome
                                                        $id = $row['id'];
                                                        $nomeProj = $row['nomeProj'];
                                                        $descricao = $row['descricao'];
                                                        $categoria = $row['categoria'];
                                                        $participantes = $row['participantes'];
                                                        $calendario = $row['calendario'];

                                                        echo '<div class="preview-item border-bottom" onclick="openModal(' . $id . ')">';
                                                        echo '  <div class="preview-thumbnail">';
                                                        echo '    <div class="preview-icon bg-primary">';
                                                        echo '      <i class="mdi mdi-file-document"></i>';
                                                        echo '    </div>';
                                                        echo '  </div>';
                                                        echo '  <div class="preview-item-content d-sm-flex flex-grow">';
                                                        echo '    <div class="flex-grow">';
                                                        echo '      <h6 class="preview-subject">' . $nomeProj . '</h6>';
                                                        echo '      <p class="text-muted mb-0">' . $descricao . '</p>';
                                                        echo '    </div>';
                                                        echo '    <div class="mr-auto text-sm-center pt-2 pt-sm-0">';
                                                        echo '      <p class="text-muted mb-0">' . $calendario . '</p>';
                                                        echo '      <div id="myModal-' . $id . '" class="modal">';
                                                        echo '        <div class="modal-content">';
                                                        echo '          <h3>Dados do Projeto</h3>';
                                                        echo '          <p class="modalText"><strong>Nome do Projeto:</strong> ' . $nomeProj . '</p>';
                                                        echo '          <p><strong>Descrição:</strong> ' . $descricao . '</p>';
                                                        echo '          <p><strong>Categoria:</strong> ' . $categoria . '</p>';
                                                        echo '          <p><strong>Setor responsável:</strong> ' . $participantes . '</p>';
                                                        echo '          <p><strong>Data de entrega:</strong> ' . $calendario . '</p>';
                                                        echo '          <div class="modal-buttons">';
                                                        echo '            <button class="btn btn-primary btn-concluir-projeto" onclick="projetoConcluido(' . $id . ')">Projeto Concluído</button>';
                                                        echo '            <button class="btn btn-secondary btn-etapas-projeto" onclick="etapasProjeto(' . $id . ')">Etapas do Projeto</button>';
                                                        echo '          </div>';
                                                        echo '        </div>';
                                                        echo '      </div>';                                                        
                                                        echo '      <script>';
                                                        echo '        function openModal(id) {';
                                                        echo '          document.getElementById("myModal-" + id).style.display = "block";';
                                                        echo '        }';
                                                        // echo '        function projetoConcluido(id) {';
                                                        // echo '          // Lógica para marcar o projeto como concluído';
                                                        // echo '        }';
                                                        // echo '        function etapasProjeto(id) {';
                                                        // echo '          // Lógica para exibir as etapas do projeto';
                                                        // echo '        }';
                                                        echo '      </script>';
                                                        echo '    </div>';
                                                        echo '  </div>';
                                                        echo '</div>';
                                                            }
                                                        echo '</div>';
                                                        echo '<script>';
                                                        echo 'window.addEventListener("click", function(event) {';
                                                        echo '    var modals = document.getElementsByClassName("modal");';
                                                        echo '    for (var i = 0; i < modals.length; i++) {';
                                                        echo '        var modal = modals[i];';
                                                        echo '        if (event.target == modal) {';
                                                        echo '            modal.style.display = "none";';
                                                        echo '        }';
                                                        echo '    }';
                                                        echo '});';
                                                        echo '</script>';
                                                        } else {
                                                        echo "Nenhum resultado encontrado.";
                                                    }

                                                ?>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- lista de afazeres -->
                        <div class="row">
                            <div class="col-md-12 stretch-card">
                                <div class="card">
                                    <div class="card-body">
                                    <h4 class="card-title">Lista de afazeres</h4>
                                        <div class="add-items d-flex">
                                            <input type="text" class="form-control todo-list-input" placeholder="Escreva sua tarefa">
                                            <button class="add btn btn-primary todo-list-add-btn">Adicionar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- plugins:js -->
    <script src="../assets/vendors/js/vendor.bundle.base.js"></script>
    <script src="../assets/vendors/progressbar.js/progressbar.min.js"></script>
    <script src="../assets/js/off-canvas.js"></script>
    <script src="../assets/js/hoverable-collapse.js"></script>
    <script src="../assets/js/misc.js"></script>
    <script src="../assets/js/settings.js"></script>
    <script src="../assets/js/todolist.js"></script>
    <script src="../assets/js/dashboard.js"></script>

</body>

</html>