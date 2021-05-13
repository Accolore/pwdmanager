<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

function sql_date($mydate) {
    $CI =& get_instance();
    $db_date_format = $CI->config->item('db_date_format');
    
    if ( empty($db_date_format) ) $db_date_format = 'Y-m-d';
    
    if( $mydate != NULL && ! empty($mydate) && $mydate != '') {
        $date_only = substr($mydate, 0, 10);
        if ( isdate($date_only, $db_date_format) ) {
            return $date_only;
        } else {
            return date($db_date_format,strtotime(str_replace('/','-',$date_only)));
        }
    } else {
         return NULL;
    }
}

function sql_datetime($mydate) {
    $CI =& get_instance();
    $db_date_format = $CI->config->item('db_date_format');
    if ( empty($db_date_format) ) $db_date_format = 'Y-m-d';

    if( $mydate != NULL && ! empty($mydate) && $mydate != '') {
        if ( isdate(substr($mydate, 0, 10), $db_date_format) ) {
            return $mydate;
        } else {
            $db_date_format .= ' H:i:s';
            // ALTERNATIVO
            //$date = date_create($mydate);
            //return date_format($date, $db_date_format);
            return date($db_date_format,strtotime(str_replace('/','-',$mydate)));
        }   
        } else {
    return NULL;
    }
}

function it_date($mydate, $time=NULL) {
    if( $mydate != NULL && ! empty($mydate) && $mydate != '') {
        if ( isdate(substr($mydate, 0, 10), 'd/m/Y') ) {
            return $mydate;
        } else {
            $date = date_create($mydate);
            if($time) {
                return date_format($date, 'd/m/Y H:i:s');
            } else {
                return date_format($date, 'd/m/Y');
                }
            }
    } else {
        return NULL;
    }
}

function it_time($mydate) {
    if( $mydate != NULL && ! empty($mydate) && $mydate != '') {
        $date = date_create($mydate);
        return date_format($date, 'H:i:s');
    } else {
        return NULL;
    }
}

function isdate($date, $format = 'Y-m-d'){
    $d = DateTime::createFromFormat($format, $date);
    return $d && $d->format($format) == $date;
}

