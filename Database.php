<?php 

class Database {

    private $db;

    public function __construct() {
        $this->db = new PDO("sqlite:database.sqlite");
    }

    public function livros() {
        $query = $this->db->query("select * from livros");
        $items = $query->fetchAll();
        return array_map(fn($item) => Livro::make($item), $items);
    }

    public function livro($id = null) {
        $sql = "select * from livros";
        $sql .= " where id = " . $id;
        $query = $this->db->query($sql);
        $items = $query->fetchAll();
        return array_map(fn($item) => Livro::make($item), $items)[0];
    }
}

?>