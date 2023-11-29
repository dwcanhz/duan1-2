<?php
function get_products_bestseller()
{
    $sql = "select * from sanpham where luotban_sp > 10  ORDER BY luotban_sp DESC LIMIT 10";
    return pdo_query_all($sql);
}

function get_products_by_category($category_id){
    $sql = "select * from sanpham WHERE id_dm = $category_id ORDER BY created_at DESC";
    return pdo_query_all($sql);
}

function get_all_product(){
    $sql = "select * from sanpham ORDER BY created_at DESC";
    return pdo_query_all($sql);
}

function getProductById($id)
{
    $sql = "SELECT * FROM `sanpham` WHERE  id_sp = " . $id;
    return pdo_query_one($sql);
}