<?php $klasse = Core::$view->Impftermin; 
$access=Core::import("access");
$Favoriten=new Favoriten();
$icon=$Favoriten->find_task("Impftermin_detail",$_SESSION['uid']);
if ($icon =="plus"){
$hover = "hinzufügen";
}else{
$hover = "entfernen";
}
$Impftermin_list_2 = Core::$view->Impftermin_list_2 ; ?>
<h3 class="ui-bar ui-bar-b ui-corner-all ">
<a href="?task=Impftermin" data-ajax="false" class="ui-btn ui-icon-back ui-btn-icon-notext ui-corner-all ui-btn-inline" align="right">back</a>
<?php if(Core::$user->Gruppe > 3){ if($access["edit"] == "true"){ ?>
<a href="?task=Impftermin_edit&id=<?=$klasse->id?>&task_source=Impftermin_detail" data-ajax="false" data-role="button"  class="ui-btn ui-icon-pencil ui-btn-icon-notext   ui-corner-all ui-btn-inline">edit</a>
<?php }} ?>
<?php if(Core::$user->Gruppe > 3){if($access["delete"] == "true"){ ?>
<a href="?task=Impftermin_delete&id=<?=$klasse->id?>" data-ajax="false" data-role="button"  class="ui-btn ui-icon-delete ui-btn-icon-notext ui-corner-all ui-btn-inline">delete</a>
<?php }} ?>

 Impftermin

<?php if(Core::$user->Gruppe >0){ ?>
<div class="tooltip_hs">
<a href="?task=favoriten&db_task=Impftermin_detail&icon=<?=$icon?>&id=<?=$klasse->id?>" class="ui-nodisc-icon ui-alt-icon" data-ajax="false" data-role="button" data-icon="<?=$icon?>" data-iconpos="notext" data-theme="b" data-inline="true"></a>
<span style="font-size: 15px" class="tooltiptext">Favorit <?=$hover?></span>
</div>
<?php } ?>

</h3>
<div class="ui-body ui-body-a ui-corner-all">
<div class="ui-field-contain">
<?php
$klasse->renderLabel("id");
$klasse->render("id");
$klasse->renderLabel("c_ts");
$klasse->render("c_ts");
$klasse->renderLabel("m_ts");
$klasse->render("m_ts");
$klasse->renderLabel("Termin");
$klasse->render("Termin");
$klasse->renderLabel("Aussage");
$klasse->render("Aussage");
$klasse->renderLabel("Ausführung");
$klasse->render("Ausführung");
$klasse->renderLabel("Impfbericht");
$klasse->render("Impfbericht");
$klasse->renderLabel("_Patient");
$klasse->render("_Patient");
$klasse->renderLabel("_Arzt");
$klasse->render("_Arzt");
?>
</div>
</div><br><br>
<?php if($access["relations"] == "true"){ ?>
<h3 class="ui-bar ui-bar-b ui-corner-all">Beziehungen</h3>
<div class="ui-body ui-body-a ui-corner-all">
<div data-role="tabs" id="tabs" data-theme="a">
<div data-role="navbar" data-theme="a">
<ul>
<li><a href="#1" data-ajax="false">Patient</a></li>
<li><a href="#2" data-ajax="false">Impfstoff</a></li>
<li><a href="#3" data-ajax="false">Arzt</a></li>
</ul>
</div>
<div id="1" class="ui-body-d ui-content">
<div id="view_Patient">
<?php
Core::$view->render("view_Patient");
?>
<form method="post" action="?task=Impftermin_handle_Patient&id=<?=$klasse->id?>" data-ajax="false">

        
<?php if(Core::$user->Gruppe > 3){ ?>
<button type="submit" name="auswählen" id="auswählen" class="ui-btn ui-icon-bullets ui-btn-icon-left">Verbindung wählen</button>
</form>
<a href="?task=Patient_new&Impftermin=<?=$klasse->id?>" data-ajax="false" data-role="button"  class="ui-btn ui-btn-b ui-icon-plus ui-btn-icon-left">Neuanlegen</a>
<?php } ?>

</div>
</div>
<th></th>
<div id="2" class="ui-body-d ui-content">
<div id="viewImpfstoff_a">
<?php
Core::$view->render("view_Impfstoff_a");
?>
<form method="post" action="?task=Impftermin_handle_Impfstoff_a&id=<?=$klasse->id?>" data-ajax="false">
    
<?php if(Core::$user->Gruppe > 3){ ?>
<button type="submit" name="auswählen" id="auswählen" class="ui-btn ui-icon-bullets ui-btn-icon-left">Auswählen</button>
</form>
<a href="?task=Impfstoff_new&Impftermin=<?=$klasse->id?>" data-ajax="false" data-role="button"  class="ui-btn ui-btn-b ui-icon-plus ui-btn-icon-left">Neuanlegen</a>
<?php } ?>

</div>
</div>
<th></th>
<div id="3" class="ui-body-d ui-content">
<div id="view_Arzt">
<?php
Core::$view->render("view_Arzt");
?>
<form method="post" action="?task=Impftermin_handle_Arzt&id=<?=$klasse->id?>" data-ajax="false">
<button type="submit" name="auswählen" id="auswählen" class="ui-btn ui-icon-bullets ui-btn-icon-left">Auswählen</button>
</form>
<a href="?task=Arzt_new&Impftermin=<?=$klasse->id?>" data-ajax="false" data-role="button"  class="ui-btn ui-btn-b ui-icon-plus ui-btn-icon-left">Neuanlegen</a>
</div>
</div>
<th></th>
</div>
</div>
<?php } ?>
