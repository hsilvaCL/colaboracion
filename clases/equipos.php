<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Equipos{
    private $idequipo;
    private $codigo;
    private $nombre;
    
    function __construct($idequipo, $codigo, $nombre) {
        $this->idequipo = $idequipo;
        $this->codigo = $codigo;
        $this->nombre = $nombre;
    }

    function getIdequipo() {
        return $this->idequipo;
    }

    function getCodigo() {
        return $this->codigo;
    }

    function getNombre() {
        return $this->nombre;
    }

    function setIdequipo($idequipo) {
        $this->idequipo = $idequipo;
    }

    function setCodigo($codigo) {
        $this->codigo = $codigo;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }
    
    function InsertaDatos(){
        $db= new DBConnect();
        $dblink=$db->conexion();
        
        if (!isset($dblink)){
            return false;
        }
        
        $PDOst=$dblink->prepare('insert into equipo
                                (codigo,nombre) values(?,?)');
        $PDOst->execute(array($this->codigo,$this->nombre));
    }
    
    function EliminaDatos(){
        $db= new DBConnect();
        $dblink=$db->conexion();
        
        if (!isset($dblink)){
            return false;
        }
        
        $PDOst=$dblink->prepare('delete from equipo
                                 where idequipo=?');
        echo $this->idequipo;
        $PDOst->execute(array($this->idequipo,$this->codigo,$this->nombre));
    }


}
