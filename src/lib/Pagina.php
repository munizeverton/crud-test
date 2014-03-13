<?php

    /**
     * @author My Name
     * @author My Name <my.name@example.com>
     */
class Pagina extends  Db_Model{

    protected $table = 'paginas';
    private $title;
    private $url;
    private $slug;
    private $description;
    private $body;
    private $author;
    private $insert_date;
    private $update_date;

    public function __construct(Db_Connection $Connection)
    {
        $this->Connection = $Connection;
    }

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
     * @param mixed $url
     */
    public function setUrl($url)
    {
        $this->url = $url;
        $this->setSlug($url);
    }

    /**
     * @return mixed
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param mixed $slug
     */
    public function setSlug($slug)
    {
        $this->slug = $this->geraSlug($slug);
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

    public function insert() {
        $db = $this->getDb($this->Connection);
        $query = $db->prepare('Insert into ' . $this->table . ' (title, url, slug, description, body, author, insert_date, update_date)
            Values(:title, :url, :slug, :description, :body, :author, NOW(), NOW())');

        $query->bindValue(':title', $this->getTitle());
        $query->bindValue(':url', $this->getUrl());
        $query->bindValue(':slug', $this->getSlug());
        $query->bindValue(':description', $this->getDescription());
        $query->bindValue(':body', $this->getBody());
        $query->bindValue(':author', $this->getAuthor());

        return $query->execute();
    }

    public function update() {
        $db = $this->getDb($this->Connection);
        $db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );
        $query = $db->prepare('Update ' . $this->table . ' SET title = :title, url = :url, slug = :slug, description = :description, body = :body,
                                author = :author, update_date = NOW() WHERE id = :id');

        $query->bindValue(':id', $this->getId());
        $query->bindValue(':title', $this->getTitle());
        $query->bindValue(':url', $this->getUrl());
        $query->bindValue(':slug', $this->getSlug());
        $query->bindValue(':description', $this->getDescription());
        $query->bindValue(':body', $this->getBody());
        $query->bindValue(':author', $this->getAuthor());

        return $query->execute();
    }

    public function geraSlug($string){

        $string = strtolower($string);

        // Código ASCII das vogais
        $ascii['a'] = range(224, 230);
        $ascii['e'] = range(232, 235);
        $ascii['i'] = range(236, 239);
        $ascii['o'] = array_merge(range(242, 246), array(240, 248));
        $ascii['u'] = range(249, 252);

        // Código ASCII dos outros caracteres
        $ascii['b'] = array(223);
        $ascii['c'] = array(231);
        $ascii['d'] = array(208);
        $ascii['n'] = array(241);
        $ascii['y'] = array(253, 255);

        foreach ($ascii as $key=>$item) {
            $acentos = '';
            foreach ($item AS $codigo) $acentos .= chr($codigo);
            $troca[$key] = '/['.$acentos.']/i';
        }

        $string = preg_replace(array_values($troca), array_keys($troca), $string);
        $string = preg_replace('/[^a-z0-9]/i', '-', $string);
        $string = preg_replace('/' . '-' . '{2,}/i', '-', $string);
        $string = trim($string, '-');

        return $string;

    }
	

}