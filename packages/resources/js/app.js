require('./bootstrap');
import { CallApp } from '@/call/vue'
import Vue from 'vue'
Vue.use(CallApp)
Vue.mixin({
    methods: {
        route: (name, params, absolute) => route(name, params, absolute),
    },
});
Vue.prototype.$route = (...args) => route(...args).url()
// Globally Registered Components
import '@/globalComponents.js'
const app = document.getElementById('app')
new Vue({
    render: h => h(CallApp, {
        props: {
            initialPage: JSON.parse(app.dataset.page),
            resolveComponent: name => require(`@/Pages/${name}`).default,
        },
    }),
}).$mount(app)
