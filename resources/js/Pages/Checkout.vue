<script setup lang="ts">
import RootLayout from "@/Layouts/RootLayout.vue";
import { Button } from "@/components/ui/button";
import { Label } from "@/components/ui/label";
import useCart from "@/composable/useCart";
import { computed } from "@vue/reactivity";
import formatCurrency from "@/utils/formatCurrency";
import { useForm } from "@inertiajs/vue3";

let form = useForm({
    address: "",
});

let { cartItemData } = useCart();

let totalPrice = computed(() => {
    let total = cartItemData.value.reduce<number>((acc, item) => {
        let totalPerItem = item.qty * item.price;

        return acc + totalPerItem;
    }, 0);

    return total;
});

let formattedTotalPrice = computed(() => formatCurrency(totalPrice.value));

function onSubmit() {
    form.transform((data) => ({
        ...data,
        items: cartItemData.value,
        total: totalPrice.value,
    })).post("/order");
}
</script>

<template>
    <RootLayout>
        <form @submit.prevent="onSubmit" class="mt-5 space-y-4">
            <Label>Silahkan masukkan alamat anda : </Label>

            <textarea
                v-model="form.address"
                name="address"
                class="w-full border border-border rounded-xl p-2 px-3 text-sm resize-none min-h-[112px]"
            />

            <p class="text-xs text-pink-600" v-if="form.errors.address">
                {{ form.errors.address }}
            </p>

            <div class="flex flex-col w-full gap-4">
                <div class="flex justify-between border-b pb-4">
                    <h2 class="text-sm font-semibold flex-[2]">
                        Produk Dipesan
                    </h2>
                    <p class="text-sm font-semibold flex-1">Harga Satuan</p>
                    <p class="text-sm font-semibold flex-1">Jumlah</p>
                    <p class="text-sm font-semibold flex-1">Subtotal Produk</p>
                </div>

                <ul class="flex w-full flex-col gap-4">
                    <div
                        class="flex justify-between w-full items-center"
                        v-for="cartItem in cartItemData"
                        :key="cartItem.id"
                    >
                        <div class="flex items-center gap-4 flex-[2]">
                            <img
                                :src="cartItem.product_url"
                                alt="prod-img"
                                class="w-10 h-10 object-cover"
                            />
                            <p class="font-medium">
                                {{ cartItem.name }}
                            </p>
                        </div>

                        <p class="flex-1">
                            Rp. {{ formatCurrency(cartItem.price) }}
                        </p>
                        <p class="flex-1">
                            {{ cartItem.qty }}
                        </p>
                        <p class="flex-1 font-semibold">
                            Rp.
                            {{ formatCurrency(cartItem.price * cartItem.qty) }}
                        </p>
                    </div>
                </ul>

                <div class="mt-6 flex justify-end gap-8 items-center">
                    <p class="text-md">Total Pembayaran :</p>

                    <h1 class="text-xl font-bold">
                        Rp. {{ formattedTotalPrice }}
                    </h1>
                </div>

                <Button type="submit" class="mt-6">Pesan</Button>
            </div>
        </form>
    </RootLayout>
</template>
