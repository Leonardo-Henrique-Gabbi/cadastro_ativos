<?php
include("../visao/cabecario.php");
include("../visao/menu_superior.php");
?>

<body>
    <link rel="stylesheet" href="../css/url.css">
    <div class = "container"> 
<?php
        if (isset($_GET['busca'])) {
            $termo = urlencode($_GET['busca']);
            $url = "https://api.mercadolibre.com/sites/MLB/search?q=$termo";

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $response = curl_exec($ch);
            curl_close($ch);

            $resultados = json_decode($response, true);

            if (!empty($resultados['results'])) {
                foreach ($resultados['results'] as $produto) {
                    echo "<div class='produto'>";
                    echo "<h3>" . htmlspecialchars($produto['title']) . "</h3>";
                    echo " <div ><img src='" . htmlspecialchars($produto['thumbnail']) . "' alt='Imagem do Produto'></div>";
                    echo "<p>Preço: R$" . number_format($produto['price'], 2, ',', '.') . "</p>";
                    echo "<a href='" . htmlspecialchars($produto['permalink']) . "' target='_blank'>Ver no Mercado Livre</a>";
                    echo "</div>";
                }
            } else {
                echo "<p>Nenhum produto encontrado.</p>";
            }
        }
        
        ?>
        </div>
    </body>