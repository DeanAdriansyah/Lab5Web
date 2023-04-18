<?php
$id = strpos(@$_REQUEST["url"], "/") ? str_split(@$_REQUEST["url"], strpos(@$_REQUEST["url"], "/") + 1)[1] : @$_REQUEST['url'];
$db = new Database();
$db->delete('tb_mahasiswa', 'id=' . $id);
header('Location: ../home');