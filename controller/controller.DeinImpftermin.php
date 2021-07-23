<?php
$taskType = "detail";
$classSettings =Patient::$settings;
$access = Core::checkAccessGui($classSettings, $taskType);
Core::publish($access, "access");
Core::$title="Detail: Patient";
Core::setView("DeinImpftermin", "view1", "detail");
Core::setViewScheme("view1", "detail", "Patient");
$Patient_list_2 = Patient::findAll();
Core::publish($Patient_list_2, "Patient_list_2");
$Patient_list=[];
$Patient=new Patient();
Patient::$activeViewport="detail";
$id=$_GET["id"];
$Patient->loadDBData($_GET["id"]);
Core::publish($Patient, "Patient");

$user = new user;

Core::publish(Core::$user, "user");
$gruppe=new GruppeT();
$gruppe->loadDBData(Core::$user->Gruppe);

$roleProfile=new $gruppe->literal();
$roleProfile->loadDBData(Core::$user->roleid);
Core::publish($roleProfile, $gruppe->literal);
$roleProfile::renderScript("edit","form_".$gruppe->literal);
     

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

core::redirect("Patient_detail&id=$roleProfile->id");
