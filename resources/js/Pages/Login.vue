<script setup>
import { ref } from "vue";

import { cn } from "@/lib/utils";
import { Button } from "@/components/ui/button";
import { Input } from "@/components/ui/input";
import { Label } from "@/components/ui/label";
import { Link, useForm } from "@inertiajs/vue3";
import { Alert, AlertDescription, AlertTitle } from "@/components/ui/alert";

defineProps({
    flash: {
        message: {
            default: "",
            type: String,
        },
    },
});

const isSubmitting = ref(false);

const form = useForm({
    email: null,
    password: null,
});

async function onSubmit(event) {
    event.preventDefault();
    isSubmitting.value = true;

    form.post("/login");
    isSubmitting.value = false;
}
</script>

<template>
    <main class="container mt-10 max-w-xl">
        <h1 class="mb-10 text-3xl font-[900] text-center">
            Login to your account
        </h1>
        <Alert v-if="flash.message" variant="destructive" class="mb-5">
            <AlertTitle class="text-sm">Error</AlertTitle>
            <AlertDescription class="text-xs">
                {{ flash.message }}
            </AlertDescription>
        </Alert>
        <div :class="cn('grid gap-6', $attrs.class ?? '')">
            <form @submit.prevent="onSubmit">
                <fieldset :disabled="isSubmitting" class="grid gap-4">
                    <div class="grid gap-1">
                        <Label for="email"> Email </Label>
                        <Input
                            id="email"
                            name="email"
                            placeholder="name@example.com"
                            type="email"
                            auto-capitalize="none"
                            auto-complete="email"
                            auto-correct="off"
                            v-model="form.email"
                            required
                        />
                    </div>
                    <div class="grid gap-1">
                        <Label>Password</Label>
                        <Input
                            name="password"
                            type="password"
                            v-model="form.password"
                            required
                        />
                    </div>

                    <!-- <pre class="text-black">
                        {{ JSON.stringify($page) }}
                    </pre> -->
                    <Button type="submit"> Sign In </Button>
                </fieldset>
            </form>

            <span class="bg-background px-2 text-muted-foreground text-sm">
                Belum punya akun ?
                <Link
                    href="/register"
                    class="font-bold text-neutral-800 underline"
                    >Register sekarang</Link
                >
            </span>
        </div>
    </main>
</template>
