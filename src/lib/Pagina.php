<?php


/**
 * Classe Pagina
 * @author Everton Muniz <munizeverton@gmail.com>
 * @version 1.0
 * @package CRUD
 */
class Pagina extends Db_Model{

    /**
     * @var string Tabela da entidade correspondente
     * @access protected
     */
    protected $table = 'paginas';

    /**
     * @var string Campo title
     * @access private
     */
    private $title;

    /**
     * @var string Campo url
     * @access private
     */
    private $url;

    /**
     * @var string Campo slug
     * @access private
     */
    private $slug;

    /**
     * @var string Campo description
     * @access private
     */
    private $description;

    /**
     * @var string Campo body
     * @access private
     */
    private $body;

    /**
     * @var string Campo author
     * @access private
     */
    private $author;

    /**
     * @var datetime Campo insert_date
     * @access private
     */
    private $insert_date;

    /**
     * @var datetime Campo update_date
     * @access private
     */
    private $update_date;

    /**
     * Construtor
     * Recebe por injection uma instancia da classe Db_Connection
     *
     * @param Db_Connection $Connection
     */
    public function __construct(Db_Connection $Connection)
    {
        $this->Connection = $Connection;
    }

    /**
     * @param string $author
     */
    public function setAuthor($author)
    {
        $this->author = $author;
    }

    /**
     * @return string
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * @param string $body
     */
    public function setBody($body)
    {
        $this->body = $body;
    }

    /**
     * @return string
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param datetime $insert_date
     */
    public function setInsertDate($insert_date)
    {
        $this->insert_date = $insert_date;
    }

    /**
     * @return datetime
     */
    public function getInsertDate()
    {
        return $this->insert_date;
    }

    /**
     * @param string $url
     */
    public function setUrl($url)
    {
        $this->url = $url;
        $this->setSlug($url);
    }

    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param string $slug
     */
    public function setSlug($slug)
    {
        $this->slug = $this->geraSlug($slug);
    }

    /**
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param datetime $update_date
     */
    public function setUpdateDate($update_date)
    {
        $this->update_date = $update_date;
    }

    /**
     * @return datetime
     */
    public function getUpdateDate()
    {
        return $this->update_date;
    }

    /**
     * Persiste os dados do objeto no banco
     *
     * @return bool
     */
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

    /**
     * Atualiza os dados do objeto no banco
     *
     * @return bool
     */
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

    /**
     * Gera um slug apartir de uma url
     *
     * @param $string
     * @return string
     */
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