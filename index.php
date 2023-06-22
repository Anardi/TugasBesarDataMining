<?php
require 'naive_bayes.php';
$hasil = '';
if(isset($_POST['submit'])){
    $data = [
    "kartu" => $_POST['kartu'],
    "panggilan" => $_POST['panggilan'],
    "blok" => $_POST['blok'],
    ];
    // var_dump($data);
    $hasil = posteriorProbabilty($data);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3>Penentuan Bonus Pelanggan</h3>
    <form action="" method="post">
        <label for="pelanggan"> nama pelanggan</label>
        <input type="text" name="pelanggan" id="pelanggan">

        <label for="kartu">kartu</label>
        <select name="kartu" id="kartu">
            <option></option>
            <option value="prabayar">prabayar</option>
            <option value="pascabayar">pascabayar</option>
        </select>

        <label for="panggilan">panggilan</label>
        <select name="panggilan" id="panggilan">
            <option></option>
            <option value="sedikit">sedikit</option>
            <option value="cukup">cukup</option>
            <option value="sedang">sedang</option>
        </select>
        
        <label for="blok">blok</label>
        <select name="blok" id="blok">
            <option></option>
            <option value="rendah">rendah</option>
            <option value="sedang">sedang</option>
            <option value="tinggi">tinggi</option>
        </select>

        <button type="submit" name="submit"> SUBMIT</button>

        <h5>BONUS : <?= $hasil;?></h5>

    </form>
</body>
</html>