<template>
    <div
        class="
            w-full
            h-16
            bg-green-500
            text-white
            font-bold
            text-lg
            uppercase
            flex flex-row
            items-center
        "
    >
        <template v-for="link in links" :key="link">
            <Link :href="route(link.href)" class="mx-4">
                {{ link.text }}
            </Link>
        </template>
    </div>
</template>
<script>
import { ref } from "@vue/reactivity";
import { Head, Link } from "@inertiajs/inertia-vue3";
export default {
    components: {
        Link,
    },
    setup() {
        const links = ref([
            {
                text: "Polling Units",
                href: "polling-units",
            },
            {
                text: "LGA Results",
                href: "lgas",
            },
            {
                text: "Add Results",
                href: "add-results",
            },
        ]);

        return { links };
    },
};
</script>
