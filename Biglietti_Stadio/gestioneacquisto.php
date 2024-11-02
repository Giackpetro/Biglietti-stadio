<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <title>Document</title>
</head>
<body>
    <?php
        $nome = $_GET['nome'];
        $cognome = $_GET['cognome'];
        $cf = $_GET['cf'];
        $settore = $_GET['settore'];
        $codiceSconto = $_GET['sconto'];
        $tipoBiglietto = $_GET['biglietto'];
        $numBigliettiAgg = isset($_GET['nBigliettiAgg']);
        $prezzi =array(30, 80, 120);

        echo "<h1>Listino Prezzi</h1>";
        echo "<ul>";
        echo "<li>Curva: $prezzi[0] €</li>";
        echo "<li>Tribuna Centrale: $prezzi[1] €</li>";
        echo "<li>Tribuna d'Onore: $prezzi[2] €</li>";
        echo "</ul>";

        if ($tipoBiglietto == 1) {
            $numBigliettiTotali = 1;
        } else {
            $numBigliettiTotali = 1 + $numBigliettiAgg;
        }

        $prezzoBase = $prezzi[$settore-1];
        $totale = $prezzoBase * $numBigliettiTotali;
        $sconto = 0;
        $scontoAttivo = false;

        if ($codiceSconto === 'FIRENZE5') {
            $sconto = $totale * 0.05;
            $totaleScontato = $totale - $sconto;
            $scontoAttivo = true;
        } else if (!empty($codiceSconto)) {
            $codiceErrato = true;
        } else {
            $totaleScontato = $totale;
        }

        $dataOra = date('d/m/Y H:i');

        echo "<h1>Dettagli Acquisto</h1>";
        echo "<p>Nome: $nome</p>";
        echo "<p>Cognome: $cognome</p>";
        echo "<p>Codice Fiscale: $cf</p>";
        echo "<p>Data e Ora dell'acquisto: $dataOra</p>";
        echo "<p>Numero di biglietti acquistati: $numBigliettiTotali</p>";

        if ($numBigliettiAgg > 1) {
            echo "<h2>Codici Fiscali delle persone aggiuntive:</h2><ul>";
            for ($i = 1; $i <= $numBigliettiAgg; $i++) {
                $cfAggiuntivo = $_GET["altronome$i"];
                echo "<li>$cfAggiuntivo</li>";
            }
            echo "</ul>";
        }

        if ($scontoAttivo) {
            echo "<h3>Prezzo non scontato: $totale €</h3>";
            echo "<h3>Sconto applicato: $sconto €</h3>";
            echo "<h2>Prezzo da pagare: $totaleScontato €</h2>";
        }else{
            echo "<h2>Totale da pagare: $totale €</h2>";
        }

        if (isset($codiceErrato) && $codiceErrato) {
            echo "<p style='color:red;'>Codice sconto inesistente</p>";
        }
    ?>
</body>
</html>