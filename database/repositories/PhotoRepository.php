<?php

  namespace repositories;

  use models\Photo;

  require_once __DIR__ . '/Repository.php';
  require_once __DIR__ . '/../../models/Photo.php';

  class PhotoRepository extends Repository
  {
    public function __construct()
    {
      parent::__construct('photos');
    }

    public function create(Photo $photo): bool
    {
      return $this->insert([
          "url" => $photo->url,
          "alt" => $photo->alt,
      ]);
    }

    public function getById($id): ?Photo
    {
      $photos = $this->select([
          "id" => $id
      ]);

      if (!$photos) {
        return null;
      }

      return $this->constructPhoto($photos[0]);
    }

    private function constructPhoto($foundPhoto): Photo
    {
      $photo = new Photo(
          $foundPhoto['photo_url'],
          $foundPhoto['alt'],
      );
      $photo->id = $foundPhoto['id'] ?? null;
      return $photo;
    }
  }