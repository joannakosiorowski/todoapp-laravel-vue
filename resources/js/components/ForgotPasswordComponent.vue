<template>
    <form @submit.prevent="handleSubmit">
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" v-model="email" placeholder="Your email" class="form-control"/>
        </div>
        <button class="btn btn-warning">Send</button>
    </form>
</template>
<script>
import axios from 'axios'

export default{
    name: 'forgot',
    data() {
        return {
            email: ''
        }
    },
    methods: {
        async handleSubmit() {
            const response = await axios.post('api/forgot', {
                email: this.email
            });

            console.log(' should send mail');
        }
    }

}
</script>

