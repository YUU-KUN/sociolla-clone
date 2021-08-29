<template>
<!-- Start Contact -->
	<section id="contact-us" class="contact-us section">
		<div class="container">
			<div class="contact-head">
				<div class="d-flex justify-content-center">
					<div class="col-lg-5 col-12">
						<div class="form-main">
							<div class="title d-flex justify-content-center fw-bolder">
								<h4>Login</h4>
							</div>
							<form class="form" @submit.prevent="login">
								<div class="row">
									<div class="col-lg-12 col-12">
										<div class="form-group">
											<label>Email</label>
											<input v-model="email" type="email" placeholder="">
										</div>	
									</div>
									<div class="col-lg-12 col-12">
										<div class="form-group">
											<label>Password</label>
											<input v-model="password" type="password" placeholder="">
										</div>	
									</div>
									<div class="col-12">
										<div class="form-group button">
											<button type="submit" class="btn btn-block ">LOGIN</button>
										</div>
										<p class="fw-bolder">Don't have account? <router-link to="/register" class="text-primary">Create one</router-link></p>
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
			email: '',
			password: '',
		}
	},
	methods: {
		login(){
			let email = this.email
			let password = this.password
            this.$store.dispatch('login', { email, password })
            .then((response) => {
                this.message = response.data.message
				alert(this.message)
                this.$router.push('/')
            })
            .catch(err => console.log(err))
        }
	}
}
</script>

<style>

</style>