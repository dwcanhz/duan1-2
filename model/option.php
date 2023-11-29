<?php 
function add_size_product($size, $product_id)
{
   $sql = "INSERT INTO `option_size`(`id_sp`,`size`) VALUES ('$product_id','$size')";
   return pdo_execute($sql);
}

function getfullSize()
{
   $sql = "SELECT * FROM `option_size`";
   return pdo_query_all($sql);
}

function get_size_ID($id)
{
   $sql = "SELECT * FROM products p, option_size os where p.id=os.id_sp and os.id_sp=$id";
   return pdo_query_all($sql);
}
