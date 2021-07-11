<template>
    <div class="container">
    <form @submit.prevent="handleSubmit">
    <div v-if="error" class="alert alert-danger" role="alert">{{error}}</div>
    <div class="form-group">
        <label for="exampleInputEmail1">Email address</label>
        <input type="email" v-model="email" class="form-control" id="email" placeholder="Email">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input type="password" v-model="password" class="form-control" id="password" placeholder="Password">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
    <p class="forgot-password text-right">
        <router-link to="forgot">Did you forgot password?</router-link>
    </p>
    </form>

    </div>
</template>

<script type="text/javascript">
    import axios from 'axios'

export default{

    name: 'Login',
    data() {
        return {
            email: '',
            password: '',
            error: ''
        }
    },
    methods: {
        async handleSubmit() {
            try{
                const response = await axios.post('api/login', {
                email: this.email,
                password: this.password
                });

            localStorage.setItem('token', response.data.token);
            this.$store.dispatch('user', response.data.user);
            this.$router.push('/tasks');
            } catch (e) {
                this.error = 'Invalid credentials'
            }

        }
      
    }
}
</script>
