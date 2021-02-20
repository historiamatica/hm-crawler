<?php
    include("class/Tentacule.php");

    $crawled = array();
    $crawling = array();

    function creationLien($href, $url){
        $protocole = parse_url($url)["scheme"];
        $domaine = parse_url($url)["host"];

        if(substr($href, 0, 2) == "//"){
            $href = $protocole . ":" . $href;
        }else if(substr($href, 0 ,1)=="/"){
            $href = $protocole . "://" . $domaine . $href;
        }

        return $href;
    }

    function bougerTentacule($url){
        global $crawled;
        global $crawling;

        $hmParser = new Tentacule($url);
        $listeURL = $hmParser -> obtenirLiens();
        foreach ($listeURL as $lien){
            $href = $lien->getAttribute("href");

            if(strpos($href, "#") !== false){
                continue;
            }else if(substr($href, 0, 11) == "javascript:"){
                continue;
            }

            $href = creationLien($href, $url);

            if(!in_array($href, $crawled)){
                $crawled[] = $href;
                $crawling[] = $href;
            }


            echo $href."<br>";
        }
        array_shift($crawling);
        foreach($crawling as $site){
            bougerTentacule($site);
        }

        }


    $urlBase = "https://guides.nyu.edu/c.php?g=276589&p=1848819";
    bougerTentacule($urlBase);
?>