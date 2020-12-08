/**
 * First we will load all of this register's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import Vuesax from 'vuesax';
import 'vuesax/dist/vuesax.css';
import 'material-icons/iconfont/material-icons.css';
Vue.use(Vuesax);

import CKEditor from '@ckeditor/ckeditor5-vue2';
Vue.use( CKEditor );

import SkeletonCards from 'vue-ultimate-skeleton-cards';
Vue.use(SkeletonCards);

import VueLazyload from 'vue-lazyload'
Vue.use(VueLazyload)
Vue.use(VueLazyload, {
    preLoad: 3,
    error: 'https://images.homify.com/c_fill,f_auto,q_0,w_740/v1526483607/p/photo/image/2561426/3.jpg',
    loading: 'https://images.homify.com/c_fill,f_auto,q_0,w_740/v1526483607/p/photo/image/2561426/3.jpg',
    attempt: 1
})


import CxltToastr from 'cxlt-vue2-toastr';
Vue.use(CxltToastr);
import 'cxlt-vue2-toastr/dist/css/cxlt-vue2-toastr.css';

import moment from 'moment';
import 'moment/locale/es';
window.moment = moment;
Vue.prototype.moment = moment
window.formatDate = function(value, format = "DD MMMM YYYY", nullDate = null) {
    if (value) {
        moment.locale('es');
        return moment(String(value)).format(format);
    }
    return nullDate;
};

import VueFormWizard from 'vue-form-wizard'
import 'vue-form-wizard/dist/vue-form-wizard.min.css'
Vue.use(VueFormWizard)

import VueGoodTablePlugin from 'vue-good-table';
import 'vue-good-table/dist/vue-good-table.css'
Vue.use(VueGoodTablePlugin);

//Componentes
Vue.component('input-form', require('./components/InputFormComponent.vue').default);


/*=============================================
VISTAS DEL PERFIL
=============================================*/
Vue.component('submit-project', require('./pages/backend/SubmitProject.vue').default);
Vue.component('profile-clout', require('./pages/frontend/profile/ProfileClout.vue').default);
Vue.component('edit-profile', require('./pages/frontend/profile/EditProfile.vue').default);

/*=============================================
VISTAS DEL PROYECTO
=============================================*/
Vue.component('list-project', require('./pages/frontend/ListProjects').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
import VueInternationalization from 'vue-i18n';
import Locale from './vue-i18n-locales.generated';

window.Vue.use(VueInternationalization);


const i18n = new VueInternationalization({
    locale: window.lang,
    messages: Locale
});

window.eventBus = new Vue()
const app = new Vue({
    el: '#app',
    i18n,
    components: {
        'submit-project': () => import(
            './pages/backend/SubmitProject.vue'
            )
    }
});
