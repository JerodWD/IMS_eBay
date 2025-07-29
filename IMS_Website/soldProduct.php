<?php
	//Drop down list connection
	$servername = 'localhost';
    $username = 'pma';
    $password = '5257';
    $dbname = 'testdb';
	$conn = new PDO("mysql:host=$servername;dbname=inventory_ebay", $username, $password);
	$queryDropDown = "SELECT title FROM inventorydata";
	$stmtDropDown = $conn->prepare($queryDropDown);
	$stmtDropDown->execute();	 
	$resultDropDown=$stmtDropDown->fetchAll();

	// Delcare null/empty string
	$title = "";
	$cogs = "";
	$quantityBought = "";
	$datetimebought = "";

	if(($_POST)){
		//Connect to Database
		include('database/connection.php');

		// Display Queried Result
		if(isset($_POST['dropDownSelection']))
		{
			try{
				$title = $_POST['dropDownSelection'];
				$query = "SELECT * FROM inventorydata WHERE title = :title";
				$stmt = $conn->prepare($query);
				$result = $stmt->execute(array(":title"=>$title));
				if($result){
					foreach($stmt as $row)
					{
						$title = $row['title'];
						$cogs = $row['cogs'];
						$quantitybought = $row['quantitybought'];
						$datetimebought = $row['datetimebought'];
					}
				}
			} catch(\Exception $e){
				$error_message = "Invalid Value(s)";
			} catch(\Error $e){
				$error_message = $e->getMessage();
			}
		}
		// Update Queried Result
		if(isset($_POST['soldDate'], $_POST['addSalePrice'], $_POST['soldQuantity']))
		{
			$datetimesold = $_POST['soldDate'];
			$saleprice = $_POST['addSalePrice'];
			$quantitysold = $_POST['soldQuantity'];
			$title = $_POST['title'];
			if(isset($_POST['updateBtn']))
			{
				try{
					$query = "UPDATE inventorydata SET datetimesold = '$datetimesold', saleprice = '$saleprice', quantitysold = '$quantitysold' WHERE title = '$title'";
					$stmt = $conn->prepare($query);
					$result = $stmt->execute();
				} catch(\Exception $e){
					$error_message = "Invalid Value(s)";
				} 	catch(\Error $e){
					$error_message = $e->getMessage();
				}
			}
		}
	}
?>
<!--HomePage-->
<!DOCTYPE html>
<html>
<head>
	<title>Inventory Management System</title>
	<link rel="stylesheet" type="text/css" href="css/homepage.css">
	<!--Below might not work. https://fontawesome.com/v4/get-started/-->
	<script src="https://use.fontawesome.com/0c7a3095b5.js"></script>
</head>
<body>
	<div class="banner">
		<div class="homepageContainer">
			<div class="addButtonBannerHeader">
				<!--Load in Queried Record Here-->
				<form action="soldProduct.php" method="POST">
				<center>
					<h2>Search Inventory</h2>
					<select id="searchResults" name="dropDownSelection">
						<option>-- Select Title --</option>
						<?php foreach ($resultDropDown as $output) {?>
						<option><?php echo $output["title"]; ?></option>
						<?php } ?>
					</select>
					<input type="submit" value="Submit" name ="submitSoldBtn" target="_self">
				</center>
				<!--JQuery Search. Try to get working for search function with drop down-->
				<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
				<script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.jquery.min.js"></script>
				<link href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.min.css" rel="stylesheet"/>
				<script>
					$("$searchResults").chosen();
				</script>
					<div class="addTitle">
						<div class="formContainer">
							<input name="title" type="text" value="<?php echo $title;?>" size="100" placeholder="Title"/>
						</div>
					</div>
					<div class="addCOG">
						<div class="formContainer">
							<div class="addAlignedBoxes">
								<p id="titleBoxID3">COGS</p>
								<input name="cogs" type="number" value="<?php echo $cogs;?>" step="0.01" size="22" placeholder="cogs"/>
							</div>
						</div>
					</div>
					<div class="addQuantity">
						<div class="formContainer">
							<div class="addAlignedBoxes">
								<p id="titleBoxID4">Quantity Bought</p>
								<input name = "quantitybought" value="<?php echo $quantitybought;?>" id="addQuantityID" type="number" placeholder="quantity" min="1" max="1000"/>
							</div>
						</div>
					</div>
					<div class="addDate">
						<div class="addDateSub">
							<div class="formContainer">
								<div class="addAlignedBoxes">
									<p id="titleBoxID">Date Bought</p>
									<input name = "datetimebought" value="<?php echo $datetimebought;?>" id="addedTitleBox" type="datetime-local" size="90"/>
								</div>
							</div>
						</div>
					</div>

				<!-- Update Record Here-->
				<div class="soldDate">
					<div class="soldDateSub">
						<div class="formContainer">
							<div class="searchAlignedBoxes">
								<p id="titleBoxID2">Date Sold</p>
								<input name="soldDate" id="searhTitleBox" type="datetime-local" size="90" />
							</div>
						</div>
					</div>
				</div>
				<div class="addSalePrice">
					<div class="formContainer">
						<div class="searchAlignedBoxes">
							<p id="titleBoxID5">Sale Price</p>
							<input name="addSalePrice" id="addSalePriceID" type="number" step="0.01" placeholder="Sale Price" size="22"/>
						</div>
					</div>
				</div>
				<div class="soldQuantity">
					<div class="formContainer">
						<div class="searchAlignedBoxes">
							<p id="titleBoxID6">Quantity Sold</p>
							<input name="soldQuantity" id="addQuantityID" type="number" placeholder="Quantity" min="1" max="1000"/>
						</div>
					</div>
				</div>
				<div class="updateButton">
					<div class="formContainer">
						<button id="addSubmitID" name="updateBtn" type="submit">Update</button>
					</div>
				</div>
			</form>
			</div>
		</div>
	</div>
	<div class="socials">
		<div class="homepageContainer">
			<h3 class="socialHeader">Get in Touch Below</h3>
			<p class="socialSubHeader">Social Media Listed Below</p>
			<div class="sociaIconsContainer">
				<a href=""><i class="fa fa-twitter"></i></a>
				<a href=""><i class="fa fa-facebook"></i></a>
				<a href=""><i class="fa fa-linkedin"></i></a>
				<a href=""><i class="fa fa-youtube"></i></a>
			</div>
		</div>
	</div>
	<div class="footer">
		<div class="homepageContainer">
			<a href="https://www.ebay.com/usr/farejarelistings">Contact</a>
			<a href="">Website</a>
			<a href="">Email</a>
			<a href="">Policy</a>
		</div>
	</div>
</body>
</html>