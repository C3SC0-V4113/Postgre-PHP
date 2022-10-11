<?php
require_once('../models/alumno.model.php');

echo json_encode(Alumno::getByID($_POST['id']));
