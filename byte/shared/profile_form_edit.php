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
        <p>There was an error uploading the image. Please try again.</p>
    </div>
EOT;
  }

  $items = <<<EOT
<section class="profile edit">
    <h2 class="page-title">Profile Information</h2>
    <section class="edit-form-wrapper">
        <section class="edit-section picture">
            <form class="form" method="post" action="/handlers/profile_picture_edit.php" enctype="multipart/form-data">
            <h3>Edit Profile Picture</h3>
            <img class="profile-picture" src="$profilePictureUrl" alt="profile-picture">
              <fieldset class="input-wrapper">
                <label class="form-label">Change Profile Picture</label>
                <input class="form-control" type="file" name="profilePicture" id="profilePicture" accept="image/*">
              </fieldset>
              $errorUploadingImage
              <button class="submit-button" type="submit">Upload Picture</button>
            </form>
        </section>
        <section class="edit-section info">
            <form action="/handlers/save_profile.php" method="post" class="form">
                <h3>Edit Profile</h3>
                
                <fieldset class="input-wrapper">
                    <label class="form-label" for="firstName">First Name</label>
                    <input class="form-control" type="text" id="firstName" placeholder="First Name" name="firstName" value="$firstName">
                </fieldset>      
    
                <fieldset class="input-wrapper">
                    <label class="form-label" for="lastName">Last Name</label>
                    <input class="form-control" type="text" id="surname" placeholder="Last Name" name="lastName" value="$lastName">
                </fieldset>
                
                <fieldset class="input-wrapper hidden">
                    <label class="form-label" for="specialty">Specialty</label>
                    <input class="form-control" type="text" id="specialty" placeholder="Специалност" name="specialty" value="$specialty">
                </fieldset>      
    
                <fieldset class="input-wrapper hidden">
                    <label class="form-label" for="education">Education</label>
                    <input class="form-control" type="text" id="education" placeholder="Education" name="education" value="$education">
                </fieldset>
                
                <fieldset class="input-wrapper">
                    <label class="form-label" for="email">Email</label>
                    <input class="form-control" type="email" id="email" placeholder="Email" name="email" value="$email" required>
                </fieldset>
                
                <fieldset class="input-wrapper">
                    <label class="form-label" for="phone">Phone</label>
                    <input class="form-control" type="tel" id="phone" placeholder="Phone" name="phone" value="$phone">
                </fieldset>
    
                <button class="submit-button" type="submit">Save Profile</button>
            </form>
        </section>
    </section>
</section>
EOT;

  echo $items;
