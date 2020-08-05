<?php
            /* IF LOOP */
// $a = 1;
// if($a != 1){
//     echo '$a # 1' . '<br>';
// } echo 'A';

// $a = 2;
// if($a != 1){
//     echo '$a # 1' . '<br>';
// } else {
//     echo '$a = 1' . '<br>';
// } echo 'B';

// function createInsertSQL($data){
//     $newQuery = [];
//     $vals = '';
//     $cols = '';
//     if(!empty($data)){
//         foreach($data as $key => $value){
//             $cols .= ", `$key`";
//             $vals .= ", '$value'";
//         }
//     }
//     $newQuery['cols'] = substr($cols, 2);
//     $newQuery['vals'] = substr($vals, 2);
//     return $newQuery;
// }

// public function createWhereUpdateSQL($data){
//     $newWhere = [];
//     if(!empty($data)){
//         foreach($data as $value){
//             if (isset($value[0]) && isset($value[1]) && !empty($value[0]) && !empty($value[1] )) {
//                 $newWhere[] = "`$value[0]` = '$value[1]'";
//                 if (isset($value[2]) && !empty($value[2] )) {
//                     $newWhere[] = $value[2];
//                 }
//             }
//         }
//         $newWhere = implode(" ", $newWhere);
//     }
//     return $newWhere;
// }

// $status	= ($item['status']==0) ? 'Inactive' : 'Active';

// $abc = 's';
// $abc = 'abc';
// $abc ?? 'tyu';
// echo $abc;

$outValidate['group_id'] ?? '';