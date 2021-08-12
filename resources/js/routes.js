import Home from './views/Home.vue'
// import Product from './views/Product.vue'
import Dashboard from './views/Dashboard.vue'

// layouts
import Header from './views/layouts/Header.vue'
import Footer from './views/layouts/Footer.vue'
import Product from './views/layouts/Product.vue'
import Slider from './views/layouts/Slider.vue'
import StartMediumBanner from './views/layouts/StartMediumBanner.vue'
import StartSmallBanner from './views/layouts/StartSmallBanner.vue'


// component
import ProductComponent from './components/ProductComponent.vue'

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
        path: '/',
        name: 'Dashboard',
        components: {default: Dashboard, Header, Footer, Slider}
      },
      {
        path: '/product',
        name: 'Product',
        // component: Product
        component: ProductComponent
      },
      {
        path: '/vue',
        name: 'Home',
        component: Home
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
