<script setup lang="ts">
import RootLayout from "@/Layouts/RootLayout.vue";
import { useForm } from "@inertiajs/vue3";
import { ref, computed } from "vue";
import { Button } from "@/components/ui/button";
import { Input } from "@/components/ui/input";
import { Label } from "@/components/ui/label";
import useUser from "@/composable/useUser";
import { onUnmounted } from "vue";

const { user } = useUser();

const form = useForm({
    email: user.value.email || "",
    username: user.value.username || "",
    name: user.value.name || "",
    profile_url: user.value.profile_url || "",
    profile: null,
});

let isSubmitting = ref(false);

let tempFilePofile = ref<File | null>(null);

let profileSrc = computed(() => {
    if (tempFilePofile.value) return URL.createObjectURL(tempFilePofile.value);
    if (form.profile_url) return form.profile_url;
    return "/profile.jpeg";
});

function handleFileInputChange(e: Event) {
    let inputFile = e.currentTarget as HTMLInputElement;
    let file = inputFile.files?.[0];
    if (!file) return;

    tempFilePofile.value = file;
}

function onSubmit() {
    form.transform((data) => ({
        ...data,
        profile_url: profileSrc.value,
        profile: tempFilePofile.value,
    })).post("/profile");
}
</script>

<template>
    <RootLayout>
        <h1 class="mt-4 font-bold">Pengaturan Akun</h1>

        <form @submit.prevent="onSubmit">
            <div class="flex flex-col items-center mb-4 gap-2">
                <div
                    for="file-input"
                    class="flex items-center justify-center w-36 h-36 md:w-48 md:h-48 bg-purple-500 rounded-full mx-auto overflow-hidden"
                >
                    <img
                        alt="profile"
                        :src="profileSrc"
                        class="w-full h-full object-cover"
                    />
                </div>
                <label
                    for="file-input"
                    class="text-sm font-bold text-blue-600 cursor-pointer"
                    >Change avatar</label
                >
            </div>
            <fieldset :disabled="isSubmitting" class="grid gap-4">
                <input
                    name="profile_url"
                    @change="handleFileInputChange"
                    type="file"
                    class="hidden"
                    id="file-input"
                />
                <div class="grid gap-1">
                    <label for="name"> Name </label>
                    <Input
                        id="name"
                        name="name"
                        auto-capitalize="none"
                        auto-complete="email"
                        auto-correct="off"
                        v-model="form.name"
                    />
                    <p class="text-xs text-pink-600" v-if="form.errors.name">
                        {{ form.errors.name }}
                    </p>
                </div>
                <div class="grid gap-1">
                    <Label for="username"> Username </Label>
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
                    <p class="text-xs text-pink-600" v-if="form.errors.email">
                        {{ form.errors.email }}
                    </p>
                </div>

                <Button type="submit"> Edit profile </Button>
            </fieldset>
        </form>
    </RootLayout>
</template>
