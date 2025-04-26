<?php

class Database
{

    private $db;

    public function __construct($config)
    {
        $this->db = new PDO($this->conexaoBanco($config));
    }

    public function query($query, $class = null, $params = [])
    {
        $prepare = $this->db->query($query);

        if ($class) {
            $prepare->setFetchMode(PDO::FETCH_CLASS, $class);
        }

        $prepare->execute($params);
        return $prepare;
    }

    private function conexaoBanco($config) {
        $driver = $config["driver"];

        if ($driver == "sqlite") {
            $dsn = $config["driver"] . ":" . $config["database"];
        }

        if ($driver == "mysql") {
            unset($config["driver"]);
            $dsn = $driver . ":" . http_build_query($config, "", ";");
        }

        return $dsn;
    }
}

$database = new Database($config["database"]);
