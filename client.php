
<!DOCTYPE HTML>
<html>
<head>
<title>FreelanceWave | Client</title>

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
<!--header start here-->
<div class="ml-5">
	<?php include "client-nav.php";?>	
</div>
<!--header end here-->
<!--banner start here-->
<section>
	<div class="container-fluid image-container">
		<img src="Images/second.png" alt="Find & Hire Expert Freelancers" style="width:100%;height: 450px;">
		<div class="container image-text">
			<div class="row">
				<div class="col-md-12">
					<h1 class="text-white ml-5 mt-3" style="font-size:40px;font-weight: bold;">Find & Hire Expert Freelancers</h1>
					<p class="mt-1 ml-5" style="font-size:24px">Work with the best freelance talent from around the world on our secure, flexible and cost-effective platform.</p>
					<div class="ml-4">
						<ul style="font-size:20px">
							<li>World's largest freelance marketplace</li>
							<li>Any job you can possibly think of</li>
							<li>Pay only when you're 100% happy</li>
						</ul>
					</div>
				</div>
			</div>	
		</div>
	</div>
</section>

<div class="section">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<div class="mt-5">
					<div class="container">
						<h2 class="font-weight-bold">How it works ?</h2>
						<div class="accordion mt-5">
							<div class="accordion-item">
								<div class="accordion-title">Post a Job</div>
								<div class="accordion-content">
									<p style="font-size: 17px;">It’s free and easy to post a job. Simply fill in a title, description and budget and competitive bids come within minutes.</p>
								</div>
							</div>
							<div class="accordion-item">
								<div class="accordion-title">Choose Freelancers</div>
								<div class="accordion-content">
									<p style="font-size: 17px;">No job is too big or too small. We've got freelancers for jobs of any size or budget, across 1800+ skills. No job is too complex. We can get it done!</p>
								</div>
							</div>
							<div class="accordion-item">
								<div class="accordion-title">Pay Safely</div>
								<div class="accordion-content">
									<p style="font-size: 17px;">Only pay for work when it has been completed and you're 100% satisfied with the quality using our milestone payment system.</p>
								</div>
							</div>
							<div class="accordion-item">
								<div class="accordion-title">We are here to help</div>
								<div class="accordion-content">
									<p style="font-size: 17px;">Our talented team of recruiters can help you find the best freelancer for the job and our technical co-pilots can even manage the project for you.</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<img src="Images/how-it-works.jpg" style="width: 100%; height: 400px;" class="mt-5 p-3">
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
	<?php include('footer.php'); ?>
<!--footer end here-->
</body>
</html>

