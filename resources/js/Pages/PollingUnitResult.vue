<template>
    <Head title="Polling Units" />
    <Header />
    <div class="w-full max-h-52 flex items-center mb-4 p-5">
        <h1 class="text-xl font-bold text-gray-500 uppercase">
            Showing Polling Results For {{ unit.polling_unit_name }} Polling
            Unit
        </h1>
    </div>

    <div class="mb-4 p-5">
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
            GO BACK
        </Link>
    </div>

    <div class="p-5">
        <table class="table-auto w-full" v-if="results.length">
            <thead>
                <tr>
                    <td>S/N</td>
                    <td>PARTY</td>
                    <td>SCORE</td>
                    <td>ENTERED BY</td>
                    <td>USER IP</td>
                    <td>DATE/TIME</td>
                </tr>
            </thead>
            <tbody>
                <tr
                    v-for="(result, index) in results"
                    :key="index"
                    :class="(index + 1) % 2 == 0 ? 'bg-gray-200' : ''"
                >
                    <td class="py-2">{{ index + 1 }}</td>
                    <td class="py-2">
                        {{ result.party_abbreviation || "Not specified" }}
                    </td>
                    <td class="py-2">
                        {{ result.party_score || "Not specified" }}
                    </td>
                    <td class="py-2">
                        {{ result.entered_by_user || "Not specified" }}
                    </td>
                    <td class="py-2">{{ result.user_ip_address }}</td>
                    <td class="py-2">{{ result.date_entered }}</td>
                </tr>
            </tbody>
        </table>
        <div
            v-else
            class="
                w-full
                h-auto
                flex flex-col
                justify-center
                items-center
                text-xl
                uppercase
                font-bold
                text-green-500
            "
        >
            No results yet from {{ unit.polling_unit_name }} Polling Unit
        </div>
    </div>
</template>

<script>
import { Head, Link } from "@inertiajs/inertia-vue3";
import Header from "../Components/Header.vue";
import { onMounted } from "@vue/runtime-core";

export default {
    components: {
        Head,
        Header,
        Link,
    },
    props: {
        results: Array,
        unit: Object,
    },

    setup({ results, unit }) {
        // console.log(unit);
    },
};
</script>
