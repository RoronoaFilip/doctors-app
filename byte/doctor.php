<?php
    require_once __DIR__ . '/../database/repositories/DoctorRepository.php';

    use repositories\DoctorRepository;

    $doctorRepository = new DoctorRepository();

    $id = $_GET['id'];
    $doctor = $doctorRepository->getCurrentDoctor($id);

    $item = '';
    $item .= '<div class="list-item__content">';
    $item .= '<img class="doctor-photo" src="' . $doctor->profilePicture->url . '" alt="profile picture">';
    $item .= '<div class="doctor-info">';
    $item .= '<h3>' . $doctor->firstName . ' ' . $doctor->lastName . '</h3>';
    $item .= '<p> Специалност: ' . $doctor->specialty . '</p>';
    $item .= '<p> Образование: ' . $doctor->education . '</p>';
    $item .= '</div>';
    $item .= '</div>';

    echo '<section class="list">';
    echo $item;
    echo '</section>';
?>