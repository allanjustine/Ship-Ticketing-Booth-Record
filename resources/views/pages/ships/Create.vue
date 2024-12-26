<template layout="default">
    <div
        class="container bg-sky-100 border border-sky-600 w-[800px] shadow p-10 mx-auto mt-5"
    >
        <h1 class="text-2xl font-bold mb-5 text-black text-center">
            Adding New Ship
        </h1>
        <form @submit.prevent="add">
            <div class="grid grid-cols-4 sm:grid-cols-4 gap-4">
                <div class="flex flex-col mb-4">
                    <label class="font-bold text-black mb-2" for="name"
                        >Ship Name:</label
                    >
                    <input
                        type="text"
                        id="name"
                        v-model="form.name"
                        class="border py-2 px-3 text-grey-darkest"
                    />
                    <span v-if="form.errors.name" class="text-red-600">{{
                        form.errors.name
                    }}</span>
                </div>

                <div class="flex flex-col mb-4">
                    <label class="font-bold text-black mb-2" for="capacity"
                        >Capacity:</label
                    >
                    <input
                        v-model="form.capacity"
                        type="number"
                        name="capacity"
                        id="capacity"
                        class="border py-2 px-3 text-grey-darkest"
                    />
                    <span v-if="form.errors.capacity" class="text-red-600">{{
                        form.errors.capacity
                    }}</span>
                </div>

                <div class="flex flex-col mb-4">
                    <label
                        class="font-bold text-black mb-2"
                        for="travel_duration"
                        >Travel Duration:</label
                    >
                    <input
                        v-model="form.travel_duration"
                        type="text"
                        id="travel_duration"
                        name="travel_duration"
                        class="border py-2 px-3 text-grey-darkest"
                    />
                    <span
                        v-if="form.errors.travel_duration"
                        class="text-red-600"
                        >{{ form.errors.travel_duration }}</span
                    >
                </div>
                <div class="flex flex-col mb-4">
                    <label
                        class="font-bold text-black mb-2"
                        for="business"
                        >Business Class Price:</label
                    >
                    <input
                        v-model="form.business"
                        type="number"
                        id="business"
                        name="business"
                        class="border py-2 px-3 text-grey-darkest"
                    />
                    <span
                        v-if="form.errors.business"
                        class="text-red-600"
                        >{{ form.errors.business }}</span
                    >
                </div>
                <div class="flex flex-col mb-4">
                    <label
                        class="font-bold text-black mb-2"
                        for="premium"
                        >Premium Class Price:</label
                    >
                    <input
                        v-model="form.premium"
                        type="number"
                        id="premium"
                        name="premium"
                        class="border py-2 px-3 text-grey-darkest"
                    />
                    <span
                        v-if="form.errors.premium"
                        class="text-red-600"
                        >{{ form.errors.premium }}</span
                    >
                </div>
                <div class="flex flex-col mb-4">
                    <label
                        class="font-bold text-black mb-2"
                        for="economy"
                        >Economy Class Price:</label
                    >
                    <input
                        v-model="form.economy"
                        type="number"
                        id="economy"
                        name="economy"
                        class="border py-2 px-3 text-grey-darkest"
                    />
                    <span
                        v-if="form.errors.economy"
                        class="text-red-600"
                        >{{ form.errors.economy }}</span
                    >
                </div>
                <div class="flex flex-col mb-4">
                    <label class="font-bold text-black mb-2" for="status"
                        >Status:</label
                    >
                    <select
                        v-model="form.status"
                        name="status"
                        id="status"
                        class="border py-2 px-3 text-grey-darkest"
                    >
                        <option value="" hidden="true">Select Status</option>
                        <option disabled>Select Status</option>
                        <option value="Available">Available</option>
                        <option value="Not Available">Not Available</option>
                    </select>
                    <span v-if="form.errors.status" class="text-red-600">{{
                        form.errors.status
                    }}</span>
                </div>
            </div>

            <div class="flex items-center justify-between">
                <button
                    type="submit"
                    class="bg-sky-500 hover:bg-sky-600 text-white font-bold py-2 px-4 rounded"
                >
                    Save
                </button>
                <Link
                    href="/rooms"
                    class="bg-gray-500 hover:bg-gray-600 mt-1 text-center text-white font-bold py-2 px-4 rounded"
                >
                    Back
                </Link>
            </div>
        </form>
    </div>
</template>

<script setup>
import { useForm } from "@inertiajs/inertia-vue3";
import { Link } from "@inertiajs/inertia-vue3";

let form = useForm({
    name: "",
    capacity: "",
    travel_duration: "",
    business: "",
    premium: "",
    economy: "",
    status: "",
});

const add = () => {
    form.post("/ships");
};
</script>
