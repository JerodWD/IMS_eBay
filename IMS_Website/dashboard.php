<!--HomePage-->
<!DOCTYPE html>
<html>
<head>
	<title>Dashboard | IMS</title>
	<link rel="stylesheet" type="text/css" href="css/dashboard.css">
	<!--Below might not work. https://fontawesome.com/v4/get-started/-->
	<script src="https://use.fontawesome.com/0c7a3095b5.js"></script>
</head>
<body>
	<div id="dashboardMainContainer">
		<div class="dashboard_sidebar" id="dashboard_sidebar_id">
			<h3 class="dashboard_logo" id="dashboard_logo_id">IMS</h3>
			<div class="dashboard_sidebar_user">
				<img src="Images/eBay.jpg" alt="User image." id="ebayImg_id"/>
				<span class="menuText">FareJareListings</span>
			</div>
			<div class="dashboard_sidebar_menus">
				<ul class="dashboard_menu_lists">
					<li>
						<a href="homepage.php"><i class="fa fa-home"></i><span class="menuText">Home</span></a>
					</li>
					<li>
						<a href="addProduct.php"><i class="fa fa-plus"></i><span class="menuText">Add  Product</span></a>
					</li>
					<li>
						<a href="soldProduct.php"><i class="fa fa-search"></i><span class="menuText">Search  Product</span></a>
					</li>
				</ul>
			</div>
		</div>
		<div class="dashboard_content_container" id="dashboard_content_container_id">
			<div class="dashboard_topNav">
				<a href="javascript:void(0);" id="toggleBtn"><i class="fa fa-navicon"></i></a>
				<a href="homepage.php" id="homeBtn"><i class="fa fa-home"></i> Home Page</a>
			</div>
			<div class="dashboard_content">
				<div class="dashbaord_content_main">
				</div>
			</div>
		</div>
	</div>
<script>
	var sideBarIsOpen = true;

	toggleBtn.addEventListener('click', (event) => {
		event.preventDefault();

		if(sideBarIsOpen){
			dashboard_sidebar_id.style.width = '3%';
			dashboard_sidebar_id.style.transition = '0.2s all';
			dashboard_content_container_id.style.width = '90%';
			dashboard_logo_id.style.fontSize = '15px';
			ebayImg_id.style.width = '0px';
			ebayImg_id.style.height = '0px';
			ebayImg_id.style.border = '0px';
			menuIcons = document.getElementsByClassName('menuText');
			for(var i=0; i < menuIcons.length; i++){
				menuIcons[i].style.display= 'none';
			}
			sideBarIsOpen = false;
		}
		else{
			dashboard_sidebar_id.style.width = '15%';
			dashboard_sidebar_id.style.transition = '0.5s all';
			dashboard_content_container_id.style.width = '70%';
			dashboard_logo_id.style.fontSize = '80px';
			ebayImg_id.style.width = '60px';
			ebayImg_id.style.height = '40px';
			ebayImg_id.style.border = "2px solid #3333ff";
			menuIcons = document.getElementsByClassName('menuText');
			for(var i=0; i < menuIcons.length; i++){
				menuIcons[i].style.display= 'inline-block';
			}
			sideBarIsOpen = true;
		}
	});
</script>
</body>
</html>