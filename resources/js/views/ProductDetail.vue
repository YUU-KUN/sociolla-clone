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

	<!-- <pre>{{product}}</pre> -->
	<!-- Start Contact -->
	<section id="contact-us" class="contact-us section">
		<div class="container">
				<div class="contact-head">
					<div class="row">
                        <div class="col-lg-4 col-12">
							<div class="single-head d-flex justify-content-center" style="height: 100%">
								<div class="single-info">
									<!-- <i class="fa fa-phone"></i> -->
                                    <img v-if="product.product_gallery" class="default-img" :src="'/product_image/'+ product.product_gallery[0].image" :alt="product.product_gallery[0].image" >
                                    <img v-else class="default-img" src="images/image-not-available.png" alt="#" >
                                    <!-- <img class="default-img" src="images/550/1.jpg" alt="#" > -->
								</div>
							</div>
						</div>
                        
						<div class="col-lg-8 col-12">
							<div class="form-main">
								<div class="title mb-2">
									<h4 class="text-capitalize" v-if="product.brand">{{product.brand.name}}</h4>
									<h3 class="text-capitalize">{{product.title}}</h3>
									<p>{{product.name}}</p>
								</div>
                                <div class="d-flex mb-2">
                                    <div class="star-rating mr-2" v-if="product.rating">
                                        <i v-for="rating in (product.rating).toFixed()" :key="rating" class="ti-star" style="color:yellow"></i>
                                    </div>
                                    <div class="number-rating">
                                        <span class="fw-bolder">{{product.rating}}</span> <span class="mx-1">({{product.totalRating}} reviews)</span>
                                    </div>
                                </div>
                                <div class="product-price d-flex mb-2">
                                    <span class="text-decoration-line-through mr-2" v-if="product.discount > 0">{{product.price | rupiah}}</span>
                                    <span class="text-danger fw-bolder fs-5">{{product.price | rupiah}}</span>
                                </div>
                                <div class="product-discount-persentage fw-bolder text-danger mb-2" v-if="product.discount > 0">
                                    -{{product.discount}}%
                                </div>
                                <!-- <div class="quantity">
                                    <label for="sb-inline">Quantity</label>
                                    <b-form-spinbutton id="sb-inline" inline></b-form-spinbutton>
                                </div> -->
								<div class="d-flex">
									<router-link to="/cart">
										<button @click="addToCart(product.id)" class="btn btn-addCart fw-bolder">Add to Cart</button>	
									</router-link>
									<router-link to="/checkout">
										<button class="btn btn-buy fw-bolder">Buy Now</button>
									</router-link>
								</div>
								<div class="d-flex mt-5">
									<b-tabs content-class="mt-3">
										<b-tab title="Desciption" active>
											{{product.description}}
											<!-- Lorem ipsum dolor sit amet consectetur adipisicing elit. Totam maxime, ab corporis tenetur officia, eum nulla, consequuntur adipisci sequi eaque quod eligendi cum pariatur dignissimos. Inventore perferendis voluptate obcaecati similique! -->
										</b-tab>
										<b-tab title="How to Use">
											Lorem ipsum dolor sit amet consectetur adipisicing elit. Libero, tempore id illo placeat veritatis ea quidem vel repudiandae ipsum numquam recusandae non in?
										</b-tab>
									</b-tabs>
								</div>
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
	data() {
		return {
			product: '',
		}
	},
	methods: {
		getProduct() {
			const product_id = this.$route.params.product_id
			this.axios.get('product/'+product_id).then(response => {
				this.product = response.data
			}).catch(error => {
				console.log(error.response)
			})
		},
		addToCart() {
			const data = {
				product_id: this.product.id,
			}
			this.axios.post('cart', data).then(response => {
				console.log(response.data)
			}).catch(error => {
				console.log(error.response)
			})
		}
	},
	mounted() {
		this.getProduct()	
	}
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