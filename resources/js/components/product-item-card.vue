<script setup lang="ts">
import useCart from "@/composable/useCart";
import { Button } from "./ui/button";
import { Link } from "@inertiajs/vue3";
import { computed } from "@vue/reactivity";

let props = defineProps<{
    product: Product;
}>();

let { addItemToCart, removeItemFromCart, isProductInCart } = useCart();
let productIsInCart = computed(() => isProductInCart(props.product.id));

function handleClickProduct() {
    if (productIsInCart.value) {
        removeItemFromCart(props.product.id);
    } else {
        addItemToCart({ ...props.product, qty: 1 });
    }
}
</script>

<template>
    <div>
        <article class="flex flex-col gap-4 w-full relative z-[1]">
            <img
                :src="product.product_url"
                class="w-full h-[158px] object-cover"
            />
            <div class="flex flex-col gap-4">
                <h6 class="text-sm">{{ product.name }}</h6>
                <p class="text-xs line-clamp-2">{{ product.description }}</p>
            </div>
            <Link :href="`/product/${product.id}`" class="absolute inset-0" />
        </article>
        <div class="flex justify-between items-center mt-3">
            <p class="font-bold w-fit text-xs">Rp. {{ product.price }}</p>
            <Button
                @click="handleClickProduct"
                :variant="productIsInCart ? 'destructive' : 'outline'"
                class="text-xs py-2 h-fit"
                :class="{
                    'border-blue-700 text-blue-800 hover:bg-inherit hover:text-blue-700':
                        !productIsInCart,
                }"
            >
                {{ productIsInCart ? "Remove" : "Add to cart" }}
            </Button>
        </div>
    </div>
</template>
