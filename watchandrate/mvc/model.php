<?php
include '../include/DBhandler.php';

class Model {
    private static $model = null;

    private function __construct() {
    }

    public static function getInstance() {
        if (self::$model == null) {
            self::$model = new Model();
        }
        return self::$model;
    }
    
    function userRegistration($nomeUtente, $password, $email, $dob){
        try{
            $sth = DBHandler::getInstance()->prepare("CALL userRegistration(:nomeUtente, :password, :email, :dob)");
            $sth->bindValue('nomeUtente', $nomeUtente, PDO::PARAM_STR);
            $sth->bindValue('password', $password, PDO::PARAM_STR);
            $sth->bindValue('email', $email, PDO::PARAM_STR);
            $sth->bindValue('dob', $dob, PDO::PARAM_STR);
            $sth->execute();
        } catch (PDOException $e) {
            echo "Registrazione fallita: " . $e->getMessage();
        }
    } 

    function login($nomeUtente){
        try{
            $sth = DBHandler::getInstance()->prepare("CALL login(:nomeUtente)");
            $sth->bindValue('nomeUtente', $nomeUtente, PDO::PARAM_STR);
            $sth->execute();
            return $sth;
        } catch (PDOException $e){
            echo "Login fallito: " . $e->getMessage();
        }
    }

    function viewProfile($idUtente){
        try{
            $sth = DBHandler::getInstance()->prepare("CALL viewProfile(:idUtente)");
            $sth->bindValue('idUtente', $idUtente, PDO::PARAM_STR);
            $sth->execute();
            return $sth;
        }catch (PDOException $e){
            echo "Visualizzazione profilo fallito: " . $e->getMessage();
        }
    }

    function filmExist($nomeFilm){
        try{
            $sth = DBHandler::getInstance()->prepare("CALL filmExist(:nomeFilm)");
            $sth->bindValue('nomeFilm', $nomeFilm, PDO::PARAM_STR);
            $sth->execute();
            $count = $sth->rowCount();
            return $count;
        }catch (PDOException $e){
            echo "Errore: " . $e->getMessage();
        }
    }
    
    function getFilmIdbyName($nomeFilm){
        try{
            $sth = DBHandler::getInstance()->prepare("CALL getFilmIdbyName(:nomeFilm)");
            $sth->bindValue('nomeFilm', $nomeFilm, PDO::PARAM_STR);
            $sth->execute();
            $id= $sth->fetchAll();
            return $id;
        }catch (PDOException $e){
            echo "Errore nel prendere l'id: " . $e->getMessage();
        }
    }

    function publishReview($nomeFilm, $descrizione, $voto, $idUtente){
        try{
            //controlla se esiste il film, se esiste pubblica recensione, sennò crea il film poi pubblica
            if($this->filmExist($nomeFilm)>0){ 
            $idFilm= $this->filmExist($nomeFilm);
            $sth = DBHandler::getInstance()->prepare("CALL publishReview(:idFilm, :idUtente, :votoRecensione, testoRecensione)");
            $sth->bindValue('idFilm', $idFilm, PDO::PARAM_STR);
            $sth->bindValue('idUtente', $idUtente, PDO::PARAM_STR);
            $sth->bindValue('votoRecensione', $voto, PDO::PARAM_STR);
            $sth->bindValue('testoRecensione', $descrizione, PDO::PARAM_STR);
            $sth->execute();
            }else{
              $this->newFilm($nomeFilm, $descrizione, $voto, $idUtente);
              $idFilm= $this->filmExist($nomeFilm);
              $sth = DBHandler::getInstance()->prepare("CALL publishReview(:idFilm, :idUtente, :votoRecensione, testoRecensione)");
              $sth->bindValue('idFilm', $idFilm, PDO::PARAM_STR);
              $sth->bindValue('idUtente', $idUtente, PDO::PARAM_STR);
              $sth->bindValue('votoRecensione', $voto, PDO::PARAM_STR);
              $sth->bindValue('testoRecensione', $descrizione, PDO::PARAM_STR);
              $sth->execute();
            }
        }catch (PDOException $e){
            echo "Errore nel pubblicare la recensione: " . $e->getMessage();
        }
    }

    function newFilm($nomeFilm, $descrizione, $voto, $idUtente){
        try{
                $sth = DBHandler::getInstance()->prepare("CALL newFilm(:nomeFilm)");
                $sth->bindValue('nomeFilm', $nomeFilm, PDO::PARAM_STR);
                $sth->execute();
        }catch (PDOException $e){
            echo "Inserimento film fallito: " . $e->getMessage();
        }
    

    //NON UTILIZZATA
    function getUserId($nomeUtente){
        try{
            $sth = DBHandler::getInstance()->prepare("CALL getUserId(:nomeUtente)");
            $sth->bindValue('nomeUtente', $nomeUtente, PDO::PARAM_STR);
            $sth->execute();
            return $sth->fetchAll();
        }catch(PDOException $e){
            echo "Ottenimento fallito: " . $e->getMessage();
        }
    }
    //NON UTILIZZATA
    function thereIsUser($nomeUtente){
        $sth = DBHandler::getInstance()->prepare("CALL thereIsUser(:nomeUtente)");
        $sth ->bindValue('nomeUtente', $nomeUtente, PDO::PARAM_STR);        
        $sth->execute();
        $sth->closeCursor();
        return $sth;
        }
    }
}