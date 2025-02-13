<?php
require_once "config.php";
$last_name = $first_name = $address = $contact = $email = "";
$last_name_err = $first_name_err = $address_err = $contact_err = $email_err = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){
  $input_last_name = trim($_POST["last_name"]);
  if(empty($input_last_name)){
    $last_name_err = "Please enter a last name.";
  } else {
    $last_name = $input_last_name;
  }

  $input_first_name = trim($_POST["first_name"]);
  if(empty($input_first_name)){
    $first_name_err = "Please enter a first name.";
  } else {
    $first_name = $input_first_name;
  }

  $input_address = trim($_POST["address"]);
  if(empty($input_address)){
    $address_err = "Please enter an address.";
  } else {
    $address = $input_address;
  }

  $input_contact = trim($_POST["contact"]);
  if(empty($input_contact)){
    $contact_err = "Please enter a contact.";
  } else {
    $contact = $input_contact;
  }  

  $input_email = trim($_POST["email"]);
  if(empty($input_email)){
    $email_err = "Please enter an email.";
  } else {
    $email = $input_email;
  } 
  if(empty($last_name_err) && empty($first_name_err) && empty($address_err) && empty($contact_err) && empty($email_err)){
    $sql = "INSERT INTO employees (last_name, first_name, address, contact, email) VALUES (?, ?, ?, ?, ?)";
    if($stmt = mysqli_prepare($link, $sql)){
      mysqli_stmt_bind_param($stmt, "sssss", $param_last_name, $param_first_name, $param_address, $param_contact, $param_email);
      $param_last_name = $last_name;
      $param_first_name = $first_name;
      $param_address = $address;
      $param_contact = $contact;
      $param_email = $email;
      if(mysqli_stmt_execute($stmt)){
        header("location: index.php");
        exit();
      } else {
        echo "Something went wrong. Please try again later.";
      }
    }
    mysqli_stmt_close($stmt);
  }
  mysqli_close($link);
}

?>
<!<!DOCTYPE html>
<html>
<head>
        <title>Create</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>
        <style type="text/css">
            .wrapper{
                width: 650px;
                margin: 0 auto;
            }
            .page-header h2{
                margin-right: 15px;
            }
            table tr td:last-child a{
                margin-right: 15px;
            }
        </style>
    </head>
    <body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h2>Create Record</h2>
                    </div>
                    <p>Please fill this form and submit to add employee record to the database.</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group <?php echo (!empty($last_name_err)) ? 'has-error' : ''; ?>">
                            <label>Last Name</label>
                            <input type="text" name="last_name" class="form_control" value="<?php echo $last_name; ?>">
                            <span class="help-block"><?php echo $last_name_err; ?></span>
                                                   </div>
                        <div class="form-group <?php echo (!empty($first_name_err)) ? 'has-error' : ''; ?>">
                            <label>First Name</label>
                            <input type="text" name="first_name" class="form_control" value="<?php echo $first_name; ?>">
                            <span class="help-block"><?php echo $first_name_err; ?></span>
                                                   </div>
                        <div class="form-group <?php echo (!empty($address_err)) ? 'has-error' : ''; ?>">
                            <label>Address</label>
                            <input type="text" name="address" class="form_control" value="<?php echo $address; ?>">
                            <span class="help-block"><?php echo $address_err; ?></span>
                                                  </div>
                        <div class="form-group <?php echo (!empty($contact_err)) ? 'has-error' : ''; ?>">
                            <label>Contact</label>
                            <input type="text" name="contact" class="form_control" value="<?php echo $contact; ?>">
                            <span class="help-block"><?php echo $contact_err; ?></span>
                                                   </div>
           
                        <div class="form-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
                            <label>Email</label><input type="text" name="email" class="form_control" value="<?php echo $email; ?>">
                            <span class="help-block"><?php echo $email_err; ?></span>
                                                   </div>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="index.php" class="btn btn-default">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
    </body>
</html>
  