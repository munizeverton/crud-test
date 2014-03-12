<?php

abstract class Db_Model{
	
	protected $id;
	protected $table;

	public function getId(){
		return $this->id;
	}

	public function setId(){
		return $this->id;
	}

	abstract protected function insert();

	abstract protected function update();

    public function fetchAll() {
        $db = $this->getDb();
        $stm = $db->prepare("select * from " . $this->_table);
        $stm->execute();
        return $stm->fetchAll(PDO::FETCH_ASSOC);
    }

    public function find() {
        $db = $this->getDb();
        $stm = $db->prepare("select * from " . $this->_table . ' where id=:id');
        $stm->bindValue(':id', $this->getId());
        $stm->execute();
        return $stm->fetch(PDO::FETCH_ASSOC);
    }

    public function delete() {
        $db = $this->getDb();
        $stm = $db->prepare("delete from " . $this->_table . ' where id=:id');
        $stm->bindValue(':id', $this->getId());
        return $stm->execute();
    }

    public function getDb($Connection) {
        return $Connection;
    }

}