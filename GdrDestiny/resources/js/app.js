/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
window.moment = require('moment');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

const files = require.context('./', true, /\.vue$/i)
files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))




/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    data() {
        return {
            'newMessages' : [],
            'componentToOpen' : {
                'main' : '',
                'footer' : '',
                'header' : '',
                'width' : null,
                'height' : null,
                'image' : '/img/imgHomeInterna/sfondo_modal_vue.png'
            }, 
            'usersOnline' : [],
            'all_users' : {},
            'usersOnlineInMap' : [],
        }
    },
    methods : {
        openModalVue(header=null,main=null,footer=null, width=null, height=null )
        {
            if( header ) this.componentToOpen.header = header
            if( main ) this.componentToOpen.main = main
            if( footer ) this.componentToOpen.footer = footer
            
            if( width && height )
            { 
                this.componentToOpen.height = height 
                this.componentToOpen.width = width
            }
        },
    }
});
