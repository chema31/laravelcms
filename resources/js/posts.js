import Vue from 'vue'
import CKEditor from 'ckeditor4-vue';
import VueTailwind from 'vue-tailwind'

import TDatepicker from 'vue-tailwind/dist/t-datepicker';
import Spanish from 'vue-tailwind/dist/l10n/es'

const settings = {
    't-datepicker': {
        component: TDatepicker,
        props: {
            locale: Spanish,
            dateFormat: 'Y-m-d H:i:s',
            userFormat: 'd/m/Y H:i',
            weekStart: 1,
            timepicker: true,
            amPm: true,

        }
    }
}

Vue.use(VueTailwind, settings);
Vue.use(CKEditor);

const app = new Vue({
    el: '#app',
});