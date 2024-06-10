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

    public function __construct($doctor_id, $client_id, $rating, $comment)
    {
        $this->doctor_id = $doctor_id;
        $this->client_id = $client_id;
        $this->rating = $rating;
        $this->comment = $comment;
    }
}

