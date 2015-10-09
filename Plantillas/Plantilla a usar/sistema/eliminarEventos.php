<?php 

        // file: delete.php
    require("../conexion.php");
    $id = $_GET['id'];
    $result=mysqli_query($conn, "SELECT imagen FROM eventos WHERE id_eventos =".$_GET['id']);
    $row = mysqli_fetch_array($result);
    unlink("imagenesEventos/".$row['imagen']);
    @mysqli_query($conn, "DELETE FROM eventos WHERE id_eventos =".$_GET['id']);
    header("location:vereventos.php");
 ?>