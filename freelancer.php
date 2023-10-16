

<?php include "nav.php";?>

<!DOCTYPE HTML>
<html>
	<head>
	<title>FreelanceWave | Freelancer</title>

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
	<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
	<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
	
	
		<style type="text/css">
			.image-container {
		  position: relative;
		  height: auto;
		}
		
		.image-text {
		  position: absolute;
		  top: 50%;
		  left: 50%;
		  transform: translate(-50%,-50%);
		  color: white;
		}
		.accordion{
		font-family: Arial, Helvetica, sans-serif;
		width: 100%;
		}

		.accordion-item {
		margin-bottom: 10px;
		}

		.accordion-title {
		color: #fff;
		background-color: #dc2b2b;
		cursor: pointer;
		padding: 10px;
		transition: background-color 1s;
		}

		.accordion-title:hover {
		background-color: #9a1616;
		}

		.accordion-content {
		background: lightgoldenrodyellow;
		display: none;
		padding: 10px;
	}

    .accordion-item.active .accordion-content{
      display: block;
    }
		</style>
</head>

<body>
	<section>
		<div class="container-fluid image-container">
  			<img src="images/freelnacer-money.jpg" alt="Find & Hire Expert Freelancers" style="width:100%;height: 450px;">
	  		<div class="container image-text">
	  			<div class="row text-dark">
	  				<div class="col-md-6 mt-2">
		  				<h1 class="ml-5 mt-5" style="font-size:40px;font-weight: bold;">Find Best Job</h1>
		    			<h3 class="mt-1 ml-5" style="font-size:26px">Work with the best clients on our secure, flexible<br>and cost-effective platform.</h3>
	  				</div>
	  			</div>	
	  		</div>
		</div>
	</section>

<!--information grid end here-->

<div class="section">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<div class="mt-5">
					<div class="container">
						<h2 class="font-weight-bold">How it works ?</h2>
						<div class="accordion mt-5">
							<div class="accordion-item">
								<div class="accordion-title">Complete your profile </div>
								<div class="accordion-content">
									<p style="font-size: 17px;">Select your skills and expertise
            							Upload a professional profile photo
            							Go through the Verification Center checklist .
									</p>
								</div>
							</div>
							<div class="accordion-item">
								<div class="accordion-title">Browse jobs that suit you </div>
								<div class="accordion-content">
									<p style="font-size: 17px;">We have jobs available for all skills. Maximize your job opportunities by optimizing your filters.
									Save your search and get alerted when relevant jobs are available. 
								</p>
								</div>
							</div>
							<div class="accordion-item">
								<div class="accordion-title">Write your best bid </div>
								<div class="accordion-content">
									<p style="font-size: 17px;">Put your best foot forward and write the best pitch possible. Read the project and let the clients know you understand their brief.
									Tell them why you're the best person for this job.
									Writing a new brief for each project is more effective than using the same one! .</p>
								</div>
							</div>
							<div class="accordion-item">
								<div class="accordion-title">Get awarded and earn</div>
								<div class="accordion-content">
									<p style="font-size: 17px;">Get ready to work once you get hired. Deliver high quality work and earn the agreed amount. </p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<img src="images/how-it-works.jpg" style="width: 100%; height: 400px;" class="mt-5 p-3">
			</div>
		</div>
	</div>
</div>
	
<script language="javascript">
		const accordionItems = document.querySelectorAll('.accordion-item');

		accordionItems.forEach(item =>
		{
			const title = item.querySelector('.accordion-title');
			const content = item.querySelector('.accordion-content');

			title.addEventListener('click', () =>
			{
				for (i = 0; i < accordionItems.length; i++)
				{
					if(accordionItems[i] != item)
					{
						accordionItems[i].classList.remove('active');
					}
					else
					{
						// toggle the accordion item
						item.classList.toggle('active');
					}
				}
			});
		});
	</script>

	<!--footer start here-->
		<?php include("footer.php"); ?>
	<!--footer end here-->
</body>
</html>

