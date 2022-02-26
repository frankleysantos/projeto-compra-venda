require('./bootstrap');

window.Vue = require('vue').default;

import Vue from 'vue';
import store from './store/store'
import VueTheMask from 'vue-the-mask';
Vue.use(VueTheMask);

import VueMask from 'v-mask';
Vue.use(VueMask);

import Snotify from 'vue-snotify'
Vue.use(Snotify)

import { BootstrapVue, IconsPlugin } from 'bootstrap-vue';
Vue.use(BootstrapVue);
Vue.use(IconsPlugin);

import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'

import moment from 'moment';
Vue.prototype.moment = moment

import Select2 from 'v-select2-component';

Vue.component('Select2', Select2);

// Vue.component('agenda-component', require('./components/Agenda/AgendaComponent.vue').default);
Vue.component('home-component', require('./components/Home/HomeComponent.vue').default);
//ofertas-cadastro e lista de vendedor
Vue.component('oferta-component', require('./components/Oferta/OfertaComponent.vue').default);
Vue.component('form-oferta-component', require('./components/Oferta/FormComponent.vue').default);
Vue.component('select-produtos-component', require('./components/Oferta/SelectProdutosComponent.vue').default);
Vue.component('minhas-ofertas-component', require('./components/Oferta/MinhasOfertasComponent.vue').default);

//produtos
Vue.component('oferta-produtos-component', require('./components/Produto/ProdutoComponent.vue').default);
Vue.component('negociacao-produtos-component', require('./components/Produto/Negociacao/NegociacaoComponent.vue').default);


const app = new Vue({
    store,
    el: '#app',
});
