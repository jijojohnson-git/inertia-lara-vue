<template>

    <div class="grid place-items-center min-h-screen">
        <div class="w-1/3 mx-auto bg-gray-200 shadow-md shadow-gray-700/60 rounded border">
            <h3
                class="text-center font-bold text-lg tracking-wider bg-gray-100 text-gray-800 py-3"
            >
               {{ title }}
            </h3>
            <slot/>
        </div>
    </div>
</template>

<script setup>
defineProps({title: String});
</script>
