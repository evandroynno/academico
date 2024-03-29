
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example', require('./components/ExampleComponent.vue'));
Vue.component('card', require('./components/Card.vue'));
Vue.component('cad-notas', require('./components/cadNotas.vue'));
Vue.component('tabela-lista', require('./components/TabelaLista.vue'));
Vue.component('tabela-movimentacao', require('./components/TabelaMovimentacao.vue'));
Vue.component('status', require('./components/Status.vue'))

const app = new Vue({
    el: '#app'
});
