<?php
    require '_base.php';
    $material_options =[
        ""=>"All Materials",
        "steel" => "Steel",
        'titanium' => "Titanium",
        "OMEGASTEEL" => "OMEGASTEEL"
    ];
    $size_options=[
        ""=>"All Sizes",
        "41"=>"41mm",
        "42"=>"42mm",
        "45.5"=>"45.5mm"
    ];
    $price_options=[
        "low-high"=>"Price: Low-High",
        "high-low"=>"Price: High-Low",
    ];
    $sortOrder = isset($_GET['sort-price']) ? $_GET['sort-price'] : 'low-high';
    $sortColumn = $sortOrder === 'high-low' ? 'DESC' : 'ASC';
    $filterSize = isset($_GET['filter-size']) ? $_GET['filter-size'] : '';
    $filterMaterial = isset($_GET['filter-material']) ? $_GET['filter-material'] : '';
?>