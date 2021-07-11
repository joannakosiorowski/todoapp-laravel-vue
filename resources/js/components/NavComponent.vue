<template>
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <router-link  to="/home" class="navbar-brand"> Home</router-link>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto" v-if="!user">
                            <li class="nav-item dropdown">
                                <router-link to="/" class="nav-link">Login</router-link>
                            </li>
                            <li class="nav-item dropdown">
                                <router-link to="/register" class="nav-link">Register</router-link>
                            </li>
                    </ul>
                    <ul class="navbar-nav ml-auto" v-if="user">
                            <li class="nav-item dropdown">
                                <a href="javascript:void(0)" @click="handleLogout" class="nav-link">Logout</a>
                            </li>
                    </ul>
                </div>
            </div>
        </nav>
</template>

<script>
import {mapGetters} from 'vuex'

export default {
    name: 'navbar',

    methods: {
        handleLogout() {
            //usuwanie tokenu
            localStorage.removeItem('token');
            this.$store.dispatch('user', null);
            this.$router.push('/');
        }
    },
    computed: {
        ...mapGetters(['user'])
    }
}
</script>

