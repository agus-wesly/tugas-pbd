<script setup lang="ts">
import RootLayout from "@/Layouts/RootLayout.vue";
import ProductList from "@/components/product-list.vue";
import { Link } from "@inertiajs/vue3";
import { computed } from "vue";

const props = defineProps<{
    sepatu: Array<Product>;
    baju: Array<Product>;
    tas: Array<Product>;
    jamTangan: Array<Product>;
    kacamata: Array<Product>;
}>();

let typeProductList = computed(
    () => Object.keys(props) as Array<keyof typeof props>
);
</script>

<template>
    <RootLayout>
        <Link href="/product/1" class="mt-5 inline-block">
            <img src="/banner.jpg" alt="banner" class="object-cover"
        /></Link>

        <ProductList
            v-for="typeProduct in typeProductList"
            :key="typeProduct"
            :type="typeProduct"
            :products="$props[`${typeProduct}`]"
        />
    </RootLayout>
</template>
