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

    public function updateUserProfilePicture(Photo $photo, $newProfilePictureUrl): bool|Photo|null
    {
      $oldPhoto = $this->getById($photo->id);

      if (!$oldPhoto || $photo->id === 1) {
        $newPhoto = new Photo($newProfilePictureUrl, $photo->alt);
        return $this->create($newPhoto);
      }

      $result = $this->update($oldPhoto->id, [
          "photo_url" => $newProfilePictureUrl,
          "alt" => $oldPhoto->alt,
      ]);

      if (!$result) {
        return false;
      }

      return $this->getById($photo->id);
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

    public function create(Photo $photo): ?Photo
    {
      $result = $this->insert([
          "photo_url" => $photo->url,
          "alt" => $photo->alt,
      ]);

      if (!$result) {
        return null;
      }

      return $this->getById($this->getLastInsertId());
    }
  }
