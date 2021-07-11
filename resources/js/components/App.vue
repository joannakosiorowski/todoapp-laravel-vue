<template>
    <div id="app" class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h3 v-if="user">Hi, {{user.firstname}}</h3>
                <h3 v-if="!user">Nie jesteś zalogowany</h3>
            </div>
        </div> 
    </div>
</template>

<script>
import {mapGetters} from 'vuex'

export default {
    name: 'App',
    computed: {
        ...mapGetters(['user'])
    }

}
</script>
