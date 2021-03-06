<?php

$taskType = "new";
$classSettings =Arzt::$settings;
$access = Core::checkAccessGui($classSettings, $taskType);
Core::$title="Neu: Impftermin";
Core::setView("Impftermin_new", "view1", "new");
Core::setViewScheme("view1", "new", "Impftermin");

if(isset($_GET["chain"])){
    $referrer = $_GET["chain"];
Core::publish($referrer, "referrer");
}
if(isset($_GET["autocomplete"])){
    $autocomplete = 1;
Core::publish($autocomplete, "autocomplete");
}

$Impftermin=new Impftermin();
Impftermin::$activeViewport="new";
Impftermin::renderScript("new","form_Impftermin");

if(count($_POST)>0){
$a= $Impftermin->loadFormData();
if($a===true){
if($Impftermin->create()!="0"){
foreach($_FILES as $filekey => $file){
if($file["name"]!=""){
$Impftermin_field =Impftermin::$dataScheme[$filekey];
switch ($Impftermin_field["type"]){
case "picture":
$Impftermin->updateFile($filekey);
break;
case "file": // Hier müsste noch zwischen Bildern und  Dokumenten unterschieden werden
$parentField=Impftermin::$dataScheme[$Impftermin_field["sysParent"]];
$filetype=$parentField["type"];
switch($filetype){
case "pictureT":
$ordner="images/";
break;
case "fileT":
$ordner="files/";
break;
default:
$ordner="files/";
}
$pfad = $Impftermin_field["sysParent"] . "_path"; // path wird nirgends ausgelesen sondern jetzt einfach mal so definiert
$Impftermin->updateFile($filekey, ["pathDB" => $pfad, "path"=>$ordner]);
break;
default:
}
}
}
$Impftermin=new Impftermin();
if(isset($_POST["back"])){
Core::loadJavascript("includes/js/back.js");
}else{
if ($_POST["registrieren-ng"] != "1"){ 
Core::$view->path["view1"]="views/view.Impftermin_new.php";
}else{
   $task_source = $_GET["task_source"];
   Core::redirect ($task_source);
}}
}else{
Core::addError("Der Datenbankeintrag war nicht erfolgreich"); 
}
}else{
Core::addError("Die Eingegebenen Daten waren nicht korrekt");
}
}
$_Patient = Patient::findAll(Patient::SQL_SELECT_IGNORE_DERIVED);
Core::publish($_Patient, "_Patient");
$_Arzt = Arzt::findAll(Arzt::SQL_SELECT_IGNORE_DERIVED);
Core::publish($_Arzt, "_Arzt");
Core::publish($Impftermin, "Impftermin");
//Enumerationen
