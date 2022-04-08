<template>
  <Head>
    <title>Home</title>
    <meta
      type="description"
      content="This is the homepage"
      head-key='description'
    />
  </Head>
  <h3 class="bg-teal-700 p-8 text-center text-white py-96">
    Home sweet Home, {{ auth ? auth.user.name : 'guest' }}!
  </h3>
  <div>
    <ul>
      <li
        v-for="framework in frameworks"
        :key="framework"
        v-text="framework"
        class="text-white font-semibold text-center py-3"
        :class="{'bg-red-600':framework == 'Laravel', 'bg-purple-600': framework == 'Inertia', 'bg-green-600': framework == 'Vue'}"
      ></li>
    </ul>
  </div>

</template>

<script setup>
defineProps({ errors: Object, frameworks: Array, auth: Object });
</script>
<script>
import Layout from "../Shared/Layout.vue";
export default {
  layout: Layout,
};
</script>
