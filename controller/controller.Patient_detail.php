<?php
$taskType = "detail";
$classSettings =Patient::$settings;
$access = Core::checkAccessGui($classSettings, $taskType);
Core::publish($access, "access");
Core::$title="Detail: Patient";

$GType = Core::$user->Gruppe;

if ($GType == "1") {
Core::setView("DeinImpftermin", "view1", "detail");
}else{
Core::setView("Patient_detail", "view1", "detail");
}

Core::setViewScheme("view1", "detail", "Patient");
$Patient_list_2 = Patient::findAll();
Core::publish($Patient_list_2, "Patient_list_2");
$Patient_list=[];
$Patient=new Patient();
Patient::$activeViewport="detail";
$Patient->loadDBData($_GET["id"]);
Core::publish($Patient, "Patient");
//Beziehungen:
//Enumerationen
//to: Dokument  _a:

$Dokument_a=new Dokument();
$Dokument_a_list=[];
$Dokument_a_list = $Dokument_a->query(Dokument::SQL_SELECT_Patient, [$Patient->id]);
Core::publish($Dokument_a_list, "Dokument_a_list");
Core::publish($Dokument_a, "Dokument_a");
Core::$view->path["view_Dokument_a"]="views/view.Dokument_a_detail_overview.php";
//to: Impftermin  _a:

$Impftermin_a=new Impftermin();
$Impftermin_a_list=[];
$Impftermin_a_list = $Impftermin_a->query(Impftermin::SQL_SELECT_Patient, [$Patient->id]);
Core::publish($Impftermin_a_list, "Impftermin_a_list");
Core::publish($Impftermin_a, "Impftermin_a");
Core::$view->path["view_Impftermin_a"]="views/view.Impftermin_a_detail_overview.php";
