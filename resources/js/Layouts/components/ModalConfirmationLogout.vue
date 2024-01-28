<script setup lang="ts">
import {
    AlertDialog,
    AlertDialogAction,
    AlertDialogCancel,
    AlertDialogContent,
    AlertDialogDescription,
    AlertDialogFooter,
    AlertDialogHeader,
    AlertDialogTitle,
} from "@/components/ui/alert-dialog";
import { Link } from "@inertiajs/vue3";
</script>

<template>
    <AlertDialog>
        <AlertDialogContent>
            <AlertDialogHeader>
                <AlertDialogTitle>Yakin ingin log out ?</AlertDialogTitle>
                <AlertDialogDescription>
                    Anda harus login kembali untuk dapat masuk ke aplikasi.
                </AlertDialogDescription>
            </AlertDialogHeader>
            <AlertDialogFooter>
                <AlertDialogCancel>Cancel</AlertDialogCancel>
                <AlertDialogAction as-child>
                    <Link
                        href="/logout"
                        class="text-xs cursor-pointer bg-red-600 w-fit"
                        >Logout</Link
                    >
                </AlertDialogAction>
            </AlertDialogFooter>
        </AlertDialogContent>
    </AlertDialog>
</template>
