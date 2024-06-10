<?php

namespace repositories;

use models\Review;

require_once __DIR__ . '/UsersRepository.php';
require_once __DIR__ . '/../../models/User.php';
// should this below be here?
require_once __DIR__ . '/Repository.php'; 
require_once __DIR__ . '/../../models/Review.php';


class ReviewRepository extends Repository
{
    public function __construct()
    {
        parent::__construct('reviews');
        $this->usersRepository = new UsersRepository();
    }


    public function create(Review $review): ?Review
    {
        $result = $this->insert([
          'doctor_id'=> $review->doctor_id,
          'client_id' => $review->client_id,
          'rating'=> $review->rating,
          'comment' => $review->comment
        ]); 
        if (!$result) {
            return false;
        }
        return $this->getById($this->getLastInsertId());
    }

    private function constructReview($foundReview): ?Review
    {
      $review = new Review(
          $foundReview['doctor_id'],
          $foundReview['client_id'],
          $foundReview['rating'],
          $foundReview['comment']
      );
      $review->id = $foundReview['id'] ?? null;

      return $review;
    }

    public function getById($id): ?Review
    {
      $reviews = $this->select([
          "id" => $id
      ]);

      if (!$reviews) {
        return null;
      }

      return $this->constructReview($reviews[0]);
    }

    public function getReviews($doctorId): ?array
    {   
        $reviewsForDoctor = $this->select([
            'doctor_id' => $doctorId
        ]);
  
        $reviews = [];

        if(!$reviewsForDoctor) {
            return null;
        }

        foreach ($reviewsForDoctor as $review_for_doctor) {
          $reviews[] = $this->constructReview($review_for_doctor);
        }
  
        return $reviews;
    }

    public function getReviewById($reviewId): ?Review
    {
        $reviews = $this->select([
          'id' => $reviewId
        ]);

        if(!$reviews) {
            return null;
        }

        return $this->constructReview($reviews[0]);
    }

    //add review
    /*public function addReview(Review $review): bool
    {
        return $this->insert([
            'doctor_id' => $review->doctor_id,
            'client_id' => $review->client_id,
            'rating' => $review->rating,
            'comment' => $review->comment,
            'created_at' => $review->created_at
        ]);
    }*/
}
