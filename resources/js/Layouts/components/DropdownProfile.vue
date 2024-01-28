<script setup lang="ts">
import {
    DropdownMenu,
    DropdownMenuContent,
    DropdownMenuItem,
    DropdownMenuLabel,
    DropdownMenuTrigger,
} from "@/components/ui/dropdown-menu";

import useUser from "@/composable/useUser";
import { Link } from "@inertiajs/vue3";
import Button from "@/components/ui/button/Button.vue";

const { user } = useUser();

defineEmits<{
    (e: "openModal"): void;
}>();
</script>

<template>
    <DropdownMenu>
        <DropdownMenuTrigger as-child>
            <Button
                variant="outline"
                class="rounded-full w-8 h-8 p-0 flex items-center justify-center overflow-hidden border"
            >
                <img
                    :src="user.profile_url ?? '/img/profile.jpeg'"
                    class="w-full h-full object-cover"
                />
            </Button>
        </DropdownMenuTrigger>
        <DropdownMenuContent class="w-min font-semibold" align="end">
            <DropdownMenuLabel class="text-neutral-600">
                <p>@{{ user.username }}</p>
            </DropdownMenuLabel>
            <DropdownMenuItem>
                <Link href="/profile" class="text-xs cursor-pointer w-full"
                    >Profile</Link
                >
            </DropdownMenuItem>
            <DropdownMenuItem>
                <Link href="/order" class="text-xs cursor-pointer w-full"
                    >Semua Pesanan</Link
                >
            </DropdownMenuItem>
            <DropdownMenuItem>
                <button
                    @click="$emit('openModal')"
                    variant="outline"
                    class="text-xs text-left cursor-pointer w-full text-red-500"
                >
                    Logout
                </button>
            </DropdownMenuItem>
        </DropdownMenuContent>
    </DropdownMenu>
</template>
