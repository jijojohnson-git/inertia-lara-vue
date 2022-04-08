<template>
    <Head>
        <title>About</title>
        <meta
            type="description"
            content="This is an About Section for the App"
            head-key="description"
        />
    </Head>
    <h3 class="bg-orange-700 p-8 text-center text-white py-96">About Page</h3>
    <span class="inline-block">Current time: {{ time }}</span>
    <Link
        href="/about"
        preserve-scroll
        as="button"
        class="inline-block p-3 bg-gray-400 rounded text-white"
        >refresh</Link
    >

</template>

<script setup>

// import { Head } from '@inertiajs/inertia-vue3';

defineProps({ errors: Object, frameworks: Array, name: String, time: String });

</script>
