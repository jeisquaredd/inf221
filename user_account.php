<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Welcome!</title>

  <!-- jQuery for Address Selector -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="./bootstrap-5.3.3-dist/css/bootstrap.css">
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  
  <!-- For Icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <link rel="stylesheet" href="includes/style.css?v=<?php echo time(); ?>">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  
  <!-- For Pop Up Notification -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
  <style>
    .profile-header {
      text-align: center;
      margin: 20px 0;
    }
    .profile-pic {
      width: 150px;
      height: 150px;
      border-radius: 50%;
      margin-bottom: 10px;
    }
    .profile-info, .address-info {
      padding: 20px;
      border: 1px solid #ccc;
      border-radius: 10px;
      background-color: #f9f9f9;
      margin-bottom: 20px;
    }
    .info-header {
      background-color: #007bff;
      color: white;
      padding: 10px;
      border-radius: 10px 10px 0 0;
    }
    .info-body {
      padding: 20px;
    }
  </style>
</head>
 <body>

<?php include('includes/user_navbar.php'); ?>

<div class="container my-3">

  <div class="row">
    <div class="col-md-12">
      <div class="profile-info">
        <div class="info-header">
          <h3>Account Information</h3>
        </div>
        <div class="info-body">
          <p><strong>First Name:</strong> <?php echo $data['user_firstname'];?></p>
          <p><strong>Last Name:</strong> Pastrana</p>
          <p><strong>Birthday:</strong> July 27, 1999</p>
        </div>
      </div>
    </div>
    </div>
    <div class="row">
    <div class="col-md-12">
      <div class="address-info">
        <div class="info-header">
          <h3>Address Information</h3>
        </div>
        <div class="info-body">
          <p><strong>Street:</strong> </p>
          <p><strong>Barangay:</strong></p>
          <p><strong>City:</strong></p>
          <p><strong>Province:</strong></p>
          
        </div>
      </div>
    </div>
  </div>
  </div>
</div>


<!-- Change Profile Picture Modal -->
    <!-- Modal for Profile Picture Upload -->
    <div class="modal fade" id="changeProfilePictureModal" tabindex="-1" role="dialog" aria-labelledby="changeProfilePictureModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
        <form id="uploadProfilePicForm" enctype="multipart/form-data">
            <div class="modal-header">
                <h5 class="modal-title" id="uploadProfilePicModalLabel">Upload Profile Picture</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <input type="file" class="form-control form-control-file" id="profilePictureInput" name="profile_picture" accept="image/*" required>
                    <small id="fileSizeError" class="form-text text-danger" style="display:none;">File size exceeds 5MB</small>
                </div>
                <div class="form-group">
                    <img id="imagePreview" src="#" alt="Image Preview" style="display:none; width: 100%; height: auto;">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
        </form>
        </div>
      </div>
    </div>


<!-- Update Account Information Modal -->
<div class="modal fade" id="updateAccountInfoModal" tabindex="-1" role="dialog" aria-labelledby="updateAccountInfoModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
    <form id="updateAccountForm" method="post" novalidate>
  <div class="modal-header">
    <h5 class="modal-title" id="updateAccountInfoModalLabel">Update Account Information</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <div class="modal-body">
    <p>Current Address: <address><?php echo $data['street'].', ',$data['barangay'].', '. $data['city'].', '. $data['province'];?></address></p>
    <div class="form-group">
      <label class="form-label">Region<span class="text-danger"> *</span></label>
      <select name="user_region" class="form-control form-control-md" id="region" required></select>
      <input type="hidden" class="form-control form-control-md" name="region_text" id="region-text">
      <div class="valid-feedback">Looks good!</div>
      <div class="invalid-feedback">Please select a region.</div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label class="form-label">Province<span class="text-danger"> *</span></label>
        <select name="user_province" class="form-control form-control-md" id="province" required></select>
        <input type="hidden" class="form-control form-control-md" name="province_text" id="province-text" required>
        <div class="valid-feedback">Looks good!</div>
        <div class="invalid-feedback">Please select your province.</div>
      </div>
      <div class="form-group col-md-6">
        <label class="form-label">City / Municipality<span class="text-danger"> *</span></label>
        <select name="user_city" class="form-control form-control-md" id="city" required></select>
        <input type="hidden" class="form-control form-control-md" name="city_text" id="city-text" required>
        <div class="valid-feedback">Looks good!</div>
        <div class="invalid-feedback">Please select your city/municipality.</div>
      </div>
    </div>
    <div class="form-group">
      <label class="form-label">Barangay<span class="text-danger"> *</span></label>
      <select name="user_barangay" class="form-control form-control-md" id="barangay" required></select>
      <input type="hidden" class="form-control form-control-md" name="barangay_text" id="barangay-text" required>
      <div class="valid-feedback">Looks good!</div>
      <div class="invalid-feedback">Please select your barangay.</div>
    </div>
    <div class="form-group">
      <label class="form-label">Street <span class="text-danger"> *</span></label>
      <input type="text" class="form-control form-control-md" name="user_street" id="street-text" required>
      <div class="valid-feedback">Looks good!</div>
      <div class="invalid-feedback">Please enter your street.</div>
    </div>
  </div>
  <div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    <button type="submit" name="updateaddress" class="btn btn-primary">Save changes</button>
  </div>
</form>

    </div>
  </div>
</div>


<!-- Modal for Change Password -->
<div class="modal fade" id="changePasswordModal" tabindex="-1" role="dialog" aria-labelledby="changePasswordModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="changePasswordModalLabel">Change Password</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="changePasswordForm" method="POST">
          
        <div class="form-group">
          <label for="currentPassword">Current Password</label>
          <input type="password" class="form-control" id="currentPassword" name="current_password" required>
          <div id="currentPasswordFeedback" class="invalid-feedback"></div>
        </div>
        
        <div class="form-group">
          <label for="newPassword">New Password</label>
          <input type="password" class="form-control" id="newPassword" name="new_password" required readonly>
          <div id="newPasswordFeedback" class="invalid-feedback"></div>
        </div>
        <div class="form-group">
          <label for="confirmPassword">Confirm New Password</label>
          <input type="password" class="form-control" id="confirmPassword" name="confirm_password" required readonly>
          <div id="confirmPasswordFeedback" class="invalid-feedback"></div>
        </div>
        
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary" name="updatepassword" id="saveChangesBtn" disabled>Save changes</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

</div>

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
<!-- Make Sure jquery3.6.0 is before the ph-address-selector.js -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="ph-address-selector.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


</body>
</html>
