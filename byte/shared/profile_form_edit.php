<?php
  $firstName = $_SESSION['firstName'];
  $lastName = $_SESSION['lastName'];
  $email = $_SESSION['email'];
  $phone = $_SESSION['phone'] ?? '';
  $profilePictureUrl = $_SESSION['profilePictureUrl'];

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
    <h2>Profile Information</h2>
    <div class="edit-form-wrapper">
        <section class="edit-section picture">
            <img class="profile-picture edit" src="$profilePictureUrl" alt="profile-picture">
            <form class="profile-picture-edit-form" method="post" action="/handlers/profile_picture_edit.php" enctype="multipart/form-data">
              <input type="file" id="profilePicture" name="profilePicture" accept="image/*" />
              $errorUploadingImage
              <button type="submit">Upload Picture</button>
            </form>
        </section>
        <section class="edit-section info">
            <form action="/handlers/save_profile.php" method="post" class="profile-edit-form">
                <h3>Edit Profile</h3>
                
                <div class="input-field">
                    <label for="firstName">First Name</label>
                    <input type="text" id="firstName" placeholder="First Name" name="firstName" value="$firstName">
                </div>      
    
                <div class="input-field">
                    <label for="lastName">Last Name</label>
                    <input type="text" id="surname" placeholder="Last Name" name="lastName" value="$lastName">
                </div>
                
                <div class="input-field">
                    <label for="email">Email</label>
                    <input type="email" id="email" placeholder="Email" name="email" value="$email" required>
                </div>
                
                <div class="input-field">
                    <label for="phone">Phone</label>
                    <input type="tel" id="phone" placeholder="Phone" name="phone" value="$phone">
                </div>
    
                <input type="submit" value="Save Profile">
            </form>
        </section>
    </div>
</section>
EOT;

  echo $items;
