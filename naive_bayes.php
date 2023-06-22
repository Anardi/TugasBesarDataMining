<?php
require 'koneksi.php';

function totalDataTraining() {
    global $con;
    return (int) mysqli_fetch_row(mysqli_query($con, "SELECT COUNT(*) FROM pelanggan"))[0];
}

function jumlahDataKelas() {
    global $con;
    $query = "SELECT COUNT(*) FROM pelanggan WHERE bonus='";

    $jumlahDataBonus['ya'] = (int) mysqli_fetch_row(mysqli_query($con, $query . "ya'"))[0];
    $jumlahDataBonus['tidak'] = (int) mysqli_fetch_row(mysqli_query($con, $query . "tidak'"))[0];
    
    return $jumlahDataBonus;
}


function priorProbability(){
    $kelas['ya'] = jumlahDataKelas()['ya'] / totalDataTraining();
    $kelas['tidak'] = jumlahDataKelas()['tidak'] / totalDataTraining();
    return $kelas;
    
}

function conditionalProbabilty($nama_kolom, $nilai) {
    global $con; // Ensure $con is a valid database connection

    // Define jumlahDataKelas() function separately

    $query = "SELECT COUNT($nama_kolom) FROM pelanggan WHERE $nama_kolom = '$nilai' AND bonus=";

    $classCounts = jumlahDataKelas();
    $conditionalProbability['ya'] = (int) mysqli_fetch_row(mysqli_query($con, $query . "'ya'"))[0] / $classCounts['ya'];
    $conditionalProbability['tidak'] = (int) mysqli_fetch_row(mysqli_query($con, $query . "'tidak'"))[0] / $classCounts['tidak'];

    return $conditionalProbability;
}

function posteriorProbabilty($data) {
    $atribut['kartu'] = conditionalProbabilty('kartu', $data['kartu']);
    $atribut['panggilan'] = conditionalProbabilty('panggilan', $data['panggilan']);
    $atribut['blok'] = conditionalProbabilty('blok', $data['blok']);

    $probabilitas['ya'] = $atribut['kartu']['ya'] * $atribut['panggilan']['ya'] * $atribut['blok']['ya'] * priorProbability()['ya'];

    $probabilitas['tidak'] = $atribut['kartu']['tidak'] * $atribut['panggilan']['tidak'] * $atribut['blok']['tidak'] * priorProbability()['tidak'];

    if ($probabilitas['ya'] > $probabilitas['tidak']) {
        return 'Ya';
    } else if ($probabilitas['ya'] < $probabilitas['tidak']) {
        return 'Tidak';
    }
}

?>
