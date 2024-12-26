<template layout="default">
    <div
        class="container bg-sky-100 border border-sky-600 w-[600px] shadow p-10 mx-auto mt-5"
    >
        <h1 class="text-2xl font-bold mb-5 text-black text-center">
            Add Passenger
        </h1>
        <form @submit.prevent="add">
            <div class="grid grid-cols-4 sm:grid-cols-4 gap-4">
                <div class="flex flex-col mb-4">
                    <label class="font-bold text-black mb-2" for="ship_id"
                        >Available Ship:</label
                    >
                    <select
                        v-model="form.ship_id"
                        name="ship_id"
                        id="ship_id"
                        class="border py-2 px-3 text-grey-darkest"
                    >
                        <option value="" hidden="true">Select Ship</option>
                        <option disabled>Select Ship</option>
                        <option
                            v-for="ship in ships"
                            :key="ship.id"
                            :value="ship.id"
                        >
                            Ship: {{ ship.name }}, Capacity:
                            {{ ship.capacity }}
                        </option>
                    </select>
                    <span v-if="form.errors.ship_id" class="text-red-600">{{
                        form.errors.ship_id
                    }}</span>
                </div>
                <div class="flex flex-col mb-4">
                    <label class="font-bold text-black mb-2" for="name"
                        >Name:</label
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
                    <label class="font-bold text-black mb-2" for="age"
                        >Age:</label
                    >
                    <input
                        type="number"
                        id="age"
                        v-model="form.age"
                        class="border py-2 px-3 text-grey-darkest"
                    />
                    <span v-if="form.errors.age" class="text-red-600">{{
                        form.errors.age
                    }}</span>
                </div>
                <div class="flex flex-col mb-4">
                    <label class="font-bold text-black mb-2" for="seat_number"
                        >Seat Number:</label
                    >
                    <input
                        type="text"
                        id="seat_number"
                        v-model="form.seat_number"
                        class="border py-2 px-3 text-grey-darkest"
                    />
                    <span v-if="form.errors.seat_number" class="text-red-600">{{
                        form.errors.seat_number
                    }}</span>
                </div>
            </div>
            <div class="grid grid-cols-4 sm:grid-cols-4 gap-4">
                <div class="flex flex-col mb-4">
                    <label class="font-bold text-black mb-2" for="arrival"
                        >Arrival:</label
                    >
                    <input
                        type="text"
                        id="arrival"
                        v-model="form.arrival"
                        class="border py-2 px-3 text-grey-darkest"
                    />
                    <span v-if="form.errors.arrival" class="text-red-600">{{
                        form.errors.arrival
                    }}</span>
                </div>
                <div class="flex flex-col mb-4">
                    <label class="font-bold text-black mb-2" for="departure"
                        >Departure:</label
                    >
                    <input
                        type="text"
                        id="departure"
                        v-model="form.departure"
                        class="border py-2 px-3 text-grey-darkest"
                    />
                    <span v-if="form.errors.departure" class="text-red-600">{{
                        form.errors.departure
                    }}</span>
                </div>
                <div class="flex flex-col mb-4">
                    <label
                        class="font-bold text-black mb-2"
                        for="ticket_acquired"
                        >Ticket Acquired:</label
                    >
                    <select
                        v-model="form.ticket_acquired"
                        name="ticket_acquired"
                        id="ticket_acquired"
                        class="border py-2 px-3 text-grey-darkest"
                    >
                        <option value="" hidden="true">
                            Select Ticket Acquired
                        </option>
                        <option disabled>Select Ticket Acquired</option>
                        <option value="Business">Business</option>
                        <option value="Premium">Premium</option>
                        <option value="Economy">Economy</option>
                    </select>
                    <span
                        v-if="form.errors.ticket_acquired"
                        class="text-red-600"
                        >{{ form.errors.ticket_acquired }}</span
                    >
                </div>
                <div class="flex flex-col mb-4">
                    <label class="font-bold text-black mb-2" for="gender"
                        >Gender:</label
                    >
                    <select
                        v-model="form.gender"
                        name="gender"
                        id="gender"
                        class="border py-2 px-3 text-grey-darkest"
                    >
                        <option value="" hidden="true">Select Gender</option>
                        <option disabled>Select Gender</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                    <span v-if="form.errors.gender" class="text-red-600">{{
                        form.errors.gender
                    }}</span>
                </div>
            </div>
            <div class="flex justify-between">
                <button
                    type="submit"
                    class="bg-sky-500 hover:bg-sky-800 text-white font-bold block py-2 px-4 rounded"
                >
                    Save
                </button>

                <Link
                    href="/passengers"
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

const props = defineProps({
    ships: Object,
});

let form = useForm({
    name: "",
    gender: "",
    seat_number: "",
    arrival: "",
    departure: "",
    ticket_acquired: "",
    age: "",
    ship_id: "",
});

const add = () => {
    form.post("/passengers");
};
</script>
