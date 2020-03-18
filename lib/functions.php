<?php
function show_404(){
    header('HTTP/1.1 404 Not Found', true, 404);
    require('404.php');
    exit();
}
function escape($str) {
    global $linkconnectDB;
    return mysqli_real_escape_string($linkconnectDB,$str);
}
function pagination($url, $page, $total){
    $adjacents = 2;
    $out = '<ul class="pagination pull-right">';
    //first
    if ($page == 1) {
        $out.= '<li class="disabled"><span>Đầu</span></li>';
    } else {
        $out.='<li><a href="'.$url.'">Đầu</a></li>';
    }
    // previous
    if ($page == 1) {
        $out.= '<li class="disabled"><span><i class="fa fa-chevron-left"></i></span></li>';
    } elseif ($page == 2) {
        $out.='<li><a href="'.$url.'"><i class="fa fa-chevron-left"></i></a></li>';
    } else {
        $out.='<li><a href="'.$url.'&amp;page='.($page - 1).'"><i class="fa fa-chevron-left"></i></a></li>';
    }
    $pmin=($page>$adjacents)?($page - $adjacents):1;
    $pmax=($page<($total - $adjacents))?($page + $adjacents):$total;
    for ($i = $pmin; $i <= $pmax; $i++) {
        if ($i == $page) {
            $out.= '<li class="active"><span>'.$i.'</span></li>';
        } elseif ($i == 1) {
            $out.= '<li><a href="'.$url.'">'.$i.'</a></li>';
        } else {
            $out.= '<li><a href="'.$url. "&amp;page=".$i.'">'.$i. '</a></li>';
        }
    }
    // next
    if ($page < $total) {
        $out.= '<li><a href="'.$url.'&amp;page='.($page + 1).'"><i class="fa fa-chevron-right"></i></a></li>';
    } else {
        $out.= '<li class="disabled"><span><i class="fa fa-chevron-right"></i></span></li>';
    }
    //last
    if ($page < $total) {
        $out.= '<li><a href="'.$url.'&amp;page='.$total.'">Cuối</a></li>';
    } else {
        $out.= '<li class="disabled"><span>Cuối</span></li>';
    }

    $out.= '</ul>';
    return $out;
}