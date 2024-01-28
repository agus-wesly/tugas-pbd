<script setup>
import { ref } from "vue";
import { Link } from "@inertiajs/vue3";

const counter = ref(0);

defineProps({
    avatar: String,
    foo: String,
});
</script>

<template>
    <Link href="/about" preserve-state>About</Link>
    <h1 class="font-bold text-red-500">Welcome</h1>
    <p v-if="avatar">{{ avatar }}</p>
    <p class="text-blue-500" v-if="foo">{{ foo }}</p>
    <button @click="counter++">{{ counter }}</button>
</template>
