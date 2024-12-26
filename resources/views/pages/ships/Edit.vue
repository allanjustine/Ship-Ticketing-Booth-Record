<template layout="default">
    <div
        class="container bg-sky-100 border border-sky-600 w-[800px] shadow p-10 mx-auto mt-5"
    >
        <h1 class="text-2xl font-bold mb-5 text-black text-center">
            Updating The Ship
        </h1>
        <form @submit.prevent="updating">
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
                    <label class="font-bold text-black mb-2" for="business"
                        >Business Class Price:</label
                    >
                    <input
                        v-model="form.business"
                        type="number"
                        id="business"
                        name="business"
                        class="border py-2 px-3 text-grey-darkest"
                    />
                    <span v-if="form.errors.business" class="text-red-600">{{
                        form.errors.business
                    }}</span>
                </div>
                <div class="flex flex-col mb-4">
                    <label class="font-bold text-black mb-2" for="premium"
                        >Premium Class Price:</label
                    >
                    <input
                        v-model="form.premium"
                        type="number"
                        id="premium"
                        name="premium"
                        class="border py-2 px-3 text-grey-darkest"
                    />
                    <span v-if="form.errors.premium" class="text-red-600">{{
                        form.errors.premium
                    }}</span>
                </div>
                <div class="flex flex-col mb-4">
                    <label class="font-bold text-black mb-2" for="economy"
                        >Economy Class Price:</label
                    >
                    <input
                        v-model="form.economy"
                        type="number"
                        id="economy"
                        name="economy"
                        class="border py-2 px-3 text-grey-darkest"
                    />
                    <span v-if="form.errors.economy" class="text-red-600">{{
                        form.errors.economy
                    }}</span>
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
                    Save Changes
                </button>
                <Link
                    href="/ships"
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
import { Inertia } from "@inertiajs/inertia";
import { Link } from "@inertiajs/inertia-vue3";

const props = defineProps({
    ship: Object,
});

let form = useForm({
    name: props.ship.name,
    capacity: props.ship.capacity,
    travel_duration: props.ship.travel_duration,
    business: props.ship.business,
    premium: props.ship.premium,
    economy: props.ship.economy,
    status: props.ship.status,
});

const updating = () => {
    Inertia.post(`/ships/${props.ship.id}`, {
        _method: "put",
        name: form.name,
        capacity: form.capacity,
        travel_duration: form.travel_duration,
        business: form.business,
        premium: form.premium,
        economy: form.economy,
        status: form.status,
    });
};
</script>
