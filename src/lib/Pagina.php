<?php

class Pagina{

    protected $tabela = 'paginas';
    private $title;
    private $slug;
    private $description;
    private $body;
    private $author;
    private $insert_date;
    private $update_date;

    /**
     * @param mixed $author
     */
    public function setAuthor($author)
    {
        $this->author = $author;
    }

    /**
     * @return mixed
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * @param mixed $body
     */
    public function setBody($body)
    {
        $this->body = $body;
    }

    /**
     * @return mixed
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $insert_date
     */
    public function setInsertDate($insert_date)
    {
        $this->insert_date = $insert_date;
    }

    /**
     * @return mixed
     */
    public function getInsertDate()
    {
        return $this->insert_date;
    }

    /**
     * @param mixed $slug
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;
    }

    /**
     * @return mixed
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $update_date
     */
    public function setUpdateDate($update_date)
    {
        $this->update_date = $update_date;
    }

    /**
     * @return mixed
     */
    public function getUpdateDate()
    {
        return $this->update_date;
    }

    protected function insert() {
        $db = $this->getDb();
        $query = $db->prepare('Insert into ' . $this->_table . '(title, slug, description, body, author, insert_date, update_date)
            Values(:title, :slug, :description, :body, :author, :insert_date, :update_date)');

        $query->bindValue(':title', $this->getTitle());
        $query->bindValue(':slug', $this->getSlug());
        $query->bindValue(':description', $this->getDescription());
        $query->bindValue(':body', $this->getBody());
        $query->bindValue(':author', $this->getAuthor());
        $query->bindValue(':insert_date', $this->getInsertDate());
        $query->bindValue(':update_date', $this->getUpdateDate());

        return $query->execute();
    }

    protected function update() {
        $db = $this->getDb();
        $query = $db->prepare('Update ' . $this->_table . ' SET title = :title, slug = :slug, description = :description, body = ;body,
                                author = :author, insert_date = :insert_date, update_date = :update_date WHERE id = :id');

        $query->bindValue(':id', $this->getId());
        $query->bindValue(':title', $this->getTitle());
        $query->bindValue(':slug', $this->getSlug());
        $query->bindValue(':description', $this->getDescription());
        $query->bindValue(':body', $this->getBody());
        $query->bindValue(':author', $this->getAuthor());
        $query->bindValue(':insert_date', $this->getInsertDate());
        $query->bindValue(':update_date', $this->getUpdateDate());

        return $query->execute();
    }
	

}