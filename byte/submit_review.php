<?php

    session_start();
    /*
        file to add a question
    */

    require_once __DIR__ . '/../database/repositories/ReviewRepository.php';
    require_once __DIR__ . '/../database/repositories/UsersRepository.php';

    use repositories\UsersRepository;
    use repositories\ReviewRepository;

    use models\Review;

    $reviewsRepository = new ReviewRepository();
    $userRepository = new UsersRepository();

    $doctor_id= $_POST['doctor_id'] ?? null;;
    $client_id = $_SESSION['id'] ?? null;
    $rating = $_POST['rating'] ?? null;
    $comment = $_POST['comment'] ?? null;
    

    $newReview = new Review($doctor_id, $client_id, $rating, $comment);
    $createdReview = $reviewsRepository->create($newReview);

    header('Location: /byte/doctor.php?id=' . $doctor_id);
?>