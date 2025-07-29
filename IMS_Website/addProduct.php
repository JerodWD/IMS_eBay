<?php
	$error_message = '';
	if($_POST){
		//Connect to Database
		include('database/connection.php');

		if(isset($_POST['title'], $_POST['cogs'], $_POST['quantityBought'], $_POST['dateTimeBought']))
		{
			$title = $_POST['title'];
			$cogs = $_POST['cogs'];
			$quantityBought = $_POST['quantityBought'];
			$dateTimeBought = $_POST['dateTimeBought'];
		}

		if(isset($_POST['submit']))
		{
			echo "Test Input";
			try{
				$query = "INSERT INTO inventorydata (title, cogs, saleprice, quantitybought, datetimebought, datetimesold, quantitysold) VALUE ('$title', '$cogs', NULL, '$quantityBought', '$dateTimeBought', NULL, NULL)";
				$stmt = $conn->prepare($query);
				$result = $stmt->execute();
				$insertedRecordTitle = $title;
				$insertedRecordId= $conn->LastInsertId();
				//var_dump($query);
			} catch(\Exception $e){
				$error_message = "Invalid Value(s)";
			} catch(\Error $e){
				$error_message = $e->getMessage();
			}
		}
	}
	// Clear title and id

?>
<!--addProductPage-->
<!DOCTYPE html>
<html>
<head>
	<title>Inventory Management System</title>
	<link rel="stylesheet" type="text/css" href="css/homepage.css">
	<link rel="stylesheet" href="php_css.php" media="screen">
	<!--Below might not work. https://fontawesome.com/v4/get-started/-->
	<script src="https://use.fontawesome.com/0c7a3095b5.js"></script>
</head>
<body>
	<div class="banner">
		<div class="homepageContainer">
			<div>
				<!--Database Error Message if connection issue-->
				<?php 
					if(!empty($error_message)){ ?>
						<span id="errorMessage"><p>Error: <?= $error_message ?></p></span>
				<?php }
				// wait 8 seconds then clear the error message
				//sleep(8);
				//$error_message == False;
				?>

				<!--Database Error Message if connection issue-->
				<td style='text-align: center;'>
					<?php
						if(!empty($insertedRecordTitle)){ ?>
							<span style="color: #008000" id="errorMessage"><p>Added '<?= $insertedRecordTitle?>' to records</p></span>
							<span style="color: #008000" id="errorMessage"><p>ID '<?= $insertedRecordId?>'</p></span>
							
					<?php }
					// wait 8 seconds then clear the error message
					//sleep(8);
					//$insertedRecordTitle = False;
					?>
				</td>
			</div>
			<!--Test for addProductPage-->
			<div class="addButtonBannerHeader">
				<h2>Add Product to Inventory</h2>
				<form action="addProduct.php" method="POST">
					<div class="addTitle">
						<div class="formContainer">
							<input type="text" size="100" placeholder="Title" name="title"/>
						</div>
					</div>
					<div class="addCOG">
						<div class="formContainer">
							<input type="number" step="0.01" size="22" placeholder="COGS" name="cogs"/>
						</div>
					</div>
					<div class="addQuantity">
						<div class="formContainer">
							<input id="addQuantityID" type="number" placeholder="Quantity" min="1" max="1000" name="quantityBought"/>
						</div>
					</div>
					<div class="addDate">
						<div class="formContainer">
							<input type="datetime-local" placeholder="DateTime" name="dateTimeBought"/>
						</div>
					</div>
					<div class="lineButtonsAddPage">
						<div class="submitButton">
							<div class="formContainer">
								<button id="addSubmitID" name="submit">Submit</button>
							</div>
						</div>
						<div class="resetButton">
							<div class="formContainer">
								<button id="addResetID" name="reset" type="reset">Reset</button>
							</div>
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
