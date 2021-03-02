<?php
    include("config.php");
    include("class/Tentacule.php");

    $crawled = array();
    $crawling = array();

    function ajouterSite($url,$titre, $description, $motsCles, $auteurs){
        global $connexion;

        $query = $connexion->prepare("INSERT INTO test(url, titre, description, motscles, auteurs) VALUES(:url, :titre, :drescription, :motsCles, :auteurs)");

        $query->bindParam(":url",$url);
        $query->bindParam(":titre",$titre);
        $query->bindParam(":description",$description);
        $query->bindParam(":motsCles",$motsCles);
        $query->bindParam(":auteurs",$auteurs);


        return $query->execute();

    }

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

    function obtenirInfo($url){
        $hmParser = new Tentacule($url);
        $titreTab = $hmParser->obtenirTitre();

        if(sizeof($titreTab) == 0 || $titreTab->item(0) == NULL){
            return;
        }

        $titre = $titreTab->item(0)->nodeValue;
        $titre = str_replace("\n","",$titre);

        if($titre == ""){
            return;
        }

        $description = "";
        $motsCles = "";
        $auteurs = "";

        $metaTab = $hmParser->obtenirMeta();

        foreach($metaTab as $meta){
            if($meta->getAttribute("name") == "description"){
                $description = $meta->getAttribute("content");
            }
            if($meta->getAttribute("name") == "keywords"){
                $motsCles = $meta->getAttribute("content");
            }
            if($meta->getAttribute("name") == "author"){
                $auteurs = $meta->getAttribute("content");
            }
        }

        $description = str_replace("\n", "", $description);
        $motsCles = str_replace("\n", "", $motsCles);
        $auteurs = str_replace("\n", "", $auteurs);

        ajouterSite($url, $titre, $description, $motsCles, $auteurs);
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

                obtenirInfo($href);

            }


        }
        array_shift($crawling);
        foreach($crawling as $site){
            bougerTentacule($site);
        }

        }


    $urlBase = "https://guides.nyu.edu/c.php?g=276589&p=1848819";
    bougerTentacule($urlBase);
?>