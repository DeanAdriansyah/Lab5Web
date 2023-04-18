<?php

include "./requires/form.php";
$database = new Database();
$id =
strpos(@$_REQUEST["url"], "/") ? str_split(@$_REQUEST["url"], strpos(@$_REQUEST["url"], "/") + 1)[1] : @$_REQUEST['url'];

if (isset($_POST['update'])) {
  $data = [
    "nim" => $_POST['txtnim'],
    "nama" => $_POST['txtnama'],
    "kelas" => $_POST['txtkelas']
  ];
  $database->update("tb_mahasiswa", $data, "id=" . $id);
}

$data = $database->get("tb_mahasiswa", "id=" . $id);
if (!$data) {
  header('Location: ../error');
}

echo "<div>";
$form = new Form("", "update");
$form->addField("txtnim", "Nim", $data["nim"]);
$form->addField("txtnama", "Nama", $data["nama"]);
$form->addField("txtkelas", "Kelas", $data["kelas"]);
$form->displayForm();
echo "</div>";