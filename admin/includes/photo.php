<?php

class Photo extends Db_object{
  protected static $db_table = "photos";
  protected static $db_table_fields = array('id', 'title', 'caption', 'description', 'filename', 'altText', 'type', 'size');
  
  public $upload_directory = "images";
  public $id;
  public $title;
  public $caption;
  public $description;
  public $filename;
  public $altText;
  public $type;
  public $size;
  public $tmp_path;

  public function picture_path(){
    return $this->upload_directory.DS.$this->filename;
  }

  public function delete_photo(){
    if($this->delete()){
      $target_path = SITE_PATH . DS . 'admin' . DS . $this->picture_path();
    
      return unlink($target_path) ? true : false;
    } else {
      return false;
    }
  }
}
?>