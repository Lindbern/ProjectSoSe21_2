<?php
Core::checkAccessLevel(1);
$id = $_GET["id"];
$_id=$_POST["_id"];
$Patient_list = [];
Core::setView("Impftermin_handle_Patient", "view1", "list");
Core::setViewScheme("view1", "list", "Patient");
$Patient= new Patient();
$Impftermin = new Impftermin();
Patient::$activeViewport="detail";
$Patient_list = Patient::findAll();
Core::publish($Patient, "Patient");
Core::publish($Patient_list, "Patient_list");
Core::publish($id, "id");
if (isset($_id)) {
Impftermin::$activeViewport="detail";
$Impftermin->loadDBData($id);
$Impftermin->_Patient=$_id;
$a=$Impftermin->update();
if($a==true){
core::addMessage("Die Beziehung wurde erfolgreich gespeichert");
core::redirect("Impftermin_detail&id=".$id);
}else{
core::addError("Die Beziehung konnte leider nicht gespeichert werden");
}
}
