<template>
    <Head>
        <title>Users</title>
        <meta
            type="description"
            content="This is the Users Page for the app"
            head-key="description"
        />
    </Head>
    <!-- <Layout> -->
    <div class="bg-purple-700 p-8 text-center text-white py-5">
        <h3 class="font-bold text-3xl">Users Page</h3>
        <Link
            as="button"
            href="/users/create"
            class="py-2 px-4 my-2 bg-blue-500 rounded-md hover:bg-blue-700"
            v-if="can.createUser"
            >Create User</Link
        >

        <div class="my-4">
            <input
                type="text"
                v-model="search"
                class="mx-auto rounded text-gray-500 px-4"
                placeholder=" Search..."
            />
        </div>
        <ul>
            <li
                v-for="user in users.data"
                :key="user.id"

            >{{ user.name }} <span v-if="user.can.edit">Edit</span></li>

        </ul>
    </div>
    <div class="text-center">
        <!-- <template v-for="link in users.links" :key="link.label">
                <Link  class="px-3 py-2 space-x-3" :href="link.url" v-html="link.label" v-if="link.url"></Link>
                <span v-else v-html="link.label"></span>
      </template> -->

        <!-- <Component v-for="link in users.links"
        :key="link.label"
        :is="link.url ? 'Link' : 'span'"
        v-html="link.label"
        :href='link.url'
        class="px-3 py-2 "
        :class="{'font-bold': link.active }"
     >
    </Component> -->

        <Pagination :links="users.links" class="my-6" />
    </div>
    <!-- </Layout> -->
</template>

<script setup>
import Pagination from "../Shared/Pagination.vue";
import { ref } from "@vue/reactivity";
import { Inertia } from "@inertiajs/inertia";
import { watch } from "@vue/runtime-core";
// import throttle from "lodash/throttle";
import debounce from "lodash/debounce";

let props = defineProps({
    errors: Object,
    frameworks: Array,
    name: String,
    users: Object,
    filters: Object,
    can: Object
});
let search = ref(props.filters.search);

watch(
    search,
    debounce(function (value) {

            Inertia.get(
                "/users",
                { search: value },
                {
                    preserveState: true,
                    replace: true,
                }
            );

    }, 300)
);
</script>
<script>
import Layout from "../Shared/Layout.vue";

export default {
    layout: Layout,
};
</script>

<style></style>
