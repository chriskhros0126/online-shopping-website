<?php
    require '_base.php';

    if(is_get()){
        $watch_id = req('watch_id');
        $stmt = $pdo->prepare("SELECT *
            FROM watches w 
            JOIN categories c ON w.category_id = c.category_id 
            WHERE w.watch_id = ?");
        $stmt->execute([$watch_id]);
        $result = $stmt->fetch();
        if ($result) {
            $sub_model = $result["sub_model"];
            $size = $result["size"];
            $material = $result["material"];
            $strap = $result["strap"];
            $price = $result["price"];
            $description = $result["description"];
            $category_name = $result["category_name"];
            $imagePath = $result['image_path'];
        } 
    }