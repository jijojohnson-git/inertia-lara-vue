<template>
    <!-- <span>{{username}}</span> -->

    <div class="flex justify-between items-center">
        <div>
            <h1 class="font-bold text-md text-gray-800 hover:text-gray-600">
                <Link href="/">InertiaApp</Link>
                <span v-if="username">{{ username }}</span>
            </h1>
        </div>
        <div class="flex justify-around items-center space-x-4">
            <NavLink href="/" :active="$page.component === 'Home'"
                >Home</NavLink
            >
            <!-- <NavLink href="/" :class="{'bg-slate-500': $page.url.startsWith('/')}">Home</NavLink> -->
            <NavLink href="/about" :active="$page.component === 'About'"
                >About</NavLink
            >
            <NavLink href="/users" :active="$page.component === 'Users'"
                >Users</NavLink
            >
            <!-- <span>{{ auth ? auth.user.name : 'guest' }}!</span> -->
            <!-- <span>{{ auth.user.name }}!</span> -->
            <NavLink v-if="!username"
                href="/users/show"
                method="get"
                as="button"
                class="transition duration-500 hover:bg-slate-400 ease-out hover:underline font-semi-bold px-3 py-2 bg-gray-300 shadow-sm"
                >Login</NavLink
            >
            <NavLink v-if="username"
                href="/logout"
                method="post"
                as="button"
                class="transition duration-500 hover:bg-slate-400 ease-out hover:underline font-semi-bold px-3 py-2 bg-gray-300 shadow-sm"
                >Logout</NavLink
            >
        </div>
    </div>
</template>

<script setup>
// defineProps({ auth: Object });
</script>

<script>
import NavLink from "./NavLink.vue";
// import { Link } from "@inertiajs/inertia-vue3";
export default {
    components: { NavLink },
    props: ["auth"],
    computed: {
        username() {
            // if(this.$page.props.auth){
            //     return this.$page.props.auth.user.name;
            // }
            // return false;
            return this.$page.props.auth ? this.$page.props.auth.user.name : "";
        },
    },
};
</script>

<style></style>
