<template>
    <div id="login" class="login">
        <div v-if="loading">
            <div class="spinner-border" role="status">
                <span class="sr-only">Loading ...</span>
            </div>
        </div>
        <form class="form" v-else>
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Email" v-model="credentials.email">
            </div>
             <div class="form-group">
                <input type="password" class="form-control" placeholder="Password" v-model="credentials.password">
            </div>
            <button class="btn btn-primary" @click.prevent="login">Login</button>
        </form>
    </div>
</template>

<script>
import axios from 'axios';
export default {
    name:"Login",
    data(){
        return{
            credentials: {
                email: '',
                password: ''
            },
            loading: true,
        }
    },
    mounted(){
        if(this.$store.state.token !== ''){
            axios.post('/api/checktoken',{token: this.$store.getters.token})
            .then(res => {
                this.loading = false;
                if(res.data.success){
                    this.$router.push('/dashboard');
                }else{
                    this.$store.commit('setToken',res.data.token)
                }
            })
            .catch(err =>{
                this.loading = false;
                this.$store.commit('clearToken');
            })
        }else{
            this.loading = false;
        }
    },
    methods:{
        login(){
            axios.post('/api/login',this.credentials)
            .then(res => {
                if(res.data.success){
                    
                    this.$store.commit('setToken',res.data.token);
                    this.$router.push('/dashboard');
                }
            })
            .catch(error => {
                console.log("Error");
            })
        }
    }
}
</script>
<style scoped>
    .login{
        background-color: #FFF;
        border:1px solid #EEE;
        padding:  10px;
        margin: 50px auto;
        width:500px;
    }
</style>