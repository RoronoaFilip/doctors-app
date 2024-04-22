<?php

  namespace repositories;

  use models\Comment;

  require_once __DIR__ . '/Repository.php';
  require_once __DIR__ . '/RestaurantRepository.php';
  require_once __DIR__ . '/UsersRepository.php';
  require_once __DIR__ . '/../../models/Comment.php';

  class CommentRepository extends Repository
  {
    private RestaurantRepository $restaurantRepository;

    private UsersRepository $userRepository;


    public function __construct()
    {
      parent::__construct('comments');
      $this->restaurantRepository = new RestaurantRepository();
      $this->userRepository = new UserRepository();
    }

    public function create(Comment $comment): bool|Comment
    {
      $result = $this->insert([
        "id" => $comment->id,
        "restaurant_id" => $comment->restaurant_id,
        "user_id" => $comment->user_id,
        "comment" => $comment->comment
      ]);

      if (!$result) {
        return false;
      }

      return $this->getById($this->getLastInsertId());
    }

    public function getById($id): ?Comment
    {
      $comments = $this->select([
          "id" => $id
      ]);

      if (!$comments) {
        return null;
      }

      return $this->constructComment($comments[0]);
    }

    private function constructComment($newComment): Restaurant
    {
        $comment = new Comment(
            $newComment['restaurant_id'],
            $newComment['user_id'],
            $newComment['comment'],
        );

        $comment->id = $newComment['id'] ?? null;
        $comment->restaurant_id = $newComment['restaurant_id'];
        $comment->user_id = $newComment['user_id'];
        $comment->comment = $newComment['comment'] ?? '';

        return $comment;
    }
  }
