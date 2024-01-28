<script setup lang="ts">
import RootLayout from "@/Layouts/RootLayout.vue";
import ProductItemCard from "@/components/product-item-card.vue";

const props = defineProps<{
    searchProduct: Product[];
    query: string;
}>();
</script>

<template>
    <RootLayout>
        <template v-if="searchProduct.length">
            <h3 class="mt-4 text-sm">
                Menampilkan hasil untuk <strong>{{ query }}</strong>
            </h3>
            <div class="grid grid-cols-2 lg:grid-cols-3 gap-8">
                <ProductItemCard
                    v-for="product in searchProduct"
                    :product="product"
                    :key="product.id"
                />
            </div>
        </template>

        <template v-else>
            <h3 class="mt-4 text-sm">
                Hasil pencarian untuk <strong>{{ query }}</strong> tidak
                ditemukan.
            </h3>
        </template>
    </RootLayout>
</template>
