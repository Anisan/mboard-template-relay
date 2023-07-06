<?php

//load template
$json = file_get_contents($folder . '/template.json');
@unlink($folder . '/template.json');
$template = json_decode($json,true);
$template["id"] = $plugin_name;
$template["latest_version"] = $this->version;
$template = json_encode($template);

//install for all
$objects=getObjectsByClass("MBoard");
foreach($objects as $obj) {
    //save template
    sg($obj['TITLE'].".template_".$plugin_name,$template);
    //update mboards
    sg($obj['TITLE'].".version",strval(time())+'000');
    
}



