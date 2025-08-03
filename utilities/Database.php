<?php

  class Database {

    private $dsn;
    public $connection;
    public $statement;

    public function __construct($config, $username = 'root', $password = '') {

      $this->dsn = 'mysql:' . http_build_query($config, '', ';');

      try {
        
        $this->connection = new PDO($this->dsn, $username, $password, [
          PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
          PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]);

      } catch (PDOException $error) {

        dd($error->getMessage());

      }

    }


    public function query($query, $params = []) {

      try {
        
        $this->statement = $this->connection->prepare($query);
        $this->statement->execute($params);  
        return $this;

      } catch (PDOException $error) {
        
        dd($error->getMessage());

      }

    }

  }