<script setup lang="ts">
import ProductItemCard from "./product-item-card.vue";

defineProps<{ type: string; products: Array<Product>; suggest: boolean }>();
</script>

<template>
    <section class="flex flex-col gap-6">
        <h3 class="uppercase text-xl font-bold pb-2 border-b border-border">
            {{ suggest ? "Produk lain yang serupa" : type }}
        </h3>

        <div class="grid grid-cols-2 lg:grid-cols-3 gap-8">
            <ProductItemCard
                v-for="product in products"
                :product="product"
                :key="product.id"
            />
        </div>
    </section>
</template>
