<?php
require_once '../modele/api.php';

// page 1 => 0-8
// page 2 => 9-17
// page x => (x-1)*9 - x*9-1
function data_page($page)
{
    $start = ($page - 1) * 9;
    $end = $page * 9 - 1;
    $activities = GetHobbiesObject();
    $activitiesCurrent = array();
    if (count($activities) >= $start) {
        for ($i = $start; $i < count($activities) && $i <= $end; $i++) {
            $activitiesCurrent[] = $activities[$i];
        }
    }
    return $activitiesCurrent;
}

// 9 activités par page
function pagination($activitiesCurrent, $page) 
{
    $domain = "http://localhost/GPEA/sources/web/";
    if ($page > 1) {
        $previous = $page - 1;
    }else {
        $previous = $page;
    }
    $next = $page +1;
    echo "<nav aria-label='Page navigation example'>
        <ul class='pagination'>
          <li class='page-item'><a class='page-link' href='".$domain."activites/page/".$previous."'>Précédent</a></li>";
    if ($previous == $page) {
        $page += 1;
        $tmpNext = $page + 1;
        echo"
        <li class='page-item active'><a class='page-link' href='".$domain."activites/page/".$previous."'>".$previous."</a></li>
        <li class='page-item'><a class='page-link' href='".$domain."activites/page/".$page."'>".$page."</a></li>
        <li class='page-item'><a class='page-link' href='".$domain."activites/page/".$tmpNext."'>".$tmpNext."</a></li>"; 
    } else {
        echo"
        <li class='page-item'><a class='page-link' href='".$domain."activites/page/".$previous."'>".$previous."</a></li>
        <li class='page-item active'><a class='page-link' href='".$domain."activites/page/".$page."'>".$page."</a></li>
        <li class='page-item'><a class='page-link' href='".$domain."activites/page/".$next."'>".$next."</a></li>"; 
    }
    echo"
        <li class='page-item'><a class='page-link' href='".$domain."activites/page/".$next."'>Suivant</a></li>
        </ul>
      </nav>";
}
?>