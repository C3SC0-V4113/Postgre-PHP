<?php
require_once('../models/alumno.model.php');
$arrayPost = array('nombre' => $_POST['nombre'], 'apellido' => $_POST['apellido'], 'carnet' => $_POST['carnet'], 'edad' => $_POST['edad'], 'id' => $_POST['id'],);
echo json_encode(Alumno::setData($arrayPost));
