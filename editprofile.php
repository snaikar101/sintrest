<html>
<head>
	<?php 
		session_start();
		include("conf.php");
		if(isset($_POST['Modify'])){
                        //$username= mysqli_real_escape_string($sql_con,$_POST['userid']);
						$current_user=$_SESSION['username'];
                        $username=get_input_post('userid');
			$email= get_input_post('email');
			$fname= get_input_post('fname');
			$lname= get_input_post('lname');
			//$gender= get_input_post('gender');
			$address= get_input_post('address');
			$zip= get_input_post('zip');
			$city= get_input_post('city');
			$country= get_input_post('country');
			$dob= get_input_post('dob');
			$occupation= get_input_post('occupation');
			$phone= get_input_post('phone');
			
                        $query = "update user set fname='$fname',lname='$lname',
						email='$email',address='$address',city='$city',zip='$zip',country='$country',
						occuption='$occupation',phone_no='$phone' 
						where user_id='$current_user';";
                        echo "$query<br/>";
                        mysqli_query($sql_con,$query);
                        header("Location: home.php ");
                            //    exit;
                        
                }
				

	?>
	<script src="../dist/js/register.js"></script>
</head>
<body style='padding-right: 60px; padding-left: 60px;padding-top:60px;' >
        <?php include("header.php") ?>
	<?php// include("left_nav.php") ?>
	<div class='jumbotron' >
                <p>
				<?php 
				$current_user=$_SESSION['username'];
			
			
                        $query = "select * from user where user_id='$current_user';";
                        //echo "$query<br/>";
						
						$result=mysqli_query($sql_con,$query);
						if(!$result){
						}
						else
						{
					//	echo "$query<br/>";
						$row = mysqli_fetch_array($result);
								$name = $row['user_id'];
								$name1=$row['fname'];
								$name2=$row['lname'];
								$name3=$row['email'];
								$name4=$row['gender'];
								$name5=$row['address'];
								$name6=$row['city'];
								$name7=$row['zip'];
								$name8=$row['country'];
								$name9=$row['dob'];
								$name10=$row['occuption'];
								$name11=$row['phone_no'];
						}
						
        
				 ?>
                <form name='register' onSubmit="return validateform()" action="editprofile.php" method="post">
                	<div class="form-group">
                                <label for="User Name">User ID</label>
                                <input type="text" class="form-control" id="User Name" name='userid' value='<?php echo $name;?>'/>
                        </div>

			<div class="form-group">
                                <label for="Email">Email address</label>
                                <input type="email" class="form-control" id="Email" name='email' value='<?php echo $name3;?>'/>
                        </div>
			 <div class="form-group">
                                <label for="fname">First Name</label>
                                <input type="text" class="form-control" id="fname" name='fname' value='<?php echo $name1;?>'/>
                        </div>
			 <div class="form-group">
                                <label for="lname">Last Name</label>
                                <input type="text" class="form-control" id="lname"  name='lname' value='<?php echo $name2;?>'/>
                        </div>
			<div class="radio">
  				<label>
    				<input type="radio" name="gender" id="optionsRadios1" value="f" <?php if($name4=="f") echo "checked"?>>
    				Female
  				</label>
			</div>
			<div class="radio">
  				<label>
    				<input type="radio" name="gender" id="optionsRadios2" value="m"<?php if($name4=="m") echo "checked"?>>
    				Male
  				</label>
			</div>
			 <div class="form-group">
                                <label for="adress">Address</label>
                                <input type="textarea" class="form-control" id="adress"  name='address' value='<?php echo $name5;?>'/>
                        </div>
			 <div class="form-group">
                                <label for="city">City</label>
                                <input type="text" class="form-control" id="city"  name='city' value='<?php echo $name6;?>'/>
                        </div>
			 <div class="form-group">
                                <label for="zip">ZIP</label>
                                <input type="text" class="form-control" id="zip"  name='zip' value='<?php echo $name7;?>'/>
                        </div>
			 <div class="form-group">
                                <label for="country">Country</label>
                                <input type="text" class="form-control" id="country"  name='country' value='<?php echo $name8;?>'/>
                        </div>
			 <div class="form-group">
                                <input type="hidden" class="form-control" id="dob"  name='dob' value='<?php echo $name9;?>'/>
                        </div>
			<div class="form-group">
                                <label for="occupation">Occupation</label>
                                <input type="text" class="form-control" id="Occupation"  name='occupation' value='<?php echo $name10;?>'/>
                        </div>
			<div class="form-group">
                                <label for="phone">Phone Number</label>
                                <input type="text" class="form-control" id="phone" name='phone' value='<?php echo $name11;?>'/>
                        </div>
			
  			
			<div class="form-group">
    				<label for="ppic">Upload your profile Picture</label>
    				<input type="file" id="ppic" name="ppic"/>
    				<p class="help-block">You can opt not to</p>
  			</div>

                        <input class="btn btn-primary btn-defalut" type="submit" name="Modify" value="Modify"/>
                </p>
                </form>
                </p>


        </div>
</body>
</html>
