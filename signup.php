	<!DOCTYPE html>
<html lang="en">
<?php include'core/init.php';?>
<head>
    <title>Sign Up: Society Of Mathematics</title>
<?php include'includes/head.php';?>
</head>
<body>


<?php include'includes/navbar.php';?>
<?php include'includes/signup.php';?>
<?php include'includes/footer.php';?>


<script>
      $(window).load(function(){ bootbox.alert("Register here to avail the benefits of Society Of Mathematics.") });

     $(document).ready(function()
     {
     //Handles menu drop down
     $('.dropdown-menu').find('form').click(function (e) {
     e.stopPropagation();
     });
     });
</script>


<script type="text/javascript">
    function validatePass(p1, p2) {
    if (p1.value != p2.value || p1.value == '' || p2.value == '') {
        p2.setCustomValidity('Password incorrect');
    } else {
        p2.setCustomValidity('');
    }
    }   
</script>

</body>
</html>