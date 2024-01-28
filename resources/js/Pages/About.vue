<script setup>
import { Link } from "@inertiajs/vue3";
import { useForm } from "@inertiajs/vue3";

const form = useForm({
    first_name: "",
    last_name: "",
    email: "",
    avatar: null,
});

function handleSubmit() {
    form.post("/user");
}
</script>

<template>
    <form
        style="display: flex; flex-direction: column"
        class="flex flex-col"
        @submit.prevent="handleSubmit"
    >
        <label>First name</label>
        <input type="text" v-model="form.first_name" />
        <div v-if="form.errors.email">{{ form.errors.first_name }}</div>

        <label>Last name</label>
        <input type="text" v-model="form.last_name" />
        <div v-if="form.errors.email">{{ form.errors.last_name }}</div>

        <label>Email</label>
        <input type="text" v-model="form.email" />
        <div v-if="form.errors.email">{{ form.errors.email }}</div>

        <label>Image</label>
        <input type="file" @input="form.avatar = $event.target.files[0]" />
        <div v-if="form.errors.avatar">{{ form.errors.avatar }}</div>

        <button type="submit" :disabled="form.processing">Login</button>
    </form>

    <progress v-if="form.progress" :value="form.progress.percentage" max="100">
        {{ form.progress.percentage }}%
    </progress>
</template>
