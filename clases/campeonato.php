<?php

class campeonato
{
	private $idcampeonato;
	private $codigo;
	
	private $nombre;
        private $fechainicio;
        private $fechatermino;
        private $cantidadpartidos;
       
        function __construct($idcampeonato, $codigo, $nombre, $fechainicio, $fechatermino, $cantidadpartidos) {
            $this->idcampeonato = $idcampeonato;
            $this->codigo = $codigo;
            $this->nombre = $nombre;
            $this->fechainicio = $fechainicio;
            $this->fechatermino = $fechatermino;
            $this->cantidadpartidos = $cantidadpartidos;
        }

        
        function getIdcampeonato() {
            return $this->idcampeonato;
        }

        function getCodigo() {
            return $this->codigo;
        }

        function getNombre() {
            return $this->nombre;
        }

        function getFechainicio() {
            return $this->fechainicio;
        }

        function getFechatermino() {
            return $this->fechatermino;
        }

        function getCantidadpartidos() {
            return $this->cantidadpartidos;
        }

        function setIdcampeonato($idcampeonato) {
            $this->idcampeonato = $idcampeonato;
        }

        function setCodigo($codigo) {
            $this->codigo = $codigo;
        }

        function setNombre($nombre) {
            $this->nombre = $nombre;
        }

        function setFechainicio($fechainicio) {
            $this->fechainicio = $fechainicio;
        }

        function setFechatermino($fechatermino) {
            $this->fechatermino = $fechatermino;
        }

        function setCantidadpartidos($cantidadpartidos) {
            $this->cantidadpartidos = $cantidadpartidos;
        }

                
          

	public static function save($campeonato){
		$db=Db::getConnect();
		//var_dump($campeonato);
		//die();
		

		$insert=$db->prepare('INSERT INTO campeonato VALUES ( :null,:codigo,:nombre,:fechainicio,:fechatermino,:cantidadpartidos)');
		$insert->bindValue('idcampeonato',$campeonato->getIdcampeonato() );
                $insert->bindValue('codigo',$campeonato->getCodigo() );
		$insert->bindValue('nombre',$campeonato->getNombre() );
		$insert->bindValue('fechainicio',$campeonato->getFechainicio() );
                
                $insert->bindValue('fechatermino',$campeonato->getFechatermino() );
                $insert->bindValue('cantidadpartidos',$campeonato->getCantidadpartidos() );
                
                
                
		$insert->execute();
	}

	public static function all(){
		$db=Db::getConnect();
		$listaCampeonato=[];

		$select=$db->query('SELECT * FROM campeonato order by codigo');

		foreach($select->fetchAll() as $campeonato){
			$listaCampeonato[]=new campeonato($campeonato['idcampeonato'],$campeonato['codigo'],$campeonato['nombre'],$campeonato['fechainicio'],$campeonato['fechatermino'],$campeonato['cantidadpartidos']  );
		}
		return $listaCampeonato;
	}

	public static function searchById($codigo){
		$db=Db::getConnect();
		$select=$db->prepare('SELECT * FROM campeonato WHERE codigo=:codigo');
		$select->bindValue('codigo',$codigo);
		$select->execute();

		$campeonatoDb=$select->fetch();


		$campeonato = new campeonato ($campeonatoDb['idcampeonato'],$campeonatoDb['codigo'], $campeonatoDb['nombre'], $campeonatoDb['fechainicio'], $campeonatoDb['fechatermino'], $campeonatoDb['cantidadpartidos'] );
		//var_dump($campeonato);
		//die();
		return $campeonato;

	}

	public static function update($campeonato){
		$db=Db::getConnect();
		$update=$db->prepare('UPDATE campeonato SET idcampeonato=:idcampeonato, codigo=:codigo, nombre=:nombre, fechainicio=:fechainicio, fechatermino=:fechatermino, cantidadpartidos=:cantidadpartidos, WHERE codigo=:codigo');
		
		
                  $update->bindValue('idcampeonato',$campeonato->getIdcampeonato() );
                 $update->bindValue('codigo',$campeonato->getCodigo() );
		$update->bindValue('nombre',$campeonato->getNombre() );
		$update->bindValue('fechainicio',$campeonato->getFechainicio() );
                
                $update->bindValue('fechatermino',$campeonato->getFechatermino() );
                $update->bindValue('cantidadpartidos',$campeonato->getCantidadpartidos() );
                
                 
                 
                 
                 
		$update->execute();
	}

	public static function delete($codigo){
		$db=Db::getConnect();
		$delete=$db->prepare('DELETE  FROM equipo WHERE codigo=:codigo');
		$delete->bindValue('codigo',$codigo);
		$delete->execute();		
	}
}

