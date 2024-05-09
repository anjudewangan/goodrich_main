<?php

$linkurl = "http://localhost:8080/projects/goodrich/";
$aminlinkurl = "http://localhost:8080/projects/goodrich/admin/";

//--------Check session-------
function session_admincheck($loguid, $logname)
{
    if ($loguid == "" || $logname == "") {
        echo "<script language=javascript>window.location.href='./'</script>";
        exit;
    }
}

//--------Check session-------
function loginsession_usercheck($loguid)
{
    if ($loguid == "") {
        echo "<script language=javascript>window.location.href='./'</script>";
        exit;
    }
}

//--------------------------------------------

function removeBadChars($strWords)
{
    $bad_string = array("select", "drop", "insert", "delete", "xp_", "%20union%20", "/*", "*/union/*", "+union+", "load_file", "outfile", "document.cookie", "onmouse", "<script", "<iframe", "<applet", "<meta", "<style", "<form", "<img", "<body", "<link", "_GLOBALS", "_REQUEST", "_GET", "_POST", "include_path", "prefix", "ftp://", "smb://", "<table", "<?php", "<?", ";", "'", "=");
    for ($i = 0; $i < count($bad_string); $i++) {
        $strWords = str_replace($bad_string[$i], "", $strWords);
    }
    return $strWords;
}

function removePtag($strWords)
{

    $relstr = array('<p class="MsoNormal" style="text-align:justify">', '<p>', '</p>', '<p class="MsoNormal" style="text-align: justify;">', '<o:p></o:p>', '<span', '</span>', '<br>', '<br />', '<font style="color: rgb(0, 0, 0);"><font style="font-size: 12px;">', '</font> </font>');
    $plcstr = array(' ', ' ', '', ' ', ' ', '<font', '</font>', '', '', '', '');
    $msgbody = str_replace($relstr, $plcstr, $strWords);
    return $msgbody;
}

function output_Pfields($feilds)
{
    return removePtag(stripslashes($feilds));
}

function output_fields($feilds)
{
    return trim(strip_tags(removeBadChars(stripslashes($feilds))));
}

function input_fields($feilds)
{
    return trim(strip_tags(removeBadChars(addslashes($feilds))));
}


function PageNumber($pg)
{
    if ($pg == 1) {
        $retPage = 0;
    } else {
        $retPage = $pg * 20 - 20;
    }
    return $retPage;
}


function strip_tags_content($text) {

    return preg_replace('@<(\w+)\b.*?>.*?</\1>@si', '', $text);
    
 }