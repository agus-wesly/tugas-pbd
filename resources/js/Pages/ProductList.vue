<script setup lang="ts">
import RootLayout from "@/Layouts/RootLayout.vue";
import ProductList from "@/components/product-list.vue";
import { Button } from "@/components/ui/button";
import useCart from "@/composable/useCart";
import { computed } from "@vue/reactivity";

let props = defineProps<{
    product: Product;
    relatedProduct: Product[];
}>();

let { isProductInCart, addItemToCart, removeItemFromCart } = useCart();
let productInCart = computed(() => isProductInCart(props.product.id));

function handleButtonProductClick() {
    if (productInCart.value) {
        removeItemFromCart(props.product.id);
    } else {
        addItemToCart({ ...props.product, qty: 1 });
    }
}
</script>

<template>
    <RootLayout>
        <div class="flex flex-col md:flex-row gap-10 mt-10">
            <img
                :src="product.product_url"
                alt="product-img"
                class="w-full md:max-w-[320px] object-cover aspect-video flex-none h-min"
            />
            <div class="flex flex-col gap-4">
                <h1 class="font-bold text-xl text-[#333]">
                    {{ product.name }}
                </h1>
                <h3 class="font-semibold text-md text-[#333]">
                    Rp. {{ product.price }}
                </h3>

                <div class="space-x-4">
                    <Button
                        @click="handleButtonProductClick"
                        :variant="productInCart ? 'destructive' : ''"
                        >{{
                            productInCart ? "Remove from cart" : "Add to cart"
                        }}</Button
                    >
                </div>
            </div>
        </div>
        <div class="pb-28">
            <h3 class="text-sm font-medium text-neutral-500">
                {{ product.description }}
            </h3>
        </div>

        <ProductList
            :type="product.type.name"
            :products="relatedProduct"
            suggest
        />
    </RootLayout>
</template>
