<?php
    include("class/Tentacule.php");

    function creationLien($from, $to){

    }

    function bougerTentacule($url){
        $hmParser = new Tentacule($url);
        $listeURL = $hmParser -> obtenirLiens();
            foreach ($listeURL as $lien){
                $href = $lien->getAttribute("href");

                if(strpos($href, "#") !== false){
                    continue;
                }else if(substr($href, 0, 11) == "javascript:"){
                    continue;
                }

                echo $href."<br>";
            }
        }


    $urlBase = "https://guides.nyu.edu/c.php?g=276589&p=1848819";
    bougerTentacule($urlBase);
?>