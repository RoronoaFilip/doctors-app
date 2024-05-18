<?php
require_once 'shared/head.php';
require_once 'shared/header.php';
require_once __DIR__ . '/../database/repositories/DoctorRepository.php';

use repositories\DoctorRepository;

$doctorRepository = new DoctorRepository();
$doctors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = isset($_POST['name']) ? trim($_POST['name']) : '';
    $specialty = isset($_POST['specialty']) ? trim($_POST['specialty']) : '';

    if ($name && $specialty) {
        $doctors = $doctorRepository->searchByNameAndSpecialty($name, $specialty);
    } elseif ($name) {
        $doctors = $doctorRepository->searchByName($name);
    } elseif ($specialty) {
        $doctors = $doctorRepository->searchBySpecialty($specialty);
    }
} else {
    $doctors = $doctorRepository->getAllDoctors();
}
?>

<!DOCTYPE html>
<html lang="bg">
<head>
    <title>Регистрация</title>
    <link rel="stylesheet" href="/public/styles/doctors.css">
    <script defer src="/public/js/register.js"></script>
</head>
<body>

<section class="doctors-list-container">
    <h1 class="page-title mt-4">Списък с всички лекари:</h1>

    <section class="search-bar">
        <form class="search-form" method="POST" action="/byte/doctors.php">
            <input type="text" class="form-control" name="name" placeholder="Търсене по име">
            <input type="text" class="form-control" name="specialty" placeholder="Търсене по специалност">
            <button type="submit" class="btn primary-btn">Търсене</button>
        </form>
    </section>

    <section class="doctors-list">
        <?php 
          include "doctors_list.php";
        ?>
    </section>
</section>

</body>
</html>
