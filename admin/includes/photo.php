<?php

class Photo extends Db_object{
  protected static $db_table = "photos";
  protected static $db_table_fields = array('id', 'title', 'caption', 'description', 'filename', 'altText', 'type', 'size', 'user_id');
  
  public $upload_directory = "images";
  public $id;
  public $title;
  public $caption;
  public $description;
  public $filename;
  public $altText;
  public $type;
  public $size;
  public $user_id;
  public $tmp_path;

  public function picture_path(){
    return $this->upload_directory.DS.$this->filename;
  }

  public function save(){
    if($this->id) {
      $this->update();
    } else {
      if (!empty($this->errors)) {
        return false;
      }
      if (empty($this->filename) || empty($this->tmp_path)) {
        $this->errors[] = "This file was not available";
        return false;
      }

      $target_path = SITE_PATH . DS . 'admin' . DS . $this->upload_directory . DS . $this->filename;

      if (file_exists($target_path)) {
        $this->errors[] = "The file {$this->filename} already exists";
        return false;
      }
      if (move_uploaded_file($this->tmp_path, $target_path)) {
        if ( $this->Create() ) {
          unset($this->tmp_path);
          return true;
        }
      } else{
        $this->errors[] = "The file directory probably does not have permission";
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

  public static function display_sidebar_data($photo_id){
    $photo = Photo::find_by_id($photo_id);

    $output  = "<a class='thumbnail' href='#'><img width='100' src='{$photo->picture_path()}'></a>";
    $output .= "<p>{$photo->filename}</p>";
    $output .= "<p>{$photo->type}</p>";
    $output .= "<p>{$photo->size}</p>";

    echo $output;
  }
}
?>