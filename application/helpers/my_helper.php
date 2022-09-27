<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('GenerateDataAlert')){
    function GenerateDataAlert($status,$message){
        switch($status){
            case "success":
                $alert = array(
                    'class' => 'alert alert-success dark alert-dismissible fade show',
                    'icon' => 'fa fa-check',
                    'message' => "<strong>Success!</strong> $message"
                );
                break;
            case 'failed':
                $alert = array(
                    'class' => 'alert alert-danger dark alert-dismissible fade show',
                    'icon' => 'fa fa-warning',
                    'message' => "<strong>Failed!</strong> $message"
                );
                break;
            case 'oops':
                $alert = array(
                    'class' => 'alert alert-danger dark alert-dismissible fade show',
                    'icon' => 'fa fa-warning',
                    'message' => "<strong>Oops!</strong> $message"
                );
                break;
        }
        return $alert;
    }
}
if ( ! function_exists('GetRomawi')){
    function GetRomawi($mon){
		switch($mon){
			case '01': $ret = 'I'; break;
			case '02': $ret = 'II'; break;
			case '03': $ret = 'III'; break;
            case '04': $ret = 'IV'; break;
            case '05': $ret = 'V'; break;
            case '06': $ret = 'Vi'; break;
            case '07': $ret = 'VII'; break;
			case '08': $ret = 'VIII'; break;
			case '09': $ret = 'IX'; break;
			case '10': $ret = 'X'; break;
			case '11': $ret = 'XI'; break;
			case '12': $ret = 'XII'; break;
		}
		return $ret;
	}
}
