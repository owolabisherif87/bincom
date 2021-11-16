<template>
    <Head title="Polling Units" />
    <Header />
    <div class="w-full max-h-52 flex items-center mb-4 p-5">
        <h1 class="text-xl font-bold text-gray-500 uppercase">
            Polling Units In Delta State
        </h1>
    </div>

    <div class="p-5">
        <table class="table-auto w-full">
            <thead>
                <tr class="font-bold">
                    <td>S/N</td>
                    <td>NAME</td>
                    <td>DESC.</td>
                    <td>NUMBER</td>
                    <td>LAT.</td>
                    <td>LONG.</td>
                    <td>ACTION</td>
                </tr>
            </thead>
            <tbody>
                <tr
                    v-for="(unit, index) in units"
                    :key="index"
                    :class="(index + 1) % 2 == 0 ? 'bg-gray-200' : ''"
                >
                    <td class="py-2">{{ index + 1 }}</td>
                    <td class="py-2">
                        {{ unit.polling_unit_name || "Not specified" }}
                    </td>
                    <td class="py-2">
                        {{ unit.polling_unit_description || "Not specified" }}
                    </td>
                    <td class="py-2">
                        {{ unit.polling_unit_number || "Not specified" }}
                    </td>
                    <td class="py-2">{{ unit.lat }}</td>
                    <td class="py-2">{{ unit.long }}</td>
                    <td>
                        <Link
                            :href="route('polling-unit-results', unit.uniqueid)"
                            class="hover:text-green-400"
                            >RESULTS</Link
                        >
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
import { Head, Link } from "@inertiajs/inertia-vue3";
import { onMounted } from "@vue/runtime-core";
import Header from "@/Components/Header.vue";

export default {
    components: {
        Head,
        Header,
        Link,
    },
    props: {
        units: Array,
    },

    setup({ units }) {},
};
</script>
