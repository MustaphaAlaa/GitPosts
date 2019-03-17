<?php require APPROOT . '/views/inc/header.php'; ?>
  <div class="row">
    <div class="col-md-6 mx-auto">
      <div class="card card-body bg-light mt-5">
        <h2>Create An Account</h2>
        <p>Please fill out this form to register with us</p>
        <form action="<?php echo URLROOT; ?>/users/register" method="post">
          <div class="form-group">
            <label for="firstName">FirstName: <sup>*</sup></label>
            <input type="text" name="firstName" class="form-control form-control-lg <?php echo (!empty($data['firstName_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['firstName']; ?>">
            <span style="text-align:center;" class=" alert alert-danger invalid-feedback"><?php echo $data['firstName_err']; ?></span>
          </div>

          <div class="form-group">
            <label for="lastName">LastName: <sup>*</sup></label>
            <input type="text" name="lastName" class="form-control form-control-lg <?php echo (!empty($data['lastName_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['lastName']; ?>">
            <span style="text-align:center;" class="alert alert-danger invalid-feedback"><?php echo $data['lastName_err']; ?></span>
          </div>

          <div class="form-group">
            <label for="phoneNumber">PhoneNumber: <sup>*</sup></label>
            <input type="text" name="phoneNumber" class="form-control form-control-lg <?php echo (!empty($data['phoneNumber_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['phoneNumber']; ?>">
            <span style="text-align:center;" class="alert alert-danger invalid-feedback"><?php echo $data['phoneNumber_err']; ?></span>
          </div>

          <div class="form-group">
            <label for="email">Email: <sup>*</sup></label>
            <input type="email" name="email" class="form-control form-control-lg <?php echo (!empty($data['email_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['email']; ?>">
            <span style="text-align:center;"  class=" alert alert-danger invalid-feedback"><?php echo $data['email_err']; ?></span>
          </div>

          <div class="form-group">
            <label for="password">Password: <sup>*</sup></label>
            <input type="password" name="password" class="form-control form-control-lg <?php echo (!empty($data['password_err'])) ? 'is-invalid' : ''; ?>" value="">
            <span style="text-align:center;"  class=" alert alert-danger invalid-feedback"><?php echo $data['password_err']; ?></span>
          </div>

          <div class="form-group">
            <label for="confirmPassword">Confirm Password: <sup>*</sup></label>
            <input type="password" name="confirmPassword" class="form-control form-control-lg <?php echo (!empty($data['confirmPassword_err'])) ? 'is-invalid' : ''; ?>" value="">
            <span  style="text-align:center;" class=" alert alert-danger invalid-feedback"><?php echo $data['confirmPassword_err']; ?></span>
          </div>

          <div class="row">
            <div class="col">
              <input type="submit" value="Register" class="btn btn-success btn-block">
            </div>
            <div class="col">
              <a href="<?php echo URLROOT; ?>/users/login" class="btn btn-light btn-block">Have an account? Login</a>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
<?php require APPROOT . '/views/inc/footer.php'; ?>
