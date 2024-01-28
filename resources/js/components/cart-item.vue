<script setup lang="ts">
import type { CartItem } from "@/composable/useCart";
import useCart from "@/composable/useCart";
import { X } from "lucide-vue-next";

defineProps<{
    product: CartItem;
}>();

let { increaseItem, decreaseItem, removeItemFromCart } = useCart();
</script>

<template>
    <div class="flex justify-between gap-10 relative">
        <img
            :src="product.product_url"
            class="aspect-[9/10] object-cover w-28"
        />

        <div class="flex flex-col gap-5">
            <h4 class="text-sm font-bold">{{ product.name }}</h4>
            <p class="text-xs line-clamp-3">{{ product.description }}</p>

            <div class="flex justify-between">
                <div
                    class="flex w-20 justify-between items-center border border-border"
                >
                    <button
                        @click="() => decreaseItem(product.id)"
                        class="h-full px-2"
                    >
                        -
                    </button>
                    <span>{{ product.qty }}</span>
                    <button
                        @click="() => increaseItem(product.id)"
                        class="h-full px-2"
                    >
                        +
                    </button>
                </div>

                <p class="text-sm font-bold">Rp. {{ product.price }}</p>
            </div>
        </div>

        <button
            @click="() => removeItemFromCart(product.id)"
            class="absolute top-0 right-0"
        >
            <X class="w-4 h-4 text-neutral-500" />
        </button>
    </div>
</template>
