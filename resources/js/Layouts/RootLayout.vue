<script setup lang="ts">
import { GithubIcon, SearchIcon } from "lucide-vue-next";
import { Link } from "@inertiajs/vue3";
import { Input } from "@/components/ui/input";
import { ref, computed } from "vue";
import Cart from "@/components/cart.vue";

import Button from "@/components/ui/button/Button.vue";
import { router } from "@inertiajs/vue3";
import ModalConfirmationLogout from "./components/ModalConfirmationLogout.vue";
import DropdownProfile from "./components/DropdownProfile.vue";

const inputValue = ref("");
const openModal = ref(false);

const hrefSearch = computed(() => {
    if (!inputValue.value) return "#";
    return `/search?q=${inputValue.value}`;
});

function handleSearch() {
    router.visit(hrefSearch.value);
}
</script>

<template>
    <nav
        class="container max-w-3xl sticky z-[5] top-0 flex justify-between items-center py-5 bg-white border-b gap-2"
    >
        <Link href="/">
            <h1 class="text-2xl font-extrabold flex-1">My Store</h1>
        </Link>

        <form
            @submit.prevent="handleSearch"
            class="flex items-center border p-1 px-2 rounded-lg w-44 md:w-fit"
        >
            <Input
                v-model="inputValue"
                placeholder="Search Product..."
                class="border-none p-0 focus-visible:ring-0 focus-visible:ring-offset-0 text-sm"
            />
            <button type="submit">
                <SearchIcon class="w-4 h-4 text-neutral-500 flex-none" />
            </button>
        </form>

        <div class="flex items-center gap-2 md:gap-6">
            <Cart />

            <DropdownProfile @openModal="openModal = true" />

            <ModalConfirmationLogout v-model:open="openModal" />
        </div>
    </nav>

    <main
        class="container max-w-3xl space-y-5 md:space-y-10 mb-20 min-h-[90vh] overflow-x-hidden"
    >
        <slot />
    </main>

    <footer
        class="container max-w-3xl py-4 border-t mb-4 font-semibold flex justify-between items-center"
    >
        <p>© Agus Wesly 2023. All rights reserved</p>

        <a
            href="https://github.com/agus-wesly/uts-laravel-ecommerce-app"
            target="_blank"
        >
            <GithubIcon />
        </a>
    </footer>
</template>
