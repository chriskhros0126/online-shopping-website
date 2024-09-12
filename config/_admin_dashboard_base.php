<?php
    require '_base.php';
    $Alphabeticle_options =[
        "ASC" => "Ascending",
        'DESC' => "Descending"
    ];
    $date_options=[
        "ASC"=>"Newest",
        "DESC"=>"Oldest"
    ];
    $user_options=[
        "Both"=>"Both Users",
        "Member"=>"Member",
        "Admin"=>"Admins"
    ];
    $sortColumn = req('sort-Alphabeticle','ASC');
    $sortDate = req('filter-date','ASC');
    $filterUser = req('filter-user','Member');

