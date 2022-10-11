<?php
require_once('../models/alumno.model.php');
echo json_encode(Alumno::deleteData($_POST['id']));
