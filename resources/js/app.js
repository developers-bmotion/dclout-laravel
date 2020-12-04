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

//Componentes
Vue.component('input-form', require('./components/InputFormComponent.vue').default);

// Componentes de la página
Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('submit-project', require('./pages/backend/SubmitProject.vue').default);

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
