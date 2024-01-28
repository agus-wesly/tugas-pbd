<script setup lang="ts">
import { useVModel } from "@vueuse/core";
import { cn } from "@/lib/utils";
import { useAttrs, computed, ref } from "vue";
import { Eye, EyeOff } from "lucide-vue-next";

const props = defineProps<{
    defaultValue?: string | number;
    modelValue?: string | number;
}>();

defineOptions({
    inheritAttrs: false,
});

const attrs = useAttrs();
const hide = ref(false);

if (attrs.type === "password") {
    hide.value = true;
}

const type = computed(() => (hide.value ? "password" : "text"));

const emits = defineEmits<{
    (e: "update:modelValue", payload: string | number): void;
}>();

const modelValue = useVModel(props, "modelValue", emits, {
    passive: true,
    defaultValue: props.defaultValue,
});
</script>

<template>
    <div class="relative">
        <input
            v-bind="$attrs"
            v-model="modelValue"
            :type="type"
            :class="
                cn(
                    'flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50',
                    $attrs.class ?? ''
                )
            "
        />

        <button
            v-if="$attrs.type === 'password'"
            type="button"
            class="absolute top-3 right-3"
            @click="hide = !hide"
        >
            <Eye class="w-4 h-4" v-if="type == 'text'" />
            <EyeOff class="w-4 h-4" v-else />
        </button>
    </div>
</template>
