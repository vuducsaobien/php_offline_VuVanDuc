<?php
    $arrMenu = [
        'index' => [
            "name"  => "Home",   "link"  => "index.php"
        ],
        'about' => [
            "name"  => "About",  
            "link"  => "data/about.php", 
            "child" => [
                'service'   => [ 
                    "name"  => "Service", 
                    "link"  => "service.php",
                    "child" => [
                        'sale'      => ["name" => "Sale", "link" => "sale.php"],
                        'training'  => ["name" => "Training", "link" => "training.php"]
                    ]
                ], 
                'company'   => [
                    "name" => "Company", 
                    "link" => "company.php",
                    "child" => [
                        'toyota' => ["name" => "Toyota","link"   => "toyota.php"]
                    ]]
        ]],
        'contact' => ["name" => "Contact", "link" => "contact.php"]
    ];

    // Yêu cầu: In ra tên của các menu cấp 3
    // Output: Sale Training Toyota

    foreach ( $arrMenu as $keyMenuLV1 => $valueMenuLV1) {
        if (isset ($valueMenuLV1["child"] )) {
            foreach ($valueMenuLV1["child"] as $keyMenuLV2 => $valueMenuLV2 ) {
                if (isset($valueMenuLV2["child"])) {
                    foreach ($valueMenuLV2["child"] as $keyMenuLV3 => $valueMenuLV3 ) {
                        echo $valueMenuLV3["name"] . " - ";
                    }
                }

                
            }
        }
    }