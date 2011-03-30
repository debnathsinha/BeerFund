<?php

class DatabaseException extends Exception {

  public function __construct($result) {
    echo "Database exception: ".$result."\n";
  }
}

class Database {

  private $server = "";
  private $user = "";
  private $psswd = "";
  private $db = "";

  private $conn = 0;
  private $query = 0;


  public function __construct($server, $user, $psswd, $db) {
    echo "Constructing database\n";
    $this->server = $server;
    $this->user = $user;
    $this->psswd = $psswd;
    $this->db = $db;
  }

  public function connect() {
    $this->conn = @mysql_connect($this->server, $this->user, $this->psswd, $this->psswd);
    if( !$this->conn ) {
      throw new DatabaseException("Could not connect to server");
      return;
    }

    if(!@mysql_select_db($this->db, $this->conn)) {
      throw new DatabaseException("Could not connect to database");
    }

  }

  public function disconnect() {
    
    if(!mysql_close($this->conn)) {
      throw new DatabaseException("Could not close");
    }
  }

  public function query($query) {
    $this->query = @mysql_query("select * from fb_comment_data", $this->conn);
    $num_affected_rows = @mysql_affected_rows($this->conn);
    echo "Num affected rows ". $num_affected_rows. "\n";
    while( $row = @mysql_fetch_assoc($this->query, MYSQL_BOTH) ) {
      printf("row: %s\n", $row[0]);
    }
    while( $row = @mysql_fetch_assoc($this->query, MYSQL_ASSOC) ) {
      printf("uid: %d data: %s\n", $row["comment_uid"], $row["comment_data"]);
    }
    @mysql_free_result($this->query);
    $this->query = -1;
  }

  public function update($update) {
    echo "Update: ". $update. "\n";
  }

  public function insert($query) {
    mysql_query($query);
  }

}

?>