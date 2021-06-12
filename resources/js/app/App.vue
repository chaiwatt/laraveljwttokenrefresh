<template>
    <div>
        <div class="navbar">
            <div><router-link to="/">Home</router-link></div>
            <div><router-link to="/login">Login</router-link></div>
            <div><router-link to="/dashboard">Dashboard</router-link></div>
        </div>
        <router-view></router-view>
    </div>
</template>
<script>
    export default {
        name: "App"
    }
</script>

<style scoped>
    .navbar{
        display: flex;
        justify-content: center;
        align-items: center;
        background-color: #FFF;
        border-bottom:1px solid #EEE;
    }
    .navbar div{
        padding: 5px 20px;
        margin: 5px;
    }
</style>