<template>
    <form @submit.prevent="handleSubmit">
        <h1>Set new password</h1>
        <div class="form-group">
            <label for="Password">Password</label>
            <input type="password" v-model="password" placeholder="Your new password" class="form-control"/>
        </div>
                <div class="form-group">
            <label for="Password">Password confirmation</label>
            <input type="password" v-model="password_confirmation" placeholder="Confirm your password" class="form-control"/>
        </div>
        <button class="btn btn-secondary">Submit</button>
    </form>
</template>

<script>
import axios from 'axios'

    export default {
        name: 'reset',
        data() {
            return {
                password: '',
                password_confirmation: ''
            }
        },
        methods: {
            async handleSubmit() {

                // const response = await axios.post('api/reset', {
                //     password: this.password,
                //     password_confirmation = this.password_confirmation,
                //     token: this.$route.params.token
                // });
                this.$router.push('/');
            }
        }
    }
</script>
