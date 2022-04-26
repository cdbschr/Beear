<?php

namespace Beear\Models\content;

use Beear\Models\Manager;

class ActusModel extends Manager {
  protected int $id;
  protected string $title;
  protected string $content;
  protected string $date;
  protected string $author;
  protected string $image;

  public function __construct(array $data) {
    $this->id = $data['id'];
    $this->title = $data['title'];
    $this->content = $data['content'];
    $this->date = $data['date'];
    $this->author = $data['author'];
    $this->image = $data['image'];
  }

  // -------- Affichage de toutes les actus --------
  public static function getAllActus(): mixed {
    $db = self::dbAccess();

    $req = $db->prepare('SELECT * FROM articles ORDER BY id DESC');
    $req->execute();

    return $req->fetch();
  }

  // -------- Affichage de la dernière actualités en fonction de son ID --------
  public static function getLastArticle(): mixed {
    $db = self::dbAccess();

    $req = $db->prepare('SELECT * FROM articles ORDER BY id DESC LIMIT 1');
    $req->execute();

    return $req->fetch();
  }

  // -------- Création d'une actualité --------
  public static function createActu($data): array {
    $db = self::dbAccess();

    $req = $db->prepare(
      'INSERT INTO 
        articles(
          title, 
          content, 
          `date`, 
          author, 
          `image`
        ) 
      VALUES (:title, :content, :`date`, :author, :`image`)'
    );

    return $req->execute(
      array(
        ':title' => $data['title'],
        ':content' => $data['content'],
        ':date' => $data['date'],
        ':author' => $data['author'],
        ':image' => $data['image']
      )
    );
  }

  // -------- Lecture d'une actualité --------
  public static function getActu($id): array {
    $db = self::dbAccess();

    $req = $db->prepare('SELECT * FROM articles WHERE id = ?');
    $req->execute(array($id));

    return $req->fetch();
  }

  // -------- Mise à jour d'une actualité --------
  public static function updateActu($data): array {
    $db = self::dbAccess();

    $req = $db->prepare(
      'UPDATE articles SET 
        title = :title, 
        content = :content, 
        `date` = :`date`, 
        author = :author, 
        `image` = :`image` 
      WHERE id = :id'
    );

    return $req->execute(
      array(
        ':title' => $data['title'],
        ':content' => $data['content'],
        ':date' => $data['date'],
        ':author' => $data['author'],
        ':image' => $data['image'],
        ':id' => $data['id']
      )
    );
  }

  // -------- Suppression d'une actualité --------
  public static function deleteActu($id): void {
    $db = self::dbAccess();

    $req = $db->prepare('DELETE FROM articles WHERE id = :id');
    $req->execute(array(':id' => $id));
  }

  // -------- Sanitization des informations reçues pour éviter les failles --------
  public function sanitizedData(): mixed {
    return array(
      'title' => htmlspecialchars($this->title),
      'content' => htmlspecialchars($this->content),
      'date' => htmlspecialchars($this->date),
      'author' => htmlspecialchars($this->author),
      'image' => htmlspecialchars($this->image)
    );
  }
}
