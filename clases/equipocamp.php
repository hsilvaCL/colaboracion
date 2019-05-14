<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Usuario {

    private $pganados;
    private $pempatados;
    private $pperdidos;
    private $gafavor;
    private $gencontra;
    private $idequipocamp;

    function __construct($pganados, $pempatados, $pperdidos, $gafavor, $gencontra, $idequipocamp) {
        $this->pganados = $pganados;
        $this->pempatados = $pempatados;
        $this->pperdidos = $pperdidos;
        $this->gafavor = $gafavor;
        $this->gencontra = $gencontra;
        $this->idequipocamp = $idequipocamp;
    }

    function getPganados() {
        return $this->pganados;
    }

    function getPempatados() {
        return $this->pempatados;
    }

    function getPperdidos() {
        return $this->pperdidos;
    }

    function getGafavor() {
        return $this->gafavor;
    }

    function getGencontra() {
        return $this->gencontra;
    }

    function getIdequipocamp() {
        return $this->idequipocamp;
    }

    function setPganados($pganados) {
        $this->pganados = $pganados;
    }

    function setPempatados($pempatados) {
        $this->pempatados = $pempatados;
    }

    function setPperdidos($pperdidos) {
        $this->pperdidos = $pperdidos;
    }

    function setGafavor($gafavor) {
        $this->gafavor = $gafavor;
    }

    function setGencontra($gencontra) {
        $this->gencontra = $gencontra;
    }

    function setIdequipocamp($idequipocamp) {
        $this->idequipocamp = $idequipocamp;
    }

    function Insertar() {
        //    ¯\_(ツ)_/¯

        $db = new DBConnect();
        $dblink = $db->conexion();

        if (!isset($dblink)) {
            return false;
        }


        $pdost = $dblink->prepare('insert into equipocamp values(?,?,?,?,?,?,?,?)');
        //   $pdost ->execute(array(?,?,?,?,?,?,?,?));
    }

    function Eliminar() {
        //   ¯\_(ツ)_/¯
        $db = new DBConnect();
        $dblink = $db->conexion();

        if (!isset($dblink)) {
            return false;
        }

        $pdost = $dblink->prepare('delete from equipocamp where idequipo= ?');
        //   $pdost ->execute(array(?));
    }

}
