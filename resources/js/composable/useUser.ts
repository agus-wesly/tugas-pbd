import { usePage } from "@inertiajs/vue3";
import { computed } from "vue";

export default function useUser() {
    const page = usePage();
    const user = computed(() => page.props.auth.user);

    return { user };
}
