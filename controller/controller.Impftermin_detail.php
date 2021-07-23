<?php
$taskType = "detail";
$classSettings =Impftermin::$settings;
$access = Core::checkAccessGui($classSettings, $taskType);
Core::publish($access, "access");
Core::$title="Detail: Impftermin";
Core::setView("Impftermin_detail", "view1", "detail");
Core::setViewScheme("view1", "detail", "Impftermin");
$Impftermin_list_2 = Impftermin::findAll();
Core::publish($Impftermin_list_2, "Impftermin_list_2");
$Impftermin_list=[];
$Impftermin=new Impftermin();
Impftermin::$activeViewport="detail";
$Impftermin->loadDBData($_GET["id"]);
Core::publish($Impftermin, "Impftermin");
//Beziehungen:
//Enumerationen
//to: Patient  :
$Patient=new Patient();
$Patient_list=[];
$Patient_list = $Patient->query(Patient::SQL_SELECT_Impftermin_a, [$Impftermin->_Patient]);
Core::publish($Patient_list, "Patient_list");
Core::publish($Patient, "Patient");
Core::$view->path["view_Patient"]="views/view.Patient_detail_overview.php";
//to: Impfstoff  _a:
$Impfstoff_a=new Impfstoff();
$Impfstoff_a_list=[];
$Impfstoff_a_list = $Impfstoff_a->query(Impfstoff::SQL_SELECT_Impftermin, [$Impftermin->id]);
Core::publish($Impfstoff_a_list, "Impfstoff_a_list");
Core::publish($Impfstoff_a, "Impfstoff_a");
Core::$view->path["view_Impfstoff_a"]="views/view.Impfstoff_a_detail_overview.php";
//to: Arzt  :
$Arzt=new Arzt();
$Arzt_list=[];
$Arzt_list = $Arzt->query(Arzt::SQL_SELECT_Impftermin_b, [$Impftermin->_Arzt]);
Core::publish($Arzt_list, "Arzt_list");
Core::publish($Arzt, "Arzt");
Core::$view->path["view_Arzt"]="views/view.Arzt_detail_overview.php";
