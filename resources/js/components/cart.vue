<script setup lang="ts">
import {
    Sheet,
    SheetContent,
    SheetHeader,
    SheetTitle,
    SheetTrigger,
} from "@/components/ui/sheet";
import { ShoppingCart } from "lucide-vue-next";
import CartItem from "./cart-item.vue";
import { Button } from "./ui/button";
import useCart from "@/composable/useCart";
import { computed } from "vue";
import { router } from "@inertiajs/vue3";
import formatCurrency from "@/utils/formatCurrency";

let { cartItemData } = useCart();

let cartItemTotal = computed(() => {
    let total = cartItemData.value.reduce<number>((acc, item) => {
        let totalPerItem = item.qty * item.price;

        return acc + totalPerItem;
    }, 0);

    return formatCurrency(total);
});

let cartItemLength = computed(() => cartItemData.value.length);
</script>

<template>
    <Sheet>
        <SheetTrigger as-child>
            <button class="relative">
                <ShoppingCart />
                <span
                    v-if="!!cartItemLength"
                    class="absolute w-4 h-4 rounded-full bg-red-600 text-white font-bold text-[8px] flex items-center justify-center -top-[9px] -right-1"
                >
                    {{ cartItemLength }}
                </span>
            </button>
        </SheetTrigger>
        <SheetContent class="overflow-y-scroll">
            <SheetHeader class="my-5">
                <SheetTitle class="text-left">CART</SheetTitle>
            </SheetHeader>
            <div class="flex flex-col gap-5">
                <CartItem
                    v-for="product in cartItemData"
                    :key="product.id"
                    :product="product"
                />
            </div>
            <div class="flex justify-between my-10">
                <h5>SUBTOTAL</h5>
                <p class="text-sm font-bold">Rp. {{ cartItemTotal }}</p>
            </div>
            <Button
                @click="router.visit('/checkout')"
                :disabled="!cartItemLength"
                class="w-full mb-10 text-xs py-6 font-bold"
            >
                CHECKOUT
            </Button>
        </SheetContent>
    </Sheet>
</template>
