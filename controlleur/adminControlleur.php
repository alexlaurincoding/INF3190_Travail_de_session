<?php

/**
 * Controlleur Admin
 */
function index($params) {
    if(!Session::isConnecte() || !Session::isAdmin()){
        throw new Exception("Accès interdit");
    }
    Vue::render('inscription_admin');
}

function gestionProgramme($params) {
    $infosProgramme = new GestionProgrammeModel();
    Util::setMessage('viewmodel', $infosProgramme);
    Vue::render('gestion_programme');
}

function validFormCreerSession(){
        $valide = true;
        $nomSession = Util::param("nomSession");
        $description = Util::param("descriptionSession");
        $premiereJournee = Util::param("premiereJournee");
        $derniereJournee = Util::param("derniereJournee");

        if(empty($nomSession)){
            Util::setMessage("nomSession", "Veuillez entrer le nom de la session.");
            $valide = false;
        }
        if(empty($description)){
            Util::setMessage("descriptionSession", "Veuillez entrer une description.");
            $valide = false;
        }
        if(empty($premiereJournee)){
            Util::setMessage("premiereJournee", "Veuillez entrer le premier jour.");
            $valide = false;
        }
        if(empty($derniereJournee)){
            Util::setMessage("derniereJournee", "Veuillez entrer le dernier jour.");
            $valide = false;
        }

        return $valide;
}

function creerSession($param){
    $nomSession = Util::param("nomSession");
    $description = Util::param("descriptionSession");
    $premiereJournee = Util::param("premiereJournee");
    $derniereJournee = Util::param("derniereJournee");

    if(!validFormCreerSession()){
        Util::redirectControlleur('admin', 'gestionProgramme', 'creerSessionModal');
    }else{    
        $session = new SessionModel(Util::guidv4(), $nomSession, $description, $premiereJournee, $derniereJournee);
        $session->sauvegarder();
        Util::setMessage('global', "Session créée avec succès");
        Util::redirectControlleur('admin', 'gestionProgramme');
    }
}

function validFormCreerTypeActivite() {
    $valide = true;
    $nomTypeActivite = Util::param("nomTypeActivite");
    $description = Util::param("descriptionTypeActivite");
    if (empty($nomTypeActivite)) {
        Util::setMessage("nomTypeActivite", "Veuillez entrer le type d'activité");
        $valide = false;
    }
    if (empty($description)) {
        Util::setMessage("descriptionTypeActivite", "Veuillez entrer la description de ce type d'activité");
        $valide = false;
    }
    return $valide;
}

function creerTypeActivite() {
    $nomTypeActivite = Util::param("nomTypeActivite");
    $description = Util::param("descriptionTypeActivite");

    if (!validFormCreerTypeActivite()) {
        Util::redirectControlleur('admin', 'gestionProgramme', 'creerTypeModal');
    } else {
        $typeActivite = new TypeActiviteModel(Util::guidv4(), $nomTypeActivite, $description);
        $typeActivite->sauvegarder();
        Util::setMessage('global', "Type d'activité créé avec succès!");
        Util::redirectControlleur('admin', 'gestionProgramme');
    }
}

function validFormCreerActivite() {
    $valide = true;
    $nom = Util::param("nomActivite");
    $type = Util::param('idTypeActivite');
    if (empty($nom)) {
        Util::setMessage("nomActivite", "Veuillez entrer le nom de l'activité");
        $valide = false;
    }
    if (empty($type)) {
        Util::setMessage("idTypeActivite", "Veuillez choisir le type de l'activité");
        $valide = false;
    }
    return $valide;
}

function creerActivite($param) {
    $nom = Util::param("nomActivite");
    $type = Util::param('idTypeActivite');

    if (!validFormCreerActivite()) {
        Util::redirectControlleur('admin', 'gestionProgramme', 'creerActiviteModal');
    } else {
        $activite = new ActiviteModel(Util::guidv4(), $nom, $type);
        $activite->sauvegarder();
        Util::setMessage('global', "Activité créée avec succès!");
        Util::redirectControlleur('admin', 'gestionProgramme');
    }
}

function validFormCreerBlocActivite(){
    $valide = true;
    $nomBlocActivite = Util::param("nomBlocActivite");
    $nbTypesActivite = Util::param("nbTypesActivite");
    $typeActivitesChoisi = array();
    //$activite = Util::param("activiteDubloc");
    for($i = 1; $i <= $nbTypesActivite; $i++){      
        if(!empty(Util::param("typeActivite" . $i))){
            array_push($typeActivitesChoisi, Util::param("typeActivite" . $i));
        }
    }
    if(empty($typeActivitesChoisi)){
        Util::setMessage("typeActiviteBloc", "Veuillez selectionner un type d'activite");
        $valide = false;
    }
    if (empty($nomBlocActivite)) {
        Util::setMessage("nomBlocActivite", "Veuillez entrer le nom du bloc");
        $valide = false;
    }
    
    return $valide;
}

function creerBlocActivite($param){
    $nomBlocActivite = Util::param("nomBlocActivite");
    $nbActivites = Util::param("nbActivites");
    $activitesChoisi = array();
    if (!validFormCreerBlocActivite()) {
        Util::redirectControlleur('admin', 'gestionProgramme', 'creerBlocActiviteModal');
    }else{

        for($i = 1; $i <= $nbActivites+1; $i++){
            if(!empty(Util::param("activite" . $i))){
                array_push($activitesChoisi, GestionProgrammeDAO::getActivite(Util::param("activite" . $i)));
            }           
        }
        $blocActivite = new BlocModel(Util::guidv4(), $nomBlocActivite, $activitesChoisi);
        $blocActivite->sauvegarder();
        Util::setMessage('global', "Bloc d'activité créée avec succès!");
        Util::redirectControlleur('admin', 'gestionProgramme');
    }

}