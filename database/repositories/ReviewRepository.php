<?php

namespace repositories;

require_once __DIR__ . '/Repository.php';
require_once __DIR__ . '/../../models/Review.php';

use models\Review;

class ReviewRepository extends Repository
{
    public function __construct()
    {
        parent::__construct('reviews');
    }


    public function create(Review $review): ?Review
    {
      $this->insert([
          'id' => $review->id,
          'doctor_id'=> $review->doctor_id,
          'client_id' => $review->client_id,
          'rating'=> $review->rating,
          'comment' => $review->comment,
          'created_at'=> $review->created_at
      ]);
      
      return $review;
    }

    //construct review
    //add review
    public function addReview(Review $review): bool
    {
        return $this->insert([
            'doctor_id' => $review->doctor_id,
            'client_id' => $review->client_id,
            'rating' => $review->rating,
            'comment' => $review->comment,
            'created_at' => $review->created_at
        ]);
    }

    //getAllReviews
    public function getReviews($doctor_id): ?array
    {   
        $reviewsForDoctor = $this->select([
            'doctor_id' => $doctor_id
        ]);
  
        $reviews = [];

        if(!$reviewsForDoctor) {
            return null;
        }

        //SHOULD BE question_for_doctor. what is this?
        foreach ($reviewsForDoctor as $question_for_doctor) {
          $reviews[] = $this->construcReview($question_for_doctor);
        }
  
        return $questions;
    }


    ///???????????????
    public function getReviewsByDoctorId($doctorId): array
    {
        $command = 'SELECT * FROM ' . $this->tableName . ' WHERE doctor_id = :doctorId';
        $query = $this->database->getConnection()->prepare($command);
        $query->bindParam(':doctorId', $doctorId, PDO::PARAM_INT);
        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_ASSOC);

        return array_map(function ($row) {
            return new Review($row['id'], $row['doctor_id'], $row['client_id'], $row['rating'], $row['comment'], $row['created_at']);
        }, $results);
    }

    public function addReview(Review $review): bool
    {
        $data = [
            'doctor_id' => $review->doctorId,
            'client_id' => $review->userId,
            'rating' => $review->rating,
            'comment' => $review->comment
        ];
        return $this->insert($data);
    }
}
