<?php

include "./requires/form.php";
$db = new Database();

if (isset($_POST['insert'])) {
  $data = [
    "nim" => $_POST['txtnim'],
    "nama" => $_POST['txtnama'],
    "kelas" => $_POST['txtkelas']
  ];
  $db->insert("tb_mahasiswa", $data);
}

$form = new Form("", "insert");
$form->addField("txtnim", "Nim");
$form->addField("txtnama", "Nama");
$form->addField("txtkelas", "Kelas");
$form->displayForm();