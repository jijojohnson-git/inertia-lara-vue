<template>

    <form @submit.prevent="handleSubmit" class="p-4">
                <div class="flex justify-between flex-col px-4 py-1">
                    <label for="" class="py-2">Name: </label>
                    <input
                        v-model="form.name"
                        type="text"
                        class="px-3 py-1 text-gray-700 rounded-md focus-within:border-green-700 border-2"
                        id="name"
                        name="name"
                    />
                    <h5
                        v-if="form.errors.name"
                        class="text-red-500 text-sm mt-1 tracking-wide"
                        v-text="form.errors.name"
                    ></h5>
                    <!-- <h5 v-if="$page.props.errors.name"></h5> -->
                </div>
                <div class="flex justify-between flex-col px-4 py-1">
                    <label for="" class="py-2">Email: </label>
                    <input
                        v-model="form.email"
                        type="text"
                        class="px-3 py-1 text-gray-700 rounded-md focus-within:border-green-700 border-2"
                        id="email"
                        name="email"
                    />
                    <h5
                        v-if="form.errors.email"
                        class="text-red-500 text-sm mt-1 tracking-wide"
                        v-text="form.errors.email"
                    ></h5>
                    <!-- <h5 v-if="$page.props.errors.email"></h5> -->
                </div>
                <div class="flex justify-between flex-col px-4 py-1">
                    <label for="" class="py-2">Password: </label>
                    <input
                        v-model="form.password"
                        type="password"
                        class="px-3 py-1 text-gray-700 rounded-md focus-within:border-green-700 border-2"
                        id="password"
                        name="password"
                    />
                    <h5
                        v-if="form.errors.password"
                        class="text-red-500 text-sm mt-1 tracking-wide"
                        v-text="form.errors.password"
                    ></h5>
                    <!-- <h5 v-if="$page.props.errors.password"></h5> -->
                </div>
                <div class="flex justify-between flex-col px-4 py-1">
                    <label for="" class="py-2">Confirm Password: </label>
                    <input
                        v-model="form.password_confirmation"
                        type="password"
                        class="px-3 py-1 text-gray-700 rounded-md focus-within:border-green-700 border-2"
                        id="password_confirmation"
                        name="password_confirmation"
                    />
                    <h5
                        v-if="form.errors.password_confirmation"
                        class="text-red-500 text-sm mt-1 tracking-wide"
                        v-text="form.errors.password_confirmation"
                    ></h5>
                    <!-- <h5 v-if="$page.props.errors.password_confirmation"></h5> -->
                </div>
                <div class="flex justify-between flex-col px-4 py-3">
                    <button
                        type="submit"
                        class="px-4 py-2 text-sm rounded bg-green-300 hover:bg-green-500"
                        :class="{
                            'bg-green-200 hover:bg-green-200': form.processing,
                        }"
                        :disabled="form.processing"
                        v-text="!form.processing ? 'Submit' : 'Submitting'"
                    ></button>
                </div>
            </form>
</template>

<script>
export default {
    layout: null,
};
</script>

<script setup>
import { useForm } from "@inertiajs/inertia-vue3";

let form = useForm({
    name: "",
    email: "",
    password: "",
    password_confirmation: "",
});

let handleSubmit = () => {
    form.post("/users");
};
</script>
