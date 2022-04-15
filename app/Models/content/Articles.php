<?php 

namespace Beear\Models;

Class Articles extends Manager {
  protected $id;
  protected $title;
  protected $content;
  protected $image;
  protected $created_at;

  public function __construct($data) {
    $this->id = $data['id'];
    $this->title = $data['title'];
    $this->content = $data['content'];
    $this->image = $data['image'];
    $this->created_at = $data['created_at'];
  }

  public static function createArticles($image, $post) {
    $db = self::dbAccess();
    $req = $db->prepare('INSERT INTO articles (
      title, 
      content, 
      `image`, 
      created_at) 
      VALUES (:title, :content, :`image`, NOW())');
    $req->execute(array(
      'title' => $post['title'],
      'content' => $post['content'],
      'image' => $image
    ));
  }

  public static function getAllArticles() {
    $db = self::dbAccess();
    $req = $db->prepare('SELECT * FROM articles ORDER BY id DESC');
    $req->execute();
    return $req->fetchAll();
  }

  
}