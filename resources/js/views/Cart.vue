<template>
    <div>
        <!-- Breadcrumbs -->
        <div class="breadcrumbs">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="bread-inner">
                            <ul class="bread-list">
                                <li>
                                    <a href="index1.html"
                                        >Home<i class="ti-arrow-right"></i
                                    ></a>
                                </li>
                                <li class="active">
                                    <a href="blog-single.html">Cart</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Breadcrumbs -->

        <pre>{{carts}}</pre>

        <!-- Shopping Cart -->
        <div class="shopping-cart section">
            <div v-if="carts.length < 1" class="container text-center mb-5">
                <!-- <img src="images/100x100/1.jpg" alt="No Cart Item"> -->
                <h3>Oops, no item yet</h3>
            </div>
            <div v-else class="container">
                <div class="row">
                    <div class="col-12">
                        <!-- Shopping Summery -->
                        <table class="table shopping-summery">
                            <thead>
                                <tr class="main-hading">
                                    <th>PRODUCT</th>
                                    <th>NAME</th>
                                    <th class="text-center">UNIT PRICE</th>
                                    <th class="text-center">QUANTITY</th>
                                    <th class="text-center">TOTAL</th>
                                    <th class="text-center">
                                        <i class="ti-trash remove-icon"></i>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(cart, index) in carts" :key="cart.id">
                                    <td class="image" data-title="No">
                                        <img
                                            v-if="cart.product.product_gallery"
                                            :src="'product_image/'+cart.product.product_gallery[0].image"
                                            alt="#"
                                        />
                                        <!-- <img
                                            src="images/100x100/1.jpg"
                                            alt="#"
                                        /> -->
                                        <img
                                            v-else
                                            src="https://via.placeholder.com/100x100"
                                            alt="#"
                                        />
                                    </td>
                                    <td
                                        class="product-des"
                                        data-title="Description"
                                    >
                                        <p class="product-name">
                                            <a href="#">{{cart.product.title}}</a>
                                        </p>
                                        <p class="product-des">
                                            {{cart.product.name}}
                                        </p>
                                    </td>
                                    <td class="price" data-title="Price">
                                        <span v-if="cart.product.discount">{{cart.product.price_after_discount}}</span>
                                        <span v-else>{{cart.product.price | rupiah}}</span>
                                    </td>
                                    <td class="qty" data-title="Qty">
                                        <!-- Input Order -->
                                        <div class="input-group">
                                            <div class="button minus">
                                                <button
                                                    type="button"
                                                    class="btn btn-primary btn-number"
                                                    data-type="minus"
                                                    data-field="quant[1]"
                                                    @click="removeQuantity(index)"
                                                >
                                                    <i class="ti-minus"></i>
                                                </button>
                                            </div>
                                            <input
                                                type="text"
                                                name="quant[1]"
                                                class="input-number"
                                                data-min="1"
                                                data-max="100"
                                                v-model="cart.quantity"
                                            />
                                            <div class="button plus">
                                                <button
                                                    type="button"
                                                    class="btn btn-primary btn-number"
                                                    data-type="plus"
                                                    data-field="quant[1]"
                                                    @click="addQuantity(index)"
                                                >
                                                    <i class="ti-plus"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <!--/ End Input Order -->
                                    </td>
                                    <td class="total-amount" data-title="Total">
                                        <span>{{getTotalProduct(cart) | rupiah}}</span>
                                        <!-- <span v-if="cart.product.discount > 0">{{cart.product.price_after_discount * cart.quantity | rupiah}}</span>
                                        <span v-else>{{cart.product.price * cart.quantity | rupiah}}</span> -->
                                    </td>
                                    <td class="action" data-title="Remove">
                                        <a @click="removeCart(index)" style="cursor: pointer"
                                            ><i class="ti-trash remove-icon"></i
                                        ></a>
                                    </td>
                                </tr>
                               
                            </tbody>
                        </table>
                        <!--/ End Shopping Summery -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <!-- Total Amount -->
                        <div class="total-amount">
                            <div class="row">
                                <div class="col-lg-8 col-md-5 col-12">
                                    <div class="left">
                                        <div class="coupon">
                                            <form action="#" target="_blank">
                                                <input
                                                    name="Coupon"
                                                    placeholder="Enter Your Coupon"
                                                />
                                                <button class="btn">
                                                    Apply
                                                </button>
                                            </form>
                                        </div>
                                        <div class="checkbox">
                                            <label
                                                class="checkbox-inline"
                                                for="2"
                                                ><input
                                                    name="news"
                                                    id="2"
                                                    type="checkbox"
                                                />
                                                Shipping (+10$)</label
                                            >
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-7 col-12">
                                    <div class="right">
                                        <ul>
                                            <li>
                                                Cart Subtotal
                                                <span>{{getTotal | rupiah}}</span>
                                                <!-- <span>$330.00</span> -->
                                            </li>
                                            <li>Shipping<span>Free</span></li>
                                            <!-- <li>You Save<span>Rp 0</span></li> -->
                                            <li class="last">
                                                You Pay<span>{{getTotal | rupiah}}</span>
                                            </li>
                                        </ul>
                                        <div class="button5">
                                            <button @click="checkOut()" class="btn">Checkout</button>
                                            <button @click="redirecHome()" class="btn">Continue Shopping</button>
                                            <!-- <router-link to="/checkout" class="btn">Checkout</router-link> -->
                                            <!-- <router-link to="/" class="btn">Continue shopping</router-link> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/ End Total Amount -->
                    </div>
                </div>
            </div>
        </div>
        <!--/ End Shopping Cart -->

        <!-- Start Shop Services Area  -->
        <section class="shop-services section mb-5">
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
        <!-- End Shop Newsletter -->
    </div>
</template>

<script>
export default {
    data() {
        return {
            carts: '',
            total: 0,
            totalProduct: 0,
        }
    },
    methods: {
        getCart() {
            this.axios.get('cart').then(response => {
                this.carts = response.data;
                // this.total = response.data.total;
            }).catch(error => {
                console.log(error.response);
            })
        },
        addQuantity(index) {
            if (this.carts[index].quantity < this.carts[index].product.stock) {
                this.carts[index].quantity++;
                return
            }
            return
        },
        removeQuantity(index) {
            if (this.carts[index].quantity > 1) {
                this.carts[index].quantity--;
                return    
            }
            return    
        },
        redirecHome() {
            this.$router.push('/')
        },
        checkOut() {
            // const data = {
            //     cart: this.carts,
            //     total: this.total,
            // }
            if (!this.$store.getters.isLoggedIn) {
                this.$router.push('/login')
            } else {
                this.$router.push({
                    name: 'Checkout',
                    params: {
                        cart: this.carts,
                        total: this.total
                    }
                })
            }
            // this.axios.post('transaction', data).then(response => {
            //     console.log(response.data)
            //     this.$router.push('/checkout')
            // }).catch(error => {
            //     console.log(error.response);
            // })
        },
        getTotalProduct(cart) {
            if (cart.product.discount > 0) {
                this.totalProduct = cart.product.price_after_discount * cart.quantity;
                return this.totalProduct
            }
            return cart.product.price * cart.quantity
        },
        removeCart(index){
            const cart_id = this.carts[index].id
            this.axios.delete('cart/' + cart_id).then(response => {
                this.carts.splice(index, 1)
                this.getCart()
            }).catch(error => {
                console.log(error.response);
            })
        }
    },
    mounted() {
        this.getCart()
    },
    computed: {
        getTotal() {
            for (let index = 0; index < this.carts.length; index++) {
                if (this.carts[index].discount > 0) {
                    this.total =+ this.carts[index].product.price_after_discount * this.carts[index].quantity
                } else {
                    this.total =+ this.carts[index].product.price * this.carts[index].quantity
                }
            }
            return this.total
        },
        
    }
};
</script>

<style></style>
