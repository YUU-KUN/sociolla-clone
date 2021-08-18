<template>
<div>
      <!-- Breadcrumbs -->
	<div class="breadcrumbs">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="bread-inner">
						<ul class="bread-list">
                            <li><router-link to="/">Home<i class="ti-arrow-right"></i></router-link></li>
                            <li class="active"><router-link to="/contact">Product Detail</router-link></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Breadcrumbs -->

	<!-- Start Contact -->
	<section id="contact-us" class="contact-us section">
		<div class="container">
				<div class="contact-head">
					<div class="row">
                        <div class="col-lg-4 col-12">
							<div class="single-head" style="height: 100%">
								<div class="single-info">
									<!-- <i class="fa fa-phone"></i> -->
                                    <img class="default-img" src="images/550/1.jpg" alt="#" >
								</div>
							</div>
						</div>
                        
						<div class="col-lg-8 col-12">
							<div class="form-main">
								<div class="title mb-2">
									<h4>Loreal Paris</h4>
									<h3>Infallible Pro-Matte Powder</h3>
								</div>
                                <div class="d-flex mb-2">
                                    <div class="star-rating mr-2">
                                        <i class="ti-star"></i>
                                        <i class="ti-star"></i>
                                        <i class="ti-star"></i>
                                        <i class="ti-star"></i>
                                    </div>
                                    <div class="number-rating">
                                        <span class="fw-bolder">4</span> <span class="mx-1">(256 reviews)</span>
                                    </div>
                                </div>
                                <div class="product-price d-flex mb-2">
                                    <span class="text-red text-decoration-line-through mr-2">Rp 209.000</span>
                                    <span class="text-danger fw-bolder fs-5">Rp 146.000</span>
                                </div>
                                <div class="product-discount-persentage fw-bolder text-danger mb-2">
                                    -25%
                                </div>
                                <!-- <div class="quantity">
                                    <label for="sb-inline">Quantity</label>
                                    <b-form-spinbutton id="sb-inline" inline></b-form-spinbutton>
                                </div> -->
								<div class="d-flex">
									<!-- <a href="" class="btn btn-outline-danger fw-bolder"><p>Add to Bag</p></a>
									<a href="" class="btn btn-outline-danger fw-bolder"><p>Add to Bag</p></a> -->
									<!-- <div class="col-5">
									</div> -->
									<router-link to="/cart">
										<button class="btn btn-addCart fw-bolder">Add to Bag</button>	
									</router-link>
									<router-link to="/checkout">
										<button class="btn btn-buy fw-bolder">Buy Now</button>
									</router-link>
								</div>
								<div class="d-flex mt-5">
									<b-tabs content-class="mt-3">
										<b-tab title="Desciption" active>
											Lorem ipsum dolor sit amet consectetur adipisicing elit. Totam maxime, ab corporis tenetur officia, eum nulla, consequuntur adipisci sequi eaque quod eligendi cum pariatur dignissimos. Inventore perferendis voluptate obcaecati similique!
										</b-tab>
										<b-tab title="How to Use">
											Lorem ipsum dolor sit amet consectetur adipisicing elit. Libero, tempore id illo placeat veritatis ea quidem vel repudiandae ipsum numquam recusandae non in?
										</b-tab>
									</b-tabs>
									<!-- <ul class="nav nav-tabs">
										<li class="nav-item">
											<a class="nav-link active" aria-current="page" href="#">Active</a>
										</li>
										<li class="nav-item">
											<a class="nav-link" href="#">Link</a>
										</li>
										<li class="nav-item">
											<a class="nav-link" href="#">Link</a>
										</li>
										<li class="nav-item">
											<a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
										</li>
									</ul> -->
								</div>

                                <!-- <div class="row">
                                    <div class="col-3">
                                        <b-form-rating id="rating-inline" inline value="4" size="sm" no-border></b-form-rating>
                                    </div>
                                </div> -->

								<!-- <form class="form" method="post" action="mail/mail.php">
									<div class="row">
										<div class="col-lg-6 col-12">
											<div class="form-group">
												<label>Your Name<span>*</span></label>
												<input name="name" type="text" placeholder="">
											</div>
										</div>
										<div class="col-lg-6 col-12">
											<div class="form-group">
												<label>Your Subjects<span>*</span></label>
												<input name="subject" type="text" placeholder="">
											</div>
										</div>
										<div class="col-lg-6 col-12">
											<div class="form-group">
												<label>Your Email<span>*</span></label>
												<input name="email" type="email" placeholder="">
											</div>	
										</div>
										<div class="col-lg-6 col-12">
											<div class="form-group">
												<label>Your Phone<span>*</span></label>
												<input name="company_name" type="text" placeholder="">
											</div>	
										</div>
										<div class="col-12">
											<div class="form-group message">
												<label>your message<span>*</span></label>
												<textarea name="message" placeholder=""></textarea>
											</div>
										</div>
										<div class="col-12">
											<div class="form-group button">
												<button type="submit" class="btn ">Send Message</button>
											</div>
										</div>
									</div>
								</form> -->
							</div>
						</div>
						
					</div>
				</div>
			</div>
	</section>
	<!--/ End Contact -->
  </div>
</template>

<script>
export default {

}
</script>

<style scoped>
.btn {
	margin: 2px;
	width:auto;
	/* width: 150px; */
	height: 50px;
	border: 1px solid rgb(245, 38, 38);
	border-radius: 3px;
	
}

/* .btn:hover {
	background: red;
	transition: .5s;
	color: white;
} */

.btn-addCart {
	background: none;
	color: black;
}

.btn-addCart:hover {
	background: #da2a52;
	transition: .5s;
	color: white;
}

.btn-buy {
	background: #da2a52;
	color: white;
}
.btn-buy:hover {
	background: none;
	transition: .5s;
	color: #da2a52;
	/* transform: rotate(180deg); */
	/* transition: background .5s; */
}
</style>