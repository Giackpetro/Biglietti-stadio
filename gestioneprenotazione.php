<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="widtd=device-widtd, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <style>
        table, td, td {
            border: 1px solid black;
            margin: auto;
            text-align: center;
            border-collapse: collapse;
        }
    </style>
<?php
    $nome = $_POST['nome'];
    $cognome = $_POST['cognome'];
    $numtavolo = $_POST['numtavolo'];
    $orario= $_POST['orario'];
    $note = $_POST['note'];
    $piatti = array(); 
    if (isset($_POST['antipasto'])) { //isset controlla se la chiave corso1 esiste
    $piatti[] = 'Antipasto';
    }
    if (isset($_POST['primo'])) { 
    $piatti[] = 'Primo';
    }
    if (isset($_POST['secondo'])) {
    $piatti[] = 'Secondo';
    }
    if(count($piatti)== 0){
        echo"<p style='color:red'>Manca la scelta del piatto</p>";
        echo"<a href='./prenotazione.html'>Torna indietro</a>";
        exit(); //non svolge il resto del codice
    }
    if(count($piatti) == 1 && $piatti[0] == 'Antipasto'){
        echo"<p style='color:red'>Non è possibile ordinare solo l'antipasto</p>";
        echo"<p>Data e ora di prenotazione: ". date("d-m-Y H:i") . "<br>";
        echo"<a href='./prenotazione.html'>Torna indietro</a>";
        exit();  //non svolge il resto del codice
    }
    if($_POST['parcheggio'] == 1){
        
    }
    $camerieri = array("Giuseppe", "Mario", "Michele", "Valerio", "Alessio");
    $indCam = rand(0,4);

    $prezzi = array(5,6,7);
    $tot = 0;
    $npiatti = 0;
    $ps = 0;
    for ($i=0; $i < 3 ; $i++) { 
        if(isset($piatti[$i])){
            $tot += $prezzi[$i];
            $npiatti ++;
            if ($i!=0){
                $ps ++;
            } 
        }
    }

    if($npiatti == 3){
        $prezzoTotPiatti = $tot - 15*$tot/100;
    } elseif ($ps == 2){
        $prezzoTotPiatti = $tot - 10*$tot/100;
    }else{
        $prezzoTotPiatti = $tot;
    }
    $prezzoParcheggio = 0;
    if($_POST['parcheggio'] == 1){
    $prezzoParcheggio += 5;
    $parcheggio = 'Custodito';
    }elseif($_POST['parcheggio'] == 2){
        $prezzoParcheggio += 3;
        $parcheggio = 'Non custodito';
    }elseif($_POST['parcheggio'] == 3){
        $parcheggio = 'Non prenotato';
    }
        
    $prezzoTot = $prezzoTotPiatti + $prezzoParcheggio;
    ?>
    <table>
        <tr>
            <td>Cameriere</td>
            <td><?php echo"$camerieri[$indCam]" ?></td>
        </tr>
        <tr>
            <td>Prenotazione a nome</td>
            <td><?php echo"$nome $cognome" ?></td>
        </tr>
        <tr>
            <td>Numero del tavolo</td>
            <td><?php echo"$numtavolo" ?></td>
        </tr>
        <tr>
            <td>Orario di prenotazione</td>
            <td><?php echo"$orario" ?></td>
        </tr>
        <tr>
            <td>Note</td>
            <td><?php echo"$note" ?></td>
        </tr>
        <tr>
            <td>Piatti</td>
            <td><?php foreach($piatti as $piatto) echo"-$piatto<br>" ?></td>
        </tr>
        <tr>
            <td>Parcheggio</td>
            <td><?php echo"$parcheggio" ?></td>
        </tr>
        <tr>
            <td>Prezzo</td>
            <td><?php echo"$prezzoTot €" ?></td>
        </tr>
    </table>
</body>
</html>