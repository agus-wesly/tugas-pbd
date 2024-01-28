<script setup>
import { cn } from "@/lib/utils";
import { Button } from "@/components/ui/button";
import { Input } from "@/components/ui/input";
import { Label } from "@/components/ui/label";
import { Link, useForm } from "@inertiajs/vue3";
import { ref } from "vue";

const isSubmitting = ref(false);

const form = useForm({
    email: null,
    password: null,
    username: null,
    name: null,
    password_confirmation: null,
});

function onSubmit() {
    form.post("/register");
}
</script>

<template>
    <main class="container mt-10 max-w-xl">
        <h1 class="mb-10 text-3xl font-[900] text-center">
            Register new account
        </h1>
        <div :class="cn('grid gap-6', $attrs.class ?? '')">
            <form @submit.prevent="onSubmit">
                <fieldset :disabled="isSubmitting" class="grid gap-4">
                    <div class="grid gap-1">
                        <Label for="email"> Email </Label>
                        <Input
                            id="email"
                            name="email"
                            type="email"
                            auto-capitalize="none"
                            auto-complete="email"
                            auto-correct="off"
                            v-model="form.email"
                        />
                        <p
                            class="text-xs text-pink-600"
                            v-if="form.errors.email"
                        >
                            {{ form.errors.email }}
                        </p>
                    </div>
                    <div class="grid gap-1">
                        <Label for="email"> Name </Label>
                        <Input
                            id="email"
                            name="name"
                            auto-capitalize="none"
                            auto-complete="email"
                            auto-correct="off"
                            v-model="form.name"
                        />
                        <p
                            class="text-xs text-pink-600"
                            v-if="form.errors.name"
                        >
                            {{ form.errors.name }}
                        </p>
                    </div>
                    <div class="grid gap-1">
                        <Label for="email"> Username </Label>
                        <Input
                            id="username"
                            name="username"
                            type="username"
                            auto-capitalize="none"
                            auto-complete="username"
                            auto-correct="off"
                            v-model="form.username"
                        />
                        <p
                            class="text-xs text-pink-600"
                            v-if="form.errors.username"
                        >
                            {{ form.errors.username }}
                        </p>
                    </div>

                    <div class="grid gap-1">
                        <Label>Password</Label>
                        <Input
                            v-model="form.password"
                            name="password"
                            type="password"
                        />
                        <p
                            class="text-xs text-pink-600"
                            v-if="
                                form.errors.password &&
                                form.errors.password !==
                                    'The password field confirmation does not match.'
                            "
                        >
                            {{ form.errors.password }}
                        </p>
                    </div>
                    <div class="grid gap-1">
                        <Label>Konfirmasi password</Label>
                        <Input
                            v-model="form.password_confirmation"
                            name="password_confirmation"
                            type="password"
                        />
                        <p
                            class="text-xs text-pink-600"
                            v-if="
                                form.errors.password &&
                                form.errors.password ===
                                    'The password field confirmation does not match.'
                            "
                        >
                            {{ form.errors.password }}
                        </p>
                    </div>
                    <Button type="submit"> Sign Up </Button>
                </fieldset>
            </form>
            <span class="bg-background px-2 text-muted-foreground text-sm">
                Sudah punya akun ?
                <Link href="/login" class="font-bold text-neutral-800 underline"
                    >Login sekarang</Link
                >
            </span>
        </div>
    </main>
</template>
