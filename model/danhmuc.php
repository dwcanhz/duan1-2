<?php
function get_full_categoriess()
{
    $sql = "SELECT * FROM danhmuc";
    return pdo_query_all($sql);
}