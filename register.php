<html>
<head>
	<?php 
		session_start();
		include("conf.php");
		if(isset($_POST['register'])){
                        //$username= mysqli_real_escape_string($sql_con,$_POST['userid']);
                        $username=get_input_post('userid');
			$email= get_input_post('email');
			$fname= get_input_post('fname');
			$lname= get_input_post('lname');
			$gender= get_input_post('gender');
			$address= get_input_post('address');
			$zip= get_input_post('zip');
			$city= get_input_post('city');
			$country= get_input_post('country');
			$dob= get_input_post('dob');
			$occupation= get_input_post('occupation');
			$phone= get_input_post('phone');
			$passwd= get_input_post('password1');
			$temp = explode(".", $_FILES["ppic"]["name"]);
                        $extension = end($temp);
                        $picturePath="uploads/ppic/$username.$extension";
		        $query = "insert into user values('$username','$fname','$lname','$email',md5('$passwd'),'$gender','$picturePath','$address','$city','$zip','$country','$dob','$occupation','$phone',now());";
                       // echo "$query<br/>";
		//	exit;
			$result1=mysqli_query($sql_con,$query);
			if(!$result1){
                		echo "<p class='text-danger' style='padding-top:5%'>Oops! username already exists try again</p>";
                	}
                	else
                	{
                		echo "<p class='text-success' style='padding-top:5%'>creating pin successfull</p>";
                		$picturePath=saveImg($_FILES,$username);
                        	header("Location: index.php");
                                
                        }
                }
function saveImg($_FILE,$pic_id){
        $allowedExts = array("gif", "jpeg", "jpg", "png");
        $temp = explode(".", $_FILES["ppic"]["name"]);
        $extension = end($temp);
        if ((($_FILES["ppic"]["type"] == "image/gif")
                || ($_FILES["ppic"]["type"] == "image/jpeg")
                || ($_FILES["ppic"]["type"] == "image/jpg")
                || ($_FILES["ppic"]["type"] == "image/pjpeg")
                || ($_FILES["ppic"]["type"] == "image/x-png")
                || ($_FILES["ppic"]["type"] == "image/png"))
                && in_array($extension, $allowedExts))
        	{
                if ($_FILES["ppic"]["error"] > 0)
                {
                        echo "Error: " . $_FILES["ppic"]["error"] . "<br>";
			exit;
                }
                else
                {
                       /* if (file_exists("uploads/ppic/" .$pic_id.".".$extension))
                        {
                                echo "<p class='text-danger' style='padding-top:5%'>Error creating pin contact admin</p>";
                        }*/
                        //else
                        //{
                        move_uploaded_file($_FILES["ppic"]["tmp_name"],"uploads/ppic/".$pic_id.".".$extension);
                        return "uploads/ppic/".$pic_id.".".$extension;
                        //}


                }
        }
        else
        {
                echo "Invalid file";
        }
}

?>
	<script src="../dist/js/register.js"></script>
</head>
<body style='padding-right: 60px; padding-left: 60px;padding-top:60px;' >
        <div class='jumbotron' >
                <p>
                <form name='register' onSubmit="return validateform()" action="register.php" enctype="multipart/form-data" method="post">
                	<div class="form-group">
                                <label for="User Name">User ID</label>
                                <input type="text" class="form-control" id="User Name" name='userid' placeholder="Enter User Name">
                        </div>

			<div class="form-group">
                                <label for="Email">Email address</label>
                                <input type="email" class="form-control" id="Email" name='email' placeholder="Enter email">
                        </div>
			 <div class="form-group">
                                <label for="fname">First Name</label>
                                <input type="text" class="form-control" id="fname" name='fname' placeholder="Enter First Name">
                        </div>
			 <div class="form-group">
                                <label for="lname">Last Name</label>
                                <input type="text" class="form-control" id="lname"  name='lname' placeholder="Enter Last Name">
                        </div>
			<div class="radio">
  				<label>
    				<input type="radio" name="gender" id="optionsRadios1" value="f" checked>
    				Female
  				</label>
			</div>
			<div class="radio">
  				<label>
    				<input type="radio" name="gender" id="optionsRadios2" value=m"">
    				Male
  				</label>
			</div>
			 <div class="form-group">
                                <label for="adress">Address</label>
                                <input type="textarea" class="form-control" id="adress"  name='address' placeholder="Enter Address">
                        </div>
			 <div class="form-group">
                                <label for="city">City</label>
                                <input type="text" class="form-control" id="city"  name='city' placeholder="Enter City">
                        </div>
			 <div class="form-group">
                                <label for="zip">ZIP</label>
                                <input type="text" class="form-control" id="zip"  name='zip' placeholder="Enter ZIP Code">
                        </div>
			 <div class="form-group">
                                <label for="country">Country</label>
                                <input type="text" class="form-control" id="country"  name='country' placeholder="Enter Country">
                        </div>
			 <div class="form-group">
                                <input type="hidden" class="form-control" id="dob"  name='dob' placeholder="MM/DD/YYYY">
                        </div>
			<div class="form-group">
                                <label for="occupation">Occupation</label>
                                <input type="text" class="form-control" id="Occupation"  name='occupation' placeholder="Enter Your Occupation">
                        </div>
			<div class="form-group">
                                <label for="phone">Phone Number</label>
                                <input type="text" class="form-control" id="phone" name='phone' placeholder="Enter Phone Number">
                        </div>
			
  			<div class="form-group">
    				<label for="Password1">Password</label>
    				<input type="password" class="form-control" id="password1" name='password1' placeholder="Enter Password">
  			</div>
			<div class="form-group">
                                <label for="Password2">Re-Enter Password</label>
                                <input type="password" class="form-control" id="password2" name= 'password2' placeholder="Enter Password Again">
                        </div>
			<div class="form-group">
    				<label for="ppic">Upload your profile Picture</label>
    				<input type="file" id="ppic" name="ppic"/>
    				<p class="help-block">You can opt not to</p>
  			</div>

                        <input class="btn btn-primary btn-defalut" type="submit" name="register" value="REGISTER"/>
                </p>
                </form>
                </p>


        </div>
</body>

</html>
