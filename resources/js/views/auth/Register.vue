<template>
<!-- Start Contact -->
	<section id="contact-us" class="contact-us section">
		<div class="container">
			<div class="contact-head">
				<div class="d-flex justify-content-center">
					<div class="col-lg-5 col-12">
						<div class="form-main">
							<div class="title d-flex justify-content-center fw-bolder">
								<h4>Register</h4>
							</div>
							<form class="form" @submit.prevent="register">
								<div class="row">
									<div class="col-lg-12 col-12">
										<div class="form-group">
											<label>Your Name<span>*</span></label>
											<input v-model="name" type="text" placeholder="">
										</div>
									</div>
									<div class="col-lg-12 col-12">
										<div class="form-group">
											<label>Your Email<span>*</span></label>
											<input v-model="email" type="email" placeholder="">
										</div>	
									</div>
									<div class="col-lg-12 col-12">
										<div class="form-group">
											<label>Password<span>*</span></label>
											<input v-model="password" type="password" placeholder="">
										</div>	
									</div>
									<div class="col-lg-12 col-12">
										<div class="form-group">
											<label>Phone Number<span>*</span></label>
											<input v-model="phone" type="phone" placeholder="">
										</div>	
									</div>
									<div class="col-12">
										<div class="form-group button">
											<button type="submit" class="btn btn-block ">REGISTER</button>
										</div>
										<p class="fw-bolder">Already have account?  <router-link to="/login" class="text-primary">Login here</router-link></p>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</template>

<script>
export default {
	data() {
		return {
			name: '',
			email: '',
			password: '',
			phone: '',
		}
	},
	methods: {
		register() {
			const data = {
				name: this.name,
				email: this.email,
				password: this.password,
				phone: this.phone,
			}
			this.axios.post('/user-register', data)
			.then(response => {
				console.log(response)
				this.$router.push('/login')
			}).catch(error => {
				console.log(error.response);
			})
		}
	}
}
</script>

<style>

</style>