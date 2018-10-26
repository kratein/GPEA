<?php
    require_once '../modele/api.php';

    function carousel_data() {
        $activities = GetHobbiesObject();
        $count = count($activities);
        $data = array();
        $key = array();
        $cpt = 0;
        while ($cpt < $count || $cpt < 3)
        {
            $alea = rand(0, $count - 1);
            while (in_array($alea, $key)) {
                $alea = rand(0, $count - 1);
            }
            $key[] = $alea;
            $data[] = $activities[$alea];
            unset($activities[$alea]);
            $cpt++;
        }
        return $data;
    }
    
    function carousel_display() {
        $activities = carousel_data();
        if ($activities != null) {
            echo "
            <div id='slides' class='carousel slide' data-ride='carousel'>
            <ul class='carousel-indicators'>
            <li data-target='#slides' data-slide-to='0' class='active'></li>";
            for ($i = 1; $i < count($activities) ; $i++){
                echo "
                <li data-target='#slides' data-slide-to='".$i."'></li>";
            }
            echo "
            </ul>
            <div class='carousel-inner'>
                <div class='carousel-item active'>
                    <div class='row'>
                        <div class='col-md-12'>
                            <img src=".$activities[0]->getCover().">
                            <div class='carousel-caption center'>
                                <h1 class='display-2'>".$activities[0]->getLabel()."</h1>
                                <h3>".$activities[0]->getSlogan()."</h3>
                                <a href='reservation/".$activities[0]->getId()."'><button type='button' class='btn btn-outline-light btn-lg'>Réserver</button></a>
                                <a href='activite/".$activities[0]->getId()."'><button type='button' class='btn btn-primary btn-lg'>Plus d'infos</button></a>
                            </div>
                        </div>
                    </div>
                </div>
            ";
        }
        for ($i = 1; $i < count($activities) ; $i++)
        {
            echo "
            <div class='carousel-item'>
            <img src=".$activities[$i]->getCover().">
                <div class='carousel-caption'>
                    <h1 class='display-2'>".$activities[$i]->getLabel()."</h1>
                    <h3>".$activities[$i]->getSlogan()."</h3>
                    <a href='reservation/".$activities[$i]->getId()."'><button type='button' class='btn btn-outline-light btn-lg'>Réserver</button></a>
                    <a href='activite/".$activities[$i]->getId()."'><button type='button' class='btn btn-primary btn-lg'>Plus d'infos</button></a>
                </div>
            </div>
            ";
        }
        echo "</div></div>";
    }
?>