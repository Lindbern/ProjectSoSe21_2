<?php
Core::checkAccessLevel(1);
$id = $_GET["id"];
$_id=$_POST["_id"];
$Impftermin_a_list = [];
Core::setView("Patient_handle_Impftermin_a", "view1", "list");
Core::setViewScheme("view1", "list", "Impftermin_a");
Impftermin::$activeViewport="detail";
$Impftermin_a_list = Impftermin::findAll();
Core::publish($Impftermin_a_list, "Impftermin_a_list");
Core::publish($id, "id");
$Impftermin = new Impftermin();
Core::publish($Impftermin, "Impftermin");
if (isset($_id)) {
Impftermin::$activeViewport="detail";
$Impftermin->loadDBData($_id);
$Impftermin->_Patient=$id;
$a=$Impftermin->update();
if($a==true){
core::addMessage("Die Beziehung wurde erfolgreich gespeichert");
}else{
core::addError("Die Beziehung konnte leider nicht gespeichert werden");
}
}
