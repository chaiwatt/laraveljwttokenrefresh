import Vue from 'vue';
import VueRouter from 'vue-router';
import Home from './components/Home';
import Login from './components/Login';
import Dashboard from './components/Dashboard';

export const routes = [
    {
        path: '/',
        component: Home
    },
    {
        path: '/login',
        component: Login
    },
    {
        path: '/dashboard',
        component: Dashboard
    },
];