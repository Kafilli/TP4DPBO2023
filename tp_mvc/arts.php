

<?php

include_once("models/Template.class.php");
include_once("models/DB.class.php");
include_once("controllers/Members.controller.php");
include_once("controllers/Arts.controller.php");
$arts = new ArtsController();

if (isset($_POST['add'])) {
    //memanggil add
    $arts->add($_POST);
}
//mengecek apakah ada id_hapus, jika ada maka memanggil fungsi delete
else if (!empty($_GET['id_hapus_art'])) {
    //memanggil add
    $id = $_GET['id_hapus_art'];
    $arts->delete($id);
} else if (!empty($_GET['id_edit'])) {
    $id = $_GET['id_edit'];
    $arts->indexedit($id);
} else if (isset($_POST['submit'])) {
    $id_edit = $_GET['id'];
    $arts->edit($id_edit, $_POST);
} else {
    $arts->index();
}
