let login = require('./components/LoginComponent.vue').default;
let register = require('./components/RegisterComponent.vue').default;
let forgot = require('./components/ForgotPasswordComponent.vue').default;
let reset = require('./components/ResetPasswordComponent.vue').default;
let task = require('./components/TaskComponent.vue').default;
let home = require('./components/App.vue').default;

export const routes = [
    { path: '/', component: login,},
    { path: '/register', component: register},
    { path: '/forgot', component: forgot},
    { path: '/reset/:token', component: reset},
    { path: '/tasks', component: task},
    { path: '/home', component: home},

]