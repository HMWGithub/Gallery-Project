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

  public function save(){
    if ($this->id) {
      $this->update();
    } else {
      if (!empty($this->errors)){
        return false;
      } elseif (empty($this->filename) || empty($this->tmp_path)){
        $this->errors[] = "The file was not available";
        return false;
      }
      $target_path = SITE_PATH . DS . "admin" . DS . $this->upload_directory . DS . $this->filename;

      if(file_exists($target_path)){
        $this->errors[] = "The file {$this->filename} already exists";
        return false;
      }

      if(move_uploaded_file($this->tmp_path, $target_path)){
        unset($this->tmp_path);
        return true;
      } else {
        $this->errors[] = "What the fuck happened?! Folder permissions must be buggered";
        return false;
      }
    }
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