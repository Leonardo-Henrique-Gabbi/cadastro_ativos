<?php
include('../controle/controle_session.php');
include('../controle/funcoes.php');
include('../modelo/conexao.php');
include('menu_superior.php');
include('cabecario.php');

// Consultar dados das movimentações
$sql = "SELECT
            m.idMovimentacao,
            m.idUsuario,
            m.idAtivo,
            m.localOrigem,
            m.localDestino,
            m.dataMovimentacao,
            m.descricaoMov,
            m.quantidadeUso,
            m.quantidadeMov,
            m.tipoMovimentacao,
            m.statusMov,
            (SELECT descricaoMarca FROM marca ma WHERE ma.idMarca = a.idMarca) AS marca,
            (SELECT descricaoTipo FROM tipo ti WHERE ti.idTipo = a.idTipo) AS tipo,
            (SELECT usuario FROM usuario u WHERE u.idUsuario = m.idUsuario) AS usuario,
            (SELECT descricaoAtivo FROM ativo a WHERE a.idAtivo = m.idAtivo) AS ativo
        FROM movimentacao m
        LEFT JOIN ativo a ON m.idAtivo = a.idAtivo"; // Adicionado JOIN com a tabela ativo


$marcas=busca_info_bd($conexao,'marca','statusMarca','S');
$tipos=busca_info_bd($conexao,'tipo','statusTipo','S');
$result = mysqli_query($conexao, $sql) or die(false);
$movimentacoes_bd = $result->fetch_all(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Relatório de Movimentações</title>
  <link rel="stylesheet" href="../css/style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <div class="content-box">
    <h1 class="text-center mb-4">Relatório de Movimentações</h1>

    <!-- Filtros avançados -->
    <form method="GET" action="relatorio.php">
      <div class="filters">
        <div>
          <label for="ativo">Ativo:</label>
          <select id="ativo" name="ativo">
            <option value="">Todos</option>
            <?php
            // Buscar ativos do banco de dados
            $sql_ativos = "SELECT idAtivo, descricaoAtivo FROM ativo";
            $result_ativos = mysqli_query($conexao, $sql_ativos);
            while ($ativo = mysqli_fetch_assoc($result_ativos)) {
              $selected = (isset($_GET['ativo']) && $_GET['ativo'] == $ativo['idAtivo']) ? 'selected' : '';
              echo "<option value='{$ativo['idAtivo']}' $selected>{$ativo['descricaoAtivo']}</option>";
            }
            ?>
          </select>
        </div>
        <div>
          <label for="usuario">Usuário:</label>
          <select id="usuario" name="usuario">
            <option value="">Todos</option>
            <?php
            // Buscar usuários do banco de dados
            $sql_usuarios = "SELECT idUsuario, usuario FROM usuario";
            $result_usuarios = mysqli_query($conexao, $sql_usuarios);
            while ($usuario = mysqli_fetch_assoc($result_usuarios)) {
              $selected = (isset($_GET['usuario']) && $_GET['usuario'] == $usuario['idUsuario']) ? 'selected' : '';
              echo "<option value='{$usuario['idUsuario']}' $selected>{$usuario['usuario']}</option>";
            }
            ?>
          </select>
        </div>
        <div>
          <label for="tipo-movimentacao">Tipo de Movimentação:</label>
          <select id="tipo-movimentacao" name="tipo-movimentacao">
            <option value="">Todos</option>
            <option value="entrada" <?php echo (isset($_GET['tipo-movimentacao']) && $_GET['tipo-movimentacao'] == 'entrada') ? 'selected' : ''; ?>>Entrada</option>
            <option value="saida" <?php echo (isset($_GET['tipo-movimentacao']) && $_GET['tipo-movimentacao'] == 'saida') ? 'selected' : ''; ?>>Saída</option>
          </select>
        </div>
        <div>
          <label for="data-inicial">Data Inicial:</label>
          <input type="date" id="data-inicial" name="data-inicial" value="<?php echo isset($_GET['data-inicial']) ? $_GET['data-inicial'] : ''; ?>">
        </div>
        <div>
          <label for="data-final">Data Final:</label>
          <input type="date" id="data-final" name="data-final" value="<?php echo isset($_GET['data-final']) ? $_GET['data-final'] : ''; ?>">
        </div>


         <label for="tipo">Tipo</label>
                <select class="form-select" id="tipo" name="tipo" >
                    <option value="" selected>Todos Tipos</option>
                    <?php foreach($tipos as $tipo) {
                        echo '<option value="'.$tipo['idTipo'].'">'.$tipo['descricaoTipo'].'</option>';
                    } ?>
                </select>
                <div class="form-group">
                <label for="marca">Marca</label>
                <select class="form-select" id="marca" name="marca" >
                    <option value="" selected>Todas Marcas</option>
                    <?php foreach($marcas as $marca) {
                        echo '<option value="'.$marca['idMarca'].'">'.$marca['descricaoMarca'].'</option>';
                    } ?>
                </select>
            </div>
    </form>

    <!-- Tabela de dados -->
    <table class="table table-striped table-bordered table-hover tabela_personalizada">
      <thead class="thead-dark bg-dark-custom text-white">
        <tr>
          <th scope="col">Ativo</th>
          <th scope="col">Descrição</th>
          <th scope="col">Quantidade</th>
          <th scope="col">TipoMov</th>
          <th scope="col">Origem</th>
          <th scope="col">Destino</th>
          <th scope="col">Marca</th>
          <th scope="col">Tipo</th>
          <th scope="col">Data</th>
          <th scope="col">Usuário</th>
        </tr>
      </thead>
      <tbody>
        <?php
        // Aplicar filtros
        $filtro_sql = "";
        if (isset($_GET['ativo']) && !empty($_GET['ativo'])) {
          $filtro_sql .= " AND m.idAtivo = '{$_GET['ativo']}'";
        }
        if (isset($_GET['usuario']) && !empty($_GET['usuario'])) {
          $filtro_sql .= " AND m.idUsuario = '{$_GET['usuario']}'";
        }
        if (isset($_GET['tipo-movimentacao']) && !empty($_GET['tipo-movimentacao'])) {
          $filtro_sql .= " AND m.tipoMovimentacao = '{$_GET['tipo-movimentacao']}'";
        }
        if (isset($_GET['data-inicial']) && !empty($_GET['data-inicial'])) {
          $filtro_sql .= " AND m.dataMovimentacao >= '{$_GET['data-inicial']}'";
        }
        if (isset($_GET['data-final']) && !empty($_GET['data-final'])) {
          $filtro_sql .= " AND m.dataMovimentacao <= '{$_GET['data-final']}'";
        }
        if (isset($_GET['local-origem']) && !empty($_GET['local-origem'])) {
          $filtro_sql .= " AND m.localOrigem LIKE '%{$_GET['local-origem']}%'";
        }
        if (isset($_GET['local-destino']) && !empty($_GET['local-destino'])) {
          $filtro_sql .= " AND m.localDestino LIKE '%{$_GET['local-destino']}%'";
        }

        // Consulta com filtros
        $sql_filtrado = $sql . " WHERE 1=1" . $filtro_sql;
        $result_filtrado = mysqli_query($conexao, $sql_filtrado);
        $movimentacoes_filtradas = $result_filtrado->fetch_all(MYSQLI_ASSOC);

        foreach ($movimentacoes_filtradas as $movimentacao) {
        ?>
          <tr>
            <td><?php echo $movimentacao['ativo']; ?></td>
            <td><?php echo $movimentacao['descricaoMov']; ?></td>
            <td><?php echo $movimentacao['quantidadeMov']; ?></td>
            <td><?php echo $movimentacao['tipoMovimentacao'] == 'entrada' ? 'Entrada' : 'Saída'; ?></td>
            <td><?php echo $movimentacao['localOrigem']; ?></td>
            <td><?php echo $movimentacao['localDestino']; ?></td>
            <td><?php echo $movimentacao['marca']; ?></td>
            <td><?php echo $movimentacao['tipo']; ?></td>
            <td><?php echo date('d/m/Y H:i:s', strtotime($movimentacao['dataMovimentacao'])); ?></td>
            <td><?php echo $movimentacao['usuario']; ?></td>
          </tr>
        <?php
        }
        ?>
      </tbody>
    </table>

    <!-- Botão de exportar -->
    <div class="button-container">
      <a href="resultado_relatorio.php?<?php echo http_build_query($_GET); ?>" class="btn btn-primary">Exportar Relatório</a>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>