<?php

namespace models;

use DateTime;

class Review
{
    public int $id;
    public int $doctor_id; 
    public int $client_id;
    public int $rating;
    public string $comment;
    public DateTime $created_at;

    public function __construct($id, $doctor_id, $client_id, $rating, $comment, $created_at)
    {
        $this->id = $id;
        $this->doctor_id = $doctor_id;
        $this->client_id = $client_id;
        $this->rating = $rating;
        $this->comment = $comment;
        $this->created_at = $created_at;
    }
}

