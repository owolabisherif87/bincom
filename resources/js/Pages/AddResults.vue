<template>
    <Head title="Polling Units" />
    <Header />

    <div class="p-5 flex flex-col items-center w-full">
        <h1 class="font-bold mb-2 text-xl">Polling Result Upload Form</h1>
        <div class="w-96 mb-10">
            <div v-if="msg" class="text-red-500 mb-2">
                {{ msg }}
            </div>
            <select
                class="border border-gray-400 rounded-sm w-full mb-3"
                v-model="form.unitId"
            >
                <option value="" selected disabled>Select Polling Unit</option>
                <option
                    :value="unit.uniqueid"
                    v-for="unit in units"
                    :key="unit.uniqueid"
                >
                    {{ unit.polling_unit_name }}
                </option>
            </select>
            <div class="w-full mb-3">
                <label>PARTY ABBREVIATION</label>
                <input
                    type="text"
                    class="border border-gray-400 rounded-sm w-full p-2"
                    placeholder="Enter party abbreviation e.g PDP"
                    v-model="form.party_abbreviation"
                />
            </div>
            <div class="w-full mb-3">
                <label>PARTY SCORE</label>
                <input
                    type="number"
                    class="border border-gray-400 rounded-sm w-full p-2"
                    placeholder="Enter party score"
                    v-model="form.party_score"
                />
            </div>
            <div class="w-full mb-3">
                <label>USER</label>
                <input
                    type="text"
                    class="border border-gray-400 rounded-sm w-full p-2"
                    placeholder="Enter your name"
                    v-model="form.user"
                />
            </div>
            <div class="w-full mb-3">
                <button
                    class="
                        border-none
                        p-3
                        text-white
                        font-bold
                        text-md
                        bg-green-500
                        rounded-sm
                        shadow-md
                        w-full
                    "
                    @click.prevent="submit"
                >
                    SUBMIT
                </button>
            </div>
        </div>
    </div>
</template>

<script>
import { Head, Link } from "@inertiajs/inertia-vue3";
import { onMounted, ref } from "@vue/runtime-core";
import Header from "@/Components/Header.vue";
import axios from "axios";

export default {
    components: {
        Head,
        Header,
        Link,
    },

    setup() {
        const form = ref({
            unitId: "",
            party_abbreviation: "",
            party_score: 0,
            user: "",
        });
        const units = ref([]);
        const msg = ref("");

        const getUnits = () => {
            axios
                .get(route("all-units"))
                .then((res) => {
                    units.value = res.data;
                })
                .catch((err) => {
                    console.log(err.message.toString());
                });
        };

        const submit = () => {
            if (
                form.value.unitId === "" ||
                form.value.party_abbreviation === "" ||
                form.value.party_score === 0 ||
                form.value.user === ""
            ) {
                msg.value = "All fields are required";
                return;
            }

            // Changed from route()
            axios
                .post(
                    "https://shrouded-everglades-39975.herokuapp.com/store",
                    JSON.parse(JSON.stringify(form.value))
                )
                .then((_) => {
                    msg.value = "Result was added successfully!";

                    form.value.unitId = "";
                    form.value.party_abbreviation = "";
                    form.value.party_score = 0;
                    form.value.user = "";

                    setTimeout(() => {
                        msg.value = "";
                    }, 5000);
                })
                .catch((err) => {
                    console.log(err.message.toString());
                });
        };

        getUnits();
        return { form, units, msg, submit };
    },
};
</script>
