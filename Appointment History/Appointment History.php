<?php
session_start();

if(isset($_SESSION['user_name'])){

    $index = $_SESSION['NIC'];
    
?>
<!DOCTYPE html>
<html>
<head>
    <title>Medical Portal</title>
    <link rel="stylesheet" type="text/css" href="Appointment History.css">
</head>
<body>
    <?php
    require "config.php";
    
    $sql1 = "SELECT * FROM Registered_User WHERE NIC = '$index'";
    $result1 = $conn->query($sql1);

    $result2 = $result1 -> fetch_assoc();
    ?>
    <header>
			<div><img class = "logo" src = "LOGO MEDIZONE.png" alt = "This is a logo" height = "150px" width = "150px"></div>
			<nav>
			  <ul>
				<li><a href="#">Home</a></li>
				<li>
				  <a href="#">Places</a>
				  <ul class="submenu">
					<li><a href="#">Medical Center</a></li>
					<li><a href="#">Hospitals</a></li>
				  </ul>
				<li><a href="#">Doctors</a></li>
				<li><a href="#">About Us</a></li>
			  </ul>
			</nav>
			<div class="login-signup">
			  <button class="login">Login</button>
			  <button class="signup">Signup</button>
			</div>
	</header>
		  <!-- Rest of the page content -->
    <br>
    <div class="body_container">
        <div class="outer_container">
            <h1 id="h1">Appointment History</h1>
            <div class="container">
                <div class="left_div">
                    <h3>Hello !</h3>
                    <h1><?php echo $result2["F_Name"] ?></h1>
                    <h4>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ad, sit!</h4>
                </div>
                <div class="right_div">
                    <div class="personal_details">
                        <h2>Personal Details</h2>
                        <div class="personal_data">
                            <form action="updateprofile.php" method="post">
                                <div class="shower_name">
                                    <div class="shower_div">

                                        <label for="">First name</label>
                                        <br>
                                        <div class="shower">
                                            <input type="text" name="fname" id="" value="<?php echo $result2["F_Name"] ?>">
                                        </div>
                                    </div>
                                    <div class="shower_div">

                                        <label for="">Last name</label>
                                        <br>
                                        <div class="shower">
                                            <input type="text" name="lname" id="" value="<?php echo $result2["L_Name"] ?>">
                                        </div>
                                    </div>
                                </div>
                                
                                
                                <label for="">Email</label>
                                <br>
                                <div class="shower">
                                    <input type="text" name="email" id="" value="<?php echo $result2["User_Email"] ?>" readonly>
                                </div>

                                <label for="">NIC</label>
                                <br>
                                <div class="shower">
                                    <input type="text" name="nic" id="" value="<?php echo $result2["NIC"] ?>">
                                </div>
                                
                                <label for="">Phone Number</label>
                                <br>
                                <div class="shower">
                                    <input type="text" name="phonenumber" id="" value="<?php echo $result2["P_No"] ?>">
                                </div>
                                
                                <label for="">Password</label>
                                <br>
                                <div class="shower">
                                    <input type="text" name="password" id="" value="<?php echo $result2["User_Email"] ?>">
                                </div>

                                <br>
                                <input type="submit" value="update Profile" class="btn_type1"  name="updateprofile">
                                <input type="submit" value="Delete Account" class="btn_type1" name="deleteaccount">
                            
                            </form>
                        </div>
                    </div>
                    <div class="history">
                        <h2>Activities</h2>
                        <div class="acticity_history">
                            <?php
                        
                            $sql = "SELECT r.Reservation_ID, r.Hotel_ID, r.Event_Type, r.Event_ID, r.Payment_Status FROM Reservation r, Registered_User ru WHERE Customer_NIC = NIC AND Customer_NIC = '$index'";
                            $result = $conn->query($sql);

                            if($result->num_rows > 0) {
                                echo '<table style="border:1px solid black; width:100%">
                                <tr>
                                <th style="border:1px solid black">Reservation ID</th>
                                <th style="border:1px solid black">Hotel ID</th>
                                <th style="border:1px solid black">Event Type</th>
                                <th style="border:1px solid black">Event ID</th>
                                <th style="border:1px solid black">Payment Status</th>
                                </tr>';

                                while($row = $result->fetch_assoc()) {
                                    echo '<tr><td style="border:1px solid black">' .$row["Reservation_ID"].'</td><td style="border:1px solid black">' .$row["Hotel_ID"]. '</td><td style="border:1px solid black">' .$row["Event_Type"]. '</td><td style="border:1px solid black">' .$row["Event_ID"]. '</td><td style="border:1px solid black">' .$row["Payment_Status"]. "</td></tr>";
                                }
                                echo "</table>";
                            }else {
                                echo "0 results";
                            }

                            $conn->close();
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <footer>
			<div class="social-media">
			  <a href="#" target="_blank"><img src="facebook.png" alt="Facebook"></a>
			  <a href="#" target="_blank"><img src="instagram.png" alt="Instagram"></a>
			  <a href="#" target="_blank"><img src="twitter.png" alt="Twitter"></a>
			</div>
			<br>
			<div class="footer-links">
			  <a href="#">Contact Us</a>
			  <a href="#">Terms and Conditions</a>
			  <a href="#">Privacy Policy</a>
			  <a href="#">FAQs</a>
			</div>
			<br>
		
			<div class="footer-bottom">
			  <p>Copyright &copy; 2023 Designed by<span> M_L_B_15.2_07</span></p>
			</div>
		</footer>
</body>
</html>

<?php
}else{
    header("Location:login.php?not logged");
    exit();
}
?>