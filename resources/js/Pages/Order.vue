<script setup lang="ts">
import RootLayout from "@/Layouts/RootLayout.vue";
import OrderItemCard from "@/components/order-item-card.vue";
import useCart from "@/composable/useCart";
import { onMounted, ref, computed } from "vue";
import { Alert, AlertDescription, AlertTitle } from "@/components/ui/alert";
import {
    AlertDialog,
    AlertDialogCancel,
    AlertDialogContent,
    AlertDialogDescription,
    AlertDialogFooter,
    AlertDialogHeader,
    AlertDialogTitle,
} from "@/components/ui/alert-dialog";
import { Button } from "@/components/ui/button";
import { useForm } from "@inertiajs/vue3";

let props = defineProps<{ orders: Order[]; flash?: { message?: string } }>();
let { resetCart } = useCart();

let activeOrderIdToBeCanceled = ref<number | null>(null);

let form = useForm({
    activeId: null,
});

let isActiveCancelModal = computed(() => !!activeOrderIdToBeCanceled.value);

onMounted(() => {
    if (props.flash?.message === "ordered") {
        resetCart();
    }
});

function handleShowModal(id: number) {
    activeOrderIdToBeCanceled.value = id;
}

function handleCloseModal(open: boolean) {
    activeOrderIdToBeCanceled.value = null;
}

function handleCancelOrder(e: Event) {
    form.transform((data) => {
        return {
            activeId: activeOrderIdToBeCanceled.value,
        };
    }).delete("/order");
    activeOrderIdToBeCanceled.value = null;
}
</script>

<template>
    <RootLayout>
        <Alert
            v-if="props.flash?.message === 'ordered'"
            class="my-5 bg-green-600 text-neutral-50"
        >
            <AlertTitle class="text-sm">Sukses</AlertTitle>
            <AlertDescription class="text-xs">
                Produk sukses dipesan
            </AlertDescription>
        </Alert>
        <div class="mt-5">
            <h1>List pesanan anda :</h1>

            <p class="mt-5 text-muted-foreground" v-if="!orders.length">
                Belum ada pesanan. Silahkan mulai memesan
            </p>

            <OrderItemCard
                v-else
                v-for="order in orders"
                :key="order.id"
                :order="order"
                :totalPrice="order.total"
                @showModal="handleShowModal"
            />
        </div>
    </RootLayout>

    <AlertDialog :open="isActiveCancelModal" @update:open="handleCloseModal">
        <AlertDialogContent>
            <AlertDialogHeader>
                <AlertDialogTitle>Batalkan Pesanan ini ?</AlertDialogTitle>
                <AlertDialogDescription>
                    Pesanan akan dihapus secara permanen. ID
                    {{ activeOrderIdToBeCanceled }}
                </AlertDialogDescription>
            </AlertDialogHeader>
            <AlertDialogFooter>
                <AlertDialogCancel class="flex-1">Cancel</AlertDialogCancel>
                <Button
                    @click="handleCancelOrder"
                    size="sm"
                    class="flex-1 bg-red-600"
                    >Batalkan Pesanan</Button
                >
            </AlertDialogFooter>
        </AlertDialogContent>
    </AlertDialog>
</template>
