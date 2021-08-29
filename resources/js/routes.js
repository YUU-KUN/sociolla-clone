import Vue from 'vue';
import store from './store';
import VueRouter from 'vue-router';

// import Product from './views/Product.vue'
import Dashboard from './views/Dashboard.vue'
import Cart from './views/Cart.vue'
import Checkout from './views/Checkout.vue'
import Contact from './views/Contact.vue'
import Blog from './views/Blog.vue'
import ProductDetail from './views/ProductDetail.vue'
import FAQ from './views/FAQ.vue'
import Affiliate from './views/Affiliate.vue'
import Shipping from './views/Shipping.vue'
import Account from './views/Account.vue'

// auth
import Register from './views/auth/Register.vue'
import Login from './views/auth/Login.vue'

// layouts
import DashboardHeader from './views/layouts/DashboardHeader.vue'
import Header from './views/layouts/Header.vue'
import Footer from './views/layouts/Footer.vue'
import Product from './views/layouts/Product.vue'
import Slider from './views/layouts/Slider.vue'
import StartMediumBanner from './views/layouts/StartMediumBanner.vue'
import StartSmallBanner from './views/layouts/StartSmallBanner.vue'

Vue.use(VueRouter)


export const routes = [
    // {
    //     name: 'home',
    //     path: '/',
    //     component: AllProduct
    // },
    // {
    //     name: 'create',
    //     path: '/create',
    //     component: CreateProduct
    // },
    // {
    //     name: 'edit',
    //     path: '/edit/:id',
    //     component: EditProduct
    // }

    {
      path: '/account',
      name: 'Account',
      component: Account
    },
    {
      path: '/shipping',
      name: 'Shipping',
      component: Shipping
    },
    {
      path: '/affiliate',
      name: 'Affiliate',
      component: Affiliate
    },
    {
      path: '/faq',
      name: 'FAQ',
      component: FAQ
    },
    {
      path: '/product-detail/:product_id',
      name: 'ProductDetail',
      components: {default: ProductDetail, Header, Footer}
    },
    {
      path: '/blog',
      name: 'Blog',
      components: {default: Blog, Header, Footer}
    },
    {
      path: '/contact',
      name: 'Contact',
      components: {default: Contact, Header, Footer}
    },
    {
      path: '/checkout',
      name: 'Checkout',
      components: {default: Checkout, Header, Footer}
    },
    {
      path: '/cart',
      name: 'Cart',
      components: {default: Cart, Header, Footer}
    },
    {
      path: '/',
      name: 'Dashboard',
      components: {default: Dashboard, DashboardHeader, Footer, Slider, StartSmallBanner},
      meta: {
        title: "Dashboard",
        requiresAuth: true
      }
    },
    {
      path: '/product',
      name: 'Product',
      components: {default: Product, Header, Footer}
    },
    {
      path: '/login',
      name: 'Login',
      component: Login
    },
    {
      path: '/register',
      name: 'Register',
      component: Register
    },
    {
      path: '/about',
      name: 'About',
      // route level code-splitting
      // this generates a separate chunk (about.[hash].js) for this route
      // which is lazy-loaded when the route is visited.
      component: () => import(/* webpackChunkName: "about" */ './views/About.vue')
    }
];

const router = new VueRouter({
  mode: 'hash',
  base: process.env.BASE_URL,
  routes
});

router.beforeEach((to, from, next) => {
  if(to.matched.some(record => record.meta.requiresAuth)) {
    if (store.getters.isLoggedIn) {
      next()
      return
    }
    next('/login') 
  } else {
    next() 
  }
})

export default router
