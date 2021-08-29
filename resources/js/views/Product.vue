<template>
  <div>
      <h1>HALO INI HALAMAN PRODUCT</h1>
  </div>
</template>

<script>
// import Product from '../components/ProductComponent.vue'
export default {
  data() {
    return {
      products = '',
    }
  }, 
  methods: {
    getProduct() {
      this.axios.get('product').then(response => {
        this.products = response.data;
      })
    }
  }
}
</script>

<style>

</style>