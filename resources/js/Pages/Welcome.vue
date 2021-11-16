<template>
    <Head
        title="Bincom Basic Programming Test: Experienced Software Developer"
    />
    <div
        class="
            w-full
            h-screen
            flex flex-col
            justify-center
            items-center
            bg-green-200
        "
    >
        <h1 class="text-4xl text-red-500 font-bold uppercase">Welcome To</h1>
        <h1 class="text-white text-4xl font-bold mb-4">INEC E-Poll</h1>
        <Link
            class="
                border-none
                p-3
                text-white
                font-bold
                text-md
                bg-green-500
                rounded-sm
                shadow-md
            "
            :href="route('polling-units')"
        >
            CLICK TO ENTER
        </Link>
    </div>
</template>

<script>
import { Head, Link } from "@inertiajs/inertia-vue3";

export default {
    components: {
        Head,
        Link,
    },
    props: {
        canLogin: Boolean,
        canRegister: Boolean,
        laravelVersion: String,
        phpVersion: String,
    },
};
</script>
