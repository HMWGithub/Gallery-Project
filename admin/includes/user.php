<?php
class User extends Db_object {
  protected static $db_table = "users";
  protected static $db_table_fields = array('id', 'username', 'password', 'first_name', 'last_name', 'filename');
  
  public $upload_directory = "images";
  public $id;
  public $username;
  public $password;
  public $first_name;
  public $last_name;
  public $filename;
  public $tmp_path;
  public $image_placeholder = "https://via.placeholder.com/400x400&text=image";
  
  public function picture_path(){
    return $this->upload_directory.DS.$this->filename;
  }
  
  public function image_path_and_placeholder(){
    return empty($this->filename) ? $this->image_placeholder : $this->upload_directory.DS.$this->filename;
  }

  public static function verify_user($username, $password){
    global $database;

    $username = $database->escape_string($username);
    $password = $database->escape_string($password); 

    $sql  = "SELECT * FROM ". self::$db_table ." WHERE ";
    $sql .= "username = '{$username}' AND password = '{$password}' ";
    $sql .= "LIMIT 1";

    $the_result_array = self::find_by_query($sql);

    return !empty($the_result_array) ? array_shift($the_result_array) : false;
  }
}