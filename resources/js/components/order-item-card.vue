<script setup lang="ts">
import formatCurrency from "@/utils/formatCurrency";
import { computed } from "vue";
import { Button } from "./ui/button";

let props = defineProps<{
    order: Order;
    totalPrice: number;
}>();

defineEmits<{
    (e: "showModal", id: number): void;
}>();

let orderDate = computed(() => {
    let date = new Date(props.order.created_at);
    return date.toLocaleString("id-ID", {
        weekday: "long",
        month: "long",
        year: "numeric",
        day: "numeric",
    });
});
</script>

<template>
    <div class="mt-8 flex flex-col gap-5">
        <div class="flex justify-between items-center border-b pb-3">
            <p>{{ orderDate }}</p>
            <a
                :href="`/create-pdf-file/${order.id}`"
                class="text-blue-600 underline font-semibold"
                target="_blank"
            >
                Cetak pesanan
            </a>
            <Button
                @click="() => $emit('showModal', order.id)"
                class="text-xs h-min"
                variant="destructive"
                >Batalkan pesanan</Button
            >
        </div>

        <div class="flex justify-between border-b pb-4">
            <h2 class="text-sm font-semibold flex-[2]">Produk Dipesan</h2>
            <p class="text-sm font-semibold flex-1">Harga Satuan</p>
            <p class="text-sm font-semibold flex-1">Jumlah</p>
            <p class="text-sm font-semibold flex-1">Status</p>
        </div>

        <ul class="flex w-full flex-col gap-4">
            <div
                class="flex justify-between w-full items-center"
                v-for="orderDetail in order.order_details"
                :key="orderDetail.id"
            >
                <div class="flex items-center gap-4 flex-[2]">
                    <img
                        :src="orderDetail.product.product_url"
                        alt="prod-img"
                        class="w-10 h-10 object-cover"
                    />
                    <p class="font-medium">
                        {{ orderDetail.product.name }}
                    </p>
                </div>

                <p class="flex-1">
                    Rp. {{ formatCurrency(orderDetail.product.price) }}
                </p>
                <p class="flex-1">
                    {{ orderDetail.quantity }}
                </p>
                <div class="flex-1 font-semibold">
                    <p
                        class="bg-yellow-200 text-yellow-800 rounded-full p-1 w-8 h-8 flex items-center justify-center"
                    >
                        {{ order.status }}
                    </p>
                </div>
            </div>
        </ul>

        <p class="flex-1 font-semibold self-end">
            Total : Rp. {{ formatCurrency(totalPrice) }}
        </p>
    </div>
</template>
