<?php
    $arrMenu = [
        'index' => [
            "name"  => "Home ",   "link"  => "index.php"
        ],
        'about' => [
            "name"  => "About ",  
            "link"  => "about.php", 
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

  
    $path = $_SERVER['REQUEST_URI']; 
    echo $menuCurrent    = basename($path, ".php");
    
    
    $arrBreadCrumb  = [];

    foreach($arrMenu as $keyLevelOne => $menuLevelOne){
        $arrBreadCrumb[$keyLevelOne][]  = $menuLevelOne['name'];

        if(isset($menuLevelOne['child'])) {
            
            foreach($menuLevelOne['child'] as $keyLevelTwo => $menuLevelTwo){
                $arrBreadCrumb[$keyLevelTwo][]  = $menuLevelOne['name'];
                $arrBreadCrumb[$keyLevelTwo][]  = $menuLevelTwo['name'];

                if(isset($menuLevelTwo['child'])) {
            
                    foreach($menuLevelTwo['child'] as $keyLevelThree => $menuLevelThree){
                        $arrBreadCrumb[$keyLevelThree][]  = $menuLevelOne['name'];
                        $arrBreadCrumb[$keyLevelThree][]  = $menuLevelTwo['name'];
                        $arrBreadCrumb[$keyLevelThree][]  = $menuLevelThree['name'];
                    }
                }
            }
            
        }
    }


    $currentBreadCrumb = $arrBreadCrumb[$menuCurrent];
  
  