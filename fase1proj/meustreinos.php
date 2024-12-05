<?php
    session_start();
    require_once 'conex.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/meustreinos.css"> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Treinos</title>
</head>
<body>
    <div class="container">
        <header class="inicio"> 
            <figure>
                <img src="img/logoacad.png">
            </figure>
            <a href="index.php" class="topo"> Home </a>
            <a href="musica.php" class="topo"> Playlists </a>
            <a href="meustreinos.php" class="topo"> Treinos </a>
        </header>

        <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Treinos
                            <a href="create.php" class="btn btn-primary float-end">Adicionar treino</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Titulo</th>
                                    <th>Descricao</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $query = "SELECT * FROM treino";
                                    $query_run = mysqli_query($conn, $query);
                                    if(mysqli_num_rows($query_run) > 0)
                                    {
                                        foreach($query_run as $treino)
                                        {
                                            ?>
                                            <tr>
                                                <td><?= $treino['titulo']; ?></td>
                                                <td><?= $treino['descricao']; ?></td>
                                                <td>
                                                    <a href="update.php?prontuario=<?= $treino['titulo']; ?> &titulo= <?= $treino['titulo']; ?>" class="btn btn-success btn-sm">Editar</a>
                                                    <a href="delete.php?prontuario=<?= $treino['titulo']; ?> &nome= <?= $treino['titulo']; ?>" class="btn btn-success btn-sm">Deletar</a>   
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                    }
                                    else
                                    {
                                        echo "<h5> Nenhum treino encontrado </h5>";
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

        <main class="meio">
            <p> Parece que você ainda não possui nenhum treino personalizado. </p>
            <div class="botoes">
                <button> <a href="treinosprontos.php" class="redtreino"> Encontrar treinos prontos  </a> </button>
                <button>  <a href="novotreino.php" class="redtreino"> Adicionar novo treino </a> </button>
            </div>
        </main>
    </div>
    
</body>
</html>