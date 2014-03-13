<?php

abstract class Db_Model{

    protected $id;
	protected $table;

	public function getId(){
		return $this->id;
	}

	public function setId($id){
		$this->id = $id;
	}

	abstract protected function insert();

	abstract protected function update();

    public function fetchAll() {
        $db = $this->getDb($this->Connection);
        $query = $db->prepare("select * from " . $this->table);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function find() {
        $db = $this->getDb($this->Connection);
        $query = $db->prepare("select * from " . $this->table . ' where id=:id');
        $query->bindValue(':id', $this->getId());
        $query->execute();
        return $query->fetch(PDO::FETCH_ASSOC);
    }

    public function delete() {
        $db = $this->getDb($this->Connection);
        $query = $db->prepare("delete from " . $this->table . ' where id = :id');
        var_dump($query);
        echo $this->getId();
        $query->bindValue(':id', $this->getId());
        return $query->execute();
    }

    public function getDb($Connection) {
        global $config;
        return $Connection->connect($config);
    }

}