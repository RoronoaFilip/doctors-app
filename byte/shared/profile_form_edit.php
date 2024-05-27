<?php
  $firstName = $_SESSION['firstName'];
  $lastName = $_SESSION['lastName'];
  $email = $_SESSION['email'];
  $phone = $_SESSION['phone'] ?? '';
  $profilePictureUrl = $_SESSION['profilePictureUrl'];

  $specialty = $_SESSION['specialty'] ?? '';
  $education = $_SESSION['education'] ?? '';

  $errorUploadingImage = '';
  if (isset($_POST['errorUploadingImage'])) {
    $errorUploadingImage = <<<EOT
    <div class="error-message">
        <p>Грешка при качването на снимката. Опитайте пак!</p>
    </div>
EOT;
  }

  $items = <<<EOT
<section class="profile edit">
    <h2 class="page-title">Профил:</h2>
    <section class="edit-form-wrapper">
        <section class="edit-section picture">
            <form class="form" method="post" action="/handlers/profile_picture_edit.php" enctype="multipart/form-data">
            <h3>Смяна на Профилната Снимка</h3>
            <img class="profile-picture" src="$profilePictureUrl" alt="profile-picture">
              <fieldset class="input-wrapper">
                <label class="form-label">Смяна на снимка</label>
                <input class="form-control" type="file" name="profilePicture" id="profilePicture" accept="image/*">
              </fieldset>
              $errorUploadingImage
              <button class="submit-button" type="submit">Качване на снимка</button>
            </form>
        </section>
        <section class="edit-section info">
            <form action="/handlers/save_profile.php" method="post" class="form">
                <h3>Промяна на профила</h3>
                
                <fieldset class="input-wrapper">
                    <label class="form-label" for="firstName">Име</label>
                    <input class="form-control" type="text" id="firstName" placeholder="Име" name="firstName" value="$firstName">
                </fieldset>      
    
                <fieldset class="input-wrapper">
                    <label class="form-label" for="lastName">Фамилия</label>
                    <input class="form-control" type="text" id="surname" placeholder="Фамилия" name="lastName" value="$lastName">
                </fieldset>
                
                <fieldset class="input-wrapper hidden">
                    <label class="form-label" for="specialty">Специалност</label>
                    <input class="form-control" type="text" id="specialty" placeholder="Специалност" name="specialty" value="$specialty">
                </fieldset>      
    
                <fieldset class="input-wrapper hidden">
                    <label class="form-label" for="education">Образование</label>
                    <input class="form-control" type="text" id="education" placeholder="Образование" name="education" value="$education">
                </fieldset>
                
                <fieldset class="input-wrapper">
                    <label class="form-label" for="email">Електронна поща</label>
                    <input class="form-control" type="email" id="email" placeholder="Електронна поща" name="email" value="$email" required>
                </fieldset>
                
                <fieldset class="input-wrapper">
                    <label class="form-label" for="phone">Телефон</label>
                    <input class="form-control" type="tel" id="phone" placeholder="Телефон" name="phone" value="$phone">
                </fieldset>
    
                <button class="submit-button" type="submit">Запази</button>
            </form>
        </section>
    </section>
</section>
EOT;

  echo $items;
