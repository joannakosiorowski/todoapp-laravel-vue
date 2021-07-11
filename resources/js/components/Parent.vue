<template>
<div id="app" class="container">
<navbar ></navbar>
<router-view></router-view>
</div>

</template>

<script>
import navbar from './NavComponent.vue'
import axios from 'axios'
export default{

    async created(){
        const response = await axios.get('api/user',{
            headers: {
                Authorization: 'Bearer ' + localStorage.getItem('token')
            }
        });
        this.$store.dispatch('user', response.data);
        
    }

}
</script>
