<template>
    <div class="container">
    <form @submit.prevent="handleSubmit">
    <div class="form-group">
        <label for="firstname">Firstname</label>
        <input type="text" v-model="firstname" class="form-control" id="firstname" placeholder="Firstname">
    </div>
    <div class="form-group">
        <label for="lastname">Lastname</label>
        <input type="text" v-model="lastname" class="form-control" id="lastname" placeholder="Lastname">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Email address</label>
        <input type="email" v-model="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input type="password" v-model="password" class="form-control" id="password" placeholder="Password">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
    </form>

    </div>
</template>

<script type="text/javascript">
export default{
    name: 'Register',
    data(){
        return {
            firstname: '',
            lastname: '',
            email: '',
            password: ''
        }
    },
    methods: {
        async handleSubmit(e){
            const data = {
                firstname: this.firstname,
                lastname: this.lastname,
                email: this.email,
                password: this.password
            };
            const response = await axios.post('api/register', data);
            console.log(response);
            this.$router.push('/');
        }
    }
}
</script>
