<template>
    <Head title="Polling Units" />
    <Header />

    <div class="p-5 flex flex-col items-center">
        <div class="w-40 mb-10">
            <h1 class="font-bold mb-2">Select LGA</h1>
            <select
                class="border border-gray-400 rounded-sm w-full"
                v-model="lgaId"
                @change="selectLga()"
            >
                <option value="" selected disabled>Select LGA</option>
                <option :value="lga.lga_id" v-for="lga in lgas" :key="lga">
                    {{ lga.lga_name }}
                </option>
            </select>
        </div>
        <div
            class="
                table-auto
                w-full
                flex flex-row
                text-2xl
                justify-center
                items-center
            "
            v-if="result"
        >
            <div class="font-bold mr-3">Total Result:</div>
            <div>{{ result }}</div>
        </div>
        <div v-else>
            <h1 class="font-bold text-green-500 uppercase">
                No result to show!
            </h1>
        </div>
    </div>
</template>

<script>
import { Head, Link } from "@inertiajs/inertia-vue3";
import { onMounted, ref } from "@vue/runtime-core";
import Header from "@/Components/Header.vue";
// import axios from "axios";

export default {
    components: {
        Head,
        Header,
        Link,
    },
    props: {
        lgas: Array,
    },

    setup({ units }) {
        const lgaId = ref("");
        const result = ref("");

        const selectLga = () => {
            if (lgaId.value === "") return;
            window.location.reload();

            axios
                .get(
                    `https://shrouded-everglades-39975.herokuapp.com/lga-results/${lgaId.value}`
                )
                // .get(route("lga-results", lgaId.value))
                .then((res) => {
                    result.value = res.data;
                })
                .catch((err) => {
                    console.log(err.message.toString());
                });
        };
        return { lgaId, result, selectLga };
    },
};
</script>
