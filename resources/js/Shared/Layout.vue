<template>
<Head>
    <meta type='description' content="This is an inertia rendered app using vue frontend and laravel backend" />
    <link rel='icon' href='/images/favicon.png' type="image/png" sizes="67x67"/>
</Head>
  <header class="bg-gray-200 shadow-md px-4 py-3 ">
      <Nav/>
  </header>
    <div class="max-w-5xl mx-auto">
        <slot />
    </div>
  <footer class="text-center text-sm bg-gray-200 shadow-md px-4 py-3">
      <h3>copyright @2022, all rights reserved.</h3>
  </footer>
</template>

<script>
import Nav from './Nav.vue'
export default {
    components: {Nav}
}
</script>

<style>

</style>
