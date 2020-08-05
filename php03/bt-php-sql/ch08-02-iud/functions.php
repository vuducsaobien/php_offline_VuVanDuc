<?php

// CreateInsertSQL
function createInsertSQL($data){
    $newQuery = [];
    $vals = '';
    $cols = '';
    if(!empty($data)){
        foreach($data as $key => $value){
            $cols .= ", `$key`";
            $vals .= ", '$value'";
        }
    }
    $newQuery['cols'] = substr($cols, 2);
    $newQuery['vals'] = substr($vals, 2);
    return $newQuery;
}

// createUpdateSQL
function createUpdateSQL($data){
    $newQuery = "";
    if(!empty($data)){
        foreach($data as $key => $value){
            $newQuery .= ", `$key` = '$value'";
        }
    }
    $newQuery = substr($newQuery, 2);
    return $newQuery;
}

