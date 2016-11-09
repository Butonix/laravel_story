
/**
 * First we will load all of this project's JavaScript dependencies which
 * include Vue and Vue Resource. This gives a great starting point for
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
var VueStrap = require('./vue-strap.min.js');
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the body of the page. From here, you may begin adding components to
 * the application, or feel free to tweak this setup for your needs.
 */

// Vue.component('example', require('./components/Example.vue'));
Vue.component('banner', require('./components/Banner.vue'));
Vue.component('navbar', require('./components/Navbar.vue'));
// Vue.component('modal-login', require('./components/ModalLogin.vue'));

window.onload = function() {
  const app = new Vue({
      el: '#app',
      data: {
        showRight: false,
            showTop: false
      },
      components: {
        modal: VueStrap.modal,
        alert: VueStrap.alert
      },
      methods: {
        transitionComplete: function (el) {
          // for passed 'el' that DOM element as the argument, something ...
        }
      }
  });
}
