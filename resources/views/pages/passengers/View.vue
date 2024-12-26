<template layout="default">
    <h1 class="text-2xl font-bold text-black mb-5">
        Viewing Passenger: {{ passengers.name }} Details
    </h1>
    <div
        class="container bg-gray-100 border border-gray-600 w-[1000px] shadow p-10 mx-auto m-10"
    >
        <div v-if="passengers" class="text-white mt-2">
            <table class="table mt-3 text-center">
                <thead>
                    <tr>
                        <th>ID.</th>
                        <th>Name</th>
                        <th>Gender</th>
                        <th>Seat Number</th>
                        <th>Arrival</th>
                        <th>Departure</th>
                        <th>Ticket Acquired</th>
                        <th>Age</th>
                        <th>Price</th>
                    </tr>
                </thead>
                <tbody>
                    <tr
                        class="text-black"
                    >
                        <td>{{ passengers.id }}</td>
                        <td>{{ passengers.name }}</td>
                        <td>{{ passengers.gender }}</td>
                        <td>{{ passengers.seat_number }}</td>
                        <td>{{ passengers.arrival }}</td>
                        <td>{{ passengers.departure }}</td>
                        <td>{{ passengers.ticket_acquired }}</td>
                        <td>{{ passengers.age }}</td>
                        <td v-if="passengers.ticket_acquired === 'Business'">
                            &#8369;{{
                                passengers.ship.business.toLocaleString({
                                    minimumFractionDigits: 2,
                                })
                            }}
                        </td>
                        <td v-if="passengers.ticket_acquired === 'Premium'">
                            &#8369;{{
                                passengers.ship.premium.toLocaleString({
                                    minimumFractionDigits: 2,
                                })
                            }}
                        </td>
                        <td v-if="passengers.ticket_acquired === 'Economy'">
                            &#8369;{{
                                passengers.ship.economy.toLocaleString({
                                    minimumFractionDigits: 2,
                                })
                            }}
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <br />
        <Link
            class="bg-gray-500 hover:bg-gray-600 mt-1 text-center text-white font-bold py-2 mb-5 px-4 rounded"
            href="/passengers"
        >
            Back
        </Link>
    </div>
</template>

<script setup>
import { Inertia } from "@inertiajs/inertia";
import { Link } from "@inertiajs/inertia-vue3";

const props = defineProps({
    passengers: Array,
    rooms: Array,
});
</script>
