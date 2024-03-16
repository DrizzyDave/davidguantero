<?php

include 'conn.php';

session_start();

//login
if(isset($_POST['login'])){
	$email = $_POST['email'];
	$password = $_POST['password'];

	$chk = mysqli_query($conn,"SELECT * FROM admin WHERE email='$email' and password='$password'");
	$rows = mysqli_num_rows($chk);
	if ($rows) {
		$_SESSION['email'] = $email;
		$_SESSION['password'] = $password;
		?>
		<script>
			window.location.href = 'home.php';
		</script>
		<?php
	}else{
		?>
		<script>
			alert("INVALID DETAILS");
			window.location.href = 'login.html';
		</script>
		<?php
	}
}

//get details
if (isset($_SESSION['email']) && isset($_SESSION['password'])) {
	$email = $_SESSION['email'];
	$password = $_SESSION['password'];

	$get = mysqli_query($conn,"SELECT * from admin where email='$email' and password='$password'");
	$admin = mysqli_fetch_array($get);
}

//update profile
if (isset($_POST['updateProfile'])) {
	$id = $_GET['id'];
	$name = $_POST['name'];
	$password = $_POST['password'];
	$contact = $_POST['contact'];
	$email = $_POST['email'];
	$address = $_POST['address'];

	mysqli_query($conn,"UPDATE admin set name='$name',password='$password',contact='$contact',email='$email',address='$address' where id='$id'");

	$_SESSION['email'] = $email;
	$_SESSION['password'] = $password;
	?>
	<script>
		window.location.href = 'home.php';
	</script>
	<?php
}

if (isset($_GET['deleteAccount'])) {
	$id = $_GET['id'];

	mysqli_query($conn,"DELETE from sog where id='$id'");
	mysqli_query($conn,"DELETE from teacher where id='$id'");
	mysqli_query($conn,"DELETE from council where id='$id'");
	?>
	<script>
		alert("Deleted..!");
		window.location.href = 'accounts.php';
	</script>
	<?php
}

//approve reservation
if (isset($_GET['Approve'])) {
	$id = $_GET['id'];
	mysqli_query($conn,"UPDATE schedule_list set status='Approved' where id='$id'");
	?>
	<script>
		window.location.href = 'reservation.php';
	</script>
	<?php
}

//reject reservation
if (isset($_GET['Reject'])) {
	$id = $_GET['id'];
	mysqli_query($conn,"UPDATE schedule_list set status='Rejected' where id='$id'");
	?>
	<script>
		window.location.href = 'reservation.php';
	</script>
	<?php
}

//add facility
if (isset($_POST['addFacility'])) {
	$image = explode('.', $_FILES['image']['name']);
	$image = uniqid().'.'.end($image);
	$name = $_POST['name'];
	$description = $_POST['description'];

	$sql = mysqli_query($conn,"SELECT * from facilities where name='$name'");
	$rows = mysqli_num_rows($sql);

	if ($rows > 0) {
		?>
		<script>
			alert("Facility already exists..!");
			window.location.href = 'facilities.php';
		</script>
		<?php
	} else {
		$sql = mysqli_query($conn,"INSERT into facilities values('','$name','$description','$image')");
		move_uploaded_file($_FILES['image']['tmp_name'], 'uploaded_files/'.$image);
		?>
		<script>
			alert("New Facility Added..!");
			window.location.href = 'facilities.php';
		</script>
		<?php
	}
}

//update facility
if (isset($_POST['updateFacility'])) {
	$id = $_GET['id'];
	$name = $_POST['name'];
	$description = $_POST['description'];
	
	$sql = mysqli_query($conn,"UPDATE facilities set name='$name',description='$description' where id='$id'");
	?>
	<script>
		alert("Facility Updated..!");
		window.location.href = 'facilities.php';
	</script>
	<?php

}

//delete facility
if (isset($_GET['deleteFacility'])) {
	$id = $_GET['id'];

	mysqli_query($conn,"DELETE from facilities where id='$id'");
	?>
	<script>
		alert("Deleted..!");
		window.location.href ='facilities.php';
	</script>
	<?php
}

//announce
if (isset($_POST['announce'])) {
	$message = $_POST['message'];

	$sql = mysqli_query($conn,"INSERT into announcements values('','$message',current_timestamp)");
	?>
	<script>
		alert("Announcement Added..!");
		window.location.href = 'announcements.php';
	</script>
	<?php
}

//update announcement
if (isset($_POST['updateAnnouncement'])) {
	$id = $_GET['id'];
	$message = $_POST['message'];

	$sql = mysqli_query($conn,"UPDATE announcements set message='$message' where id='$id'");
	?>
	<script>
		alert("Announcement Updated..!");
		window.location.href = 'announcements.php';
	</script>
	<?php
}

//update announcement
if (isset($_GET['deleteAnnouncement'])) {
	$id = $_GET['id'];

	$sql = mysqli_query($conn,"DELETE from announcements where id='$id'");
	?>
	<script>
		alert("Announcement Deleted..!");
		window.location.href = 'announcements.php';
	</script>
	<?php
}

