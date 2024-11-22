<?php

/**
 * The goal of this file is to allow developers a location
 * where they can overwrite core procedural functions and
 * replace them with their own. This file is loaded during
 * the bootstrap process and is called during the frameworks
 * execution.
 *
 * This can be looked at as a `master helper` file that is
 * loaded early on, and may also contain additional functions
 * that you'd like to use throughout your entire application
 *
 * @link: https://codeigniter4.github.io/CodeIgniter4/
 */
/*
 * The Function to Ech the <pre> tag for Beautifying Arrays
 */
if (!function_exists('pre')) {

    function pre()
    {
        echo '<pre>';
    }
}

/*
 * The Function to Echo the <pre> tag and the data Provided
 */
if (!function_exists('echoAll')) {

    function echoAll($value, $exit = TRUE)
    {
        echo '<pre>';
        print_r($value);
        if ($exit)
            exit;
    }
}

################################################################################
#   Database Transactions
################################################################################

if (!function_exists('transBegin')) {

    function transBegin(&$db)
    {
        $db->query("SET autocommit = 0");
        $db->query("START TRANSACTION");
    }
}

if (!function_exists('transCommit')) {

    function transCommit(&$db)
    {
        $db->query("COMMIT");
        $db->query("SET autocommit = 1");
    }
}

if (!function_exists('transRollback')) {

    function transRollback(&$db)
    {
        $db->query("ROLLBACK");
        $db->query("SET autocommit = 1");
    }
}

################################################################################
#   JS FUNCTIONS
################################################################################
# Javascript Prevent Back Button
if (!function_exists('AlertPageBackLink')) {

    function AlertPageBackLink()
    {
        return "<script>
                $(document).ready(function() {
                   window.onbeforeunload = function(e){return 'All your Data Will be Lost.';};
                });
             </script>";
    }
}
# Javascript Disable Back Button
if (!function_exists('DisableNextPageBackLink')) {

    function DisableNextPageBackLink()
    {
        return "<script>
                $(document).ready(function() {
                    function noBack(){window.history.forward();};
                    window.onload = noBack();
                    window.onpageshow = function(evt) { if (evt.persisted) noBack() }
                });
             </script>";
    }
}
# Check if a request is Ajax
if (!function_exists('isAjax')) {

    function isAjax()
    {
        //Is an AJAX Call
        if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
            return TRUE;
        }
        //Not an AJAX Call
        return FALSE;
    }
}

# Escape a String for JS in php
if (!function_exists('escapeJS')) {

    function escapeJS($string)
    {
        if (!is_string($string))
            return;

        return preg_replace("/\r?\n/", "\\n", addslashes($string));
    }
}

################################################################################
#   JS Functions
################################################################################

#Reload a page after n seconds
if (!function_exists('ReloadPageJS')) {

    function ReloadPageJS($seconds = '')
    {
        if (empty($seconds) or !is_numeric($seconds))
            $seconds = 20;
        $code = "function reloadPage(timeoutDuration) {setTimeout(function () {if (typeof reload === 'undefined') {location.reload();} else {if (reload == true) {location.reload();}reloadPage(timeoutDuration);}}, timeoutDuration * 1000);}reloadPage(" . $seconds . ");";
        return $code;
    }
}

# Confirm before Page Exit
if (!function_exists('confirmPageExit')) {

    function confirmPageExit()
    {
        return '<script type="text/javascript">var areYouReallySure=!1;function areYouSure(){if(allowPrompt){if(!areYouReallySure)return areYouReallySure=!0,"Are you sure you want to leave? Any unsaved data may be Lost..."}else allowPrompt=!0}var allowPrompt=!0;window.onbeforeunload=areYouSure;</script>';
    }
}

################################################################################
#   Custom Important Functions
################################################################################
#Get the First Key of an Array
if (!function_exists('array_key_first')) {

    function array_key_first(array $arr)
    {
        foreach ($arr as $key => $unused) {
            return $key;
        }
        return NULL;
    }
}

# Function to Check if File Exists
if (!function_exists('fileExists')) {

    function fileExists($fileName, $caseSensitive = false)
    {
        if (file_exists($fileName)) {
            return $fileName;
        }
        if ($caseSensitive)
            return false;

        // Handle case insensitive requests            
        $directoryName = dirname($fileName);
        $fileArray = glob($directoryName . '/*', GLOB_NOSORT);
        $fileNameLowerCase = strtolower($fileName);
        foreach ($fileArray as $file) {
            if (strtolower($file) == $fileNameLowerCase) {
                return $file;
            }
        }
        return false;
    }
}

# Function to get the main domain from Subdomain
if (!function_exists('getbaseDomain')) {

    function getbaseDomain($url, $scheme = TRUE)
    {
        $pieces = parse_url($url);
        $domain = isset($pieces['host']) ? $pieces['host'] : '';
        if (preg_match('/(?P<domain>[a-z0-9][a-z0-9\-]{1,63}\.[a-z\.]{2,6})$/i', $domain, $regs)) {
            return $scheme ? @$pieces['scheme'] . '://' . $regs['domain'] : $regs['domain'];
        }
        return false;
    }
}