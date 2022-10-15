<?php

function setActive($routeName, $tree = false)
{
    if ($tree) {
        $class = "treeview active";
    }else {
        $class = "active";
    }
    return request()->routeIs($routeName . '*') ? $class : 'link-dark';
}

function setNone($routeName)
{
    $style = "style='display:block;'";
    return request()->routeIs($routeName . '*') ? $style : '';
}
