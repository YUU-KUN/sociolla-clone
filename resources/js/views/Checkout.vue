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
                                <li class="active"><router-link to="">Checkout</router-link></li>
								<!-- <li><a href="index1.html">Home<i class="ti-arrow-right"></i></a></li> -->
								<!-- <li class="active"><a href="blog-single.html">Checkout</a></li> -->
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- End Breadcrumbs -->

		<pre>{{this.$route.params.cart}}</pre>
				
		<!-- Start Checkout -->
		<section class="shop checkout section">
			<div class="container">
				<div class="row"> 
					<div class="col-lg-8 col-12">
						<div class="checkout-form">
							<h2>Make Your Checkout Here</h2>
							<p>Please register in order to checkout more quickly</p>
							<!-- Form -->
							<form class="form" method="post" action="#">
								<div class="row">
									<div class="col-lg-6 col-md-6 col-12">
										<div class="form-group">
											<label>Full Name<span>*</span></label>
											<input type="text" v-model="profile.name" placeholder="" required="required">
										</div>
									</div>
									<div class="col-lg-6 col-md-6 col-12">
										<div class="form-group">
											<label>Email Address<span>*</span></label>
											<input type="email" v-model="profile.email" placeholder="" required="required">
										</div>
									</div>
									<div class="col-lg-6 col-md-6 col-12">
										<div class="form-group">
											<label>Phone Number<span>*</span></label>
											<input type="number" v-model="phone" placeholder="" required="required">
										</div>
									</div>
									<div class="col-lg-6 col-md-6 col-12">
										<div class="form-group">
											<label>Address<span>*</span></label>
											<input type="text" v-model="address" placeholder="" required="required">
										</div>
									</div>
									<div class="col-lg-6 col-md-6 col-12">
										<div class="form-group">
											<label>Province<span>*</span> {{province_id}}</label>
											<!-- <v-select v-model="province_id" :options="provinces"></v-select> -->
											<select v-model="province_id">
												<option v-for="province in provinces" :key="province.id" :value="province.id">{{province.name}}</option>
											</select>
										</div>
									</div>
									<div class="col-lg-6 col-md-6 col-12">
										<div class="form-group">
											<label>Regency<span>*</span> {{regency_id}}</label>
											<select v-model="regency_id">
												<option v-for="regency in regencies" :key="regency.id" :value="regency.id">{{regency.name}}</option>
											</select>
										</div>
									</div>
									<div class="col-lg-6 col-md-6 col-12">
										<div class="form-group">
											<label>District<span>*</span> {{district_id}}</label>
											<select v-model="district_id">
												<option v-for="district in districts" :key="district.id" :value="district.id">{{district.name}}</option>
											</select>
										</div>
									</div>
									<div class="col-lg-6 col-md-6 col-12">
										<div class="form-group">
											<label>Village<span>*</span> {{village_id}}</label>
											<select v-model="village_id">
												<option v-for="village in villages" :key="village.id" :value="village.id">{{village.name}}</option>
											</select>
										</div>
									</div>
									<div class="col-lg-6 col-md-6 col-12">
										<div class="form-group">
											<label>Postal Code<span>*</span></label>
											<input type="number" placeholder="" v-model="postal_code" required="required">
										</div>
									</div>
									<div class="col-lg-6 col-md-6 col-12">
											<!-- <div class="custom-file">
												<input type="file" class="custom-file-input" id="customFileLang" lang="en">
												<label class="custom-file-label" for="customFileLang">Select file</label>
											</div> -->
										<div class="form-group">
											<label for="formFile" class="form-label">Payment Image</label>
  											<input class="form-control" type="file" id="formFile" @change="uploadImage">
										</div>
									</div>
								</div>
							</form>
							<!--/ End Form -->
						</div>
					</div>
					<div class="col-lg-4 col-12">
						<div class="order-details">
							<!-- Order Widget -->
							<div class="single-widget">
								<h2>CART  TOTALS</h2>
								<div class="content">
									<ul>
										<li>Sub Total<span>{{getCartTotal | rupiah}}</span></li>
										<li>(+) Shipping<span>FREE</span></li>
										<!-- <li>(+) Shipping<span>$10.00</span></li> -->
										<!-- <li class="last">Total<span>$340.00</span></li> -->
										<li class="last">Total<span>{{getCartTotal | rupiah}}</span></li>
									</ul>
								</div>
							</div>
							<!--/ End Order Widget -->
							<!-- Order Widget -->
							<div class="single-widget">
								<h2>Payments</h2>
								<div class="content">
									<div class="checkbox">
										<label class="checkbox-inline" for="1"><input name="updates" id="1" type="checkbox"> Check Payments</label>
										<label class="checkbox-inline" for="2"><input name="news" id="2" type="checkbox"> Cash On Delivery</label>
										<label class="checkbox-inline" for="3"><input name="news" id="3" type="checkbox"> PayPal</label>
									</div>
								</div>
							</div>
							<!--/ End Order Widget -->
							<!-- Payment Method Widget -->
							<div class="single-widget payement">
								<div class="content">
									<img src="assets/images/payment-method.png" alt="payment methods">
								</div>
							</div>
							<!--/ End Payment Method Widget -->
							<!-- Button Widget -->
							<div class="single-widget get-button">
								<div class="content">
									<div class="button">
										<a href="#" @click="proceedCheckout" class="btn">proceed checkout</a>
									</div>
								</div>
							</div>
							<!--/ End Button Widget -->
						</div>
					</div>
				</div>
			</div>
		</section>
		<!--/ End Checkout -->
		
		<!-- Start Shop Services Area  -->
		<section class="shop-services section home">
			<div class="container">
				<div class="row">
					<div class="col-lg-3 col-md-6 col-12">
						<!-- Start Single Service -->
						<div class="single-service">
							<i class="ti-rocket"></i>
							<h4>Free shiping</h4>
							<p>Orders over $100</p>
						</div>
						<!-- End Single Service -->
					</div>
					<div class="col-lg-3 col-md-6 col-12">
						<!-- Start Single Service -->
						<div class="single-service">
							<i class="ti-reload"></i>
							<h4>Free Return</h4>
							<p>Within 30 days returns</p>
						</div>
						<!-- End Single Service -->
					</div>
					<div class="col-lg-3 col-md-6 col-12">
						<!-- Start Single Service -->
						<div class="single-service">
							<i class="ti-lock"></i>
							<h4>Sucure Payment</h4>
							<p>100% secure payment</p>
						</div>
						<!-- End Single Service -->
					</div>
					<div class="col-lg-3 col-md-6 col-12">
						<!-- Start Single Service -->
						<div class="single-service">
							<i class="ti-tag"></i>
							<h4>Best Peice</h4>
							<p>Guaranteed price</p>
						</div>
						<!-- End Single Service -->
					</div>
				</div>
			</div>
		</section>
		<!-- End Shop Services -->

		{{checkCartData}}
		{{cekProvince}}
		{{cekRegency}}
		{{cekDisctrict}}
  </div>
</template>

<script>
export default {
	data() {
		return {
			checkouts: '',
			profile: '',
			phone: '',
			address: '',
			postal_code: '',
			payment_image: '',

			provinces: '',
			regencies: '',
			districts: '',
			villages: '',

			province_id: '',
			regency_id: '',
			district_id: '',
			village_id: '',
		}
	},
	methods: {
		getCheckout() {
			this.checkouts = this.$route.params.cart
		},
		getProfile() {
			this.axios.get('profile').then(response => {
				console.log(response.data)
				this.profile = response.data;
			}).catch(error => {
				console.log(error.response)
			})
		},
		uploadImage(event) {
            this.payment_image = event.target.files[0]
        },
		proceedCheckout() {
			const data = new FormData()
			data.append('address', this.address)
			data.append('province_id', this.province_id)
			data.append('regency_id', this.regency_id)
			data.append('district_id', this.district_id)
			data.append('village_id', this.village_id)
			data.append('payment_image', this.payment_image)
			data.append('total', this.$route.params.total)
			data.append('cart', this.$route.params.cart)

			// const  data = {
			// 	cart: this.checkouts,
			// 	total: this.total,
			// 	address: this.total
			// }

			this.axios.post('transaction', data).then(response => {
				console.log(response.data)
			}).catch(error => {
				console.log(error.response)
			})
		},
		getProvince() {
			this.axios.get('province').then(response => {
				this.provinces = response.data;
			}).catch(error => {
				console.log(error.response)
			})
		},
		getRegency() {
			this.axios.get('regency/'+this.province_id).then(response => {
				this.regencies = response.data;
			}).catch(error => {
				console.log(error.response)
			})
		},
		getDisctrict() {
			this.axios.get('district/'+this.regency_id).then(response => {
				this.districts = response.data;
			}).catch(error => {
				console.log(error.response)
			})
		},
		getVillage() {
			this.axios.get('village/'+this.district_id).then(response => {
				this.villages = response.data;
			}).catch(error => {
				console.log(error.response)
			})
		}
	},
	computed: {
		getCartTotal() {
			// for (let index = 0; index < this.checkouts.length; index++) {
			// 	this.cartTotal =+ this.checkouts[index].total;
			// }
			return this.$route.params.total
		},
		cekProvince() {
			if (this.province_id) {
				this.getRegency()
			}
		},
		cekRegency() {
			if (this.regency_id) {
				this.getDisctrict()
			}
		},
		cekDisctrict() {
			if (this.district_id) {
				this.getVillage()
			}
		},
		checkCartData() {
			if (!this.$route.params.cart) {
				this.$router.push('/cart')
			}
		}
	},
	mounted() {
		this.getCheckout()
		this.getProfile()
		this.getProvince()

	}
}
</script>