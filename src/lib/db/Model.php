<?php
/**
 * Classe abstrata que será extendida pelos models
 * @author Everton Muniz <munizeverton@gmail.com>
 * @version 1.0
 * @package CRUD
 */
abstract class Db_Model{

    /**
    * @var int Id do objeto persistido
    * @access protected
    */
    protected $id;

    /**
     * @var string Tabela da entidade correspondente
     * @access protected
     */
	protected $table;

    /**
     * @return int Id persistente do objeto
     */
    public function getId(){
		return $this->id;
	}

    /**
     * @param $id
     */
    public function setId($id){
		$this->id = $id;
	}

    /**
     * @return mixed
     */
    abstract protected function insert();

    /**
     * @return mixed
     */
    abstract protected function update();

    /**
     * @return array Array com todos os objetos persistidos no banco
     */
    public function fetchAll() {
        $db = $this->getDb($this->Connection);
        $query = $db->prepare("select * from " . $this->table);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * @return array Array com todos os campos do objeto instanciado
     */
    public function find() {
        $db = $this->getDb($this->Connection);
        $query = $db->prepare("select * from " . $this->table . ' where id=:id');
        $query->bindValue(':id', $this->getId());
        $query->execute();
        return $query->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * @return boll
     */
    public function delete() {
        $db = $this->getDb($this->Connection);
        $query = $db->prepare("delete from " . $this->table . ' where id = :id');
        var_dump($query);
        echo $this->getId();
        $query->bindValue(':id', $this->getId());
        return $query->execute();
    }

    /**
     * @param $Connection
     * @return object Retorna a instancia da conexão com o banco
     */
    public function getDb($Connection) {
        global $config;
        return $Connection->connect($config);
    }

}