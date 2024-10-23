<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <style>
        table, td, th{
            border: 1px solid black;
            border-collapse: collapse;
        }
    </style>
    <?php
    $nome = $_GET['name'];
    $cognome = $_GET['surname'];
    $dataNascita = $_GET['dateBirth'];
    $orario= $_GET['time'];
    $mezzoTrasporto = $_GET['trasporto'];
    $attivita = array(); 
    if (isset($_GET['corso1'])) { //isset controlla se la chiave corso1 esiste
    $attivita[] = 'Corso di Inglese';
    }
    if (isset($_GET['corso2'])) { 
    $attivita[] = 'Corso di Teatro';
    }
    if (isset($_GET['corso3'])) {
    $attivita[] = 'Attività Sportive';
}
    ?>
    <table>
        <tr>
            <th>Nome</th>
            <th>Cognome</th>
            <th>Data di nascita</th>
            <th>Orario</th>
            <th>Mezzo di trasporto</th>
            <th>Attività</th>
        </tr>
        <tr>
            <?php
            echo "<td>$nome</td>";
            echo "<td>$cognome</td>";
            echo "<td>$dataNascita </td>";
            echo "<td>$orario </td>";
            echo "<td>$mezzoTrasporto </td>";
            echo"<td>";
                if (count($attivita) > 0) {
                    echo implode(', ', $attivita); // converte l'array in una stringa separata da virgole
                } else {
                    echo 'Nessuna attività';
                }
                echo"</td>";
            ?>
        </tr>
    </table>
</body>
</html>