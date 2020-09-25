import Vue from 'vue'
import { BootstrapVue, IconsPlugin } from 'bootstrap-vue'

// Install BootstrapVue
Vue.use(BootstrapVue)
// Optionally install the BootstrapVue icon components plugin
Vue.use(IconsPlugin)

const files = require.context('@/components/render', true, /\.vue$/i);
files.keys().map(key =>{
    console.log(key)
    Vue.component(key.split('/').pop().split('.')[0], files(key).default)
});

