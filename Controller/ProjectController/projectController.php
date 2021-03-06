<?php
    include_once('../../Models/Transaction/connexion.php');
    include_once('../../Models/Entity/project.php');
    include_once('../../Models/Transaction/projectTransaction.php');

    class ProjectController{
        private $_bdd;
        private $_con;

        public function __construct(){
            $this->_con= new Connexion();
            $this->_bdd= $this->_con->connectDb();
        }

        public function addProject($title, $descri, $statut, $datel, $user){
            $project= new Project();
            $bdd= $this->_bdd;
            $projectT = new ProjectTransaction($bdd);
            $project->setTitle($title);
            $project->setDescri($descri);
            $project->setStatus($statut);
            $project->setDeadline($datel);
            $project->setUser($user);
            $projectT->addProject($project);
            $success=1;
            return $success;
        }

        public function getAllProject($user){
            $bdd= $this->_bdd;
            $projectT= new ProjectTransaction($bdd);
            $donnes= $projectT->getAllProject($user);
            return $donnes;
        }

        public function getProjectById($id){
            $bdd= $this->_bdd;
            $projectT= new ProjectTransaction($bdd);
            $donnes= $projectT->getProjectById($id);
            return $donnes;
        }
    }
?>