<template>
          <Link :href="href" :class="{'hover:bg-slate-500 text-gray-200 bg-slate-500': active}" class="transition duration-500 ease-out hover:underline font-semi-bold px-3 py-2 hover:bg-gray-300 hover:shadow-sm rounded">
            <slot/>
          </Link>
</template>

<script>
import { Link } from '@inertiajs/inertia-vue3'
export default {
    components: { Link },
    props: {
        active: Boolean,
        href: String,
    }
}
</script>

<style>

</style>
