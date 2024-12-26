<template layout>
    <div>
        <h1 class="mb-2">Passengers</h1>
    </div>
    <div class="bg-sky-100 w-[1250px] p-5 text-white rounded mt-5">
        <Link
            href="/passengers/create"
            class="btn bg-sky-600 hover:bg-sky-700 float-left block text-center mt-5 mb-4"
            >Add Passengers</Link
        >
        <div class="py-4">
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
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr
                        v-for="passenger of passengers.data"
                        :key="passenger.id"
                        class="text-black"
                    >
                        <td>{{ passenger.id }}</td>
                        <td>{{ passenger.name }}</td>
                        <td>{{ passenger.gender }}</td>
                        <td>{{ passenger.seat_number }}</td>
                        <td>{{ passenger.arrival }}</td>
                        <td>{{ passenger.departure }}</td>
                        <td>{{ passenger.ticket_acquired }}</td>
                        <td>{{ passenger.age }}</td>
                        <td v-if="passenger.ticket_acquired === 'Business'">
                            &#8369;{{
                                passenger.ship.business.toLocaleString({
                                    minimumFractionDigits: 2,
                                })
                            }}
                        </td>
                        <td v-if="passenger.ticket_acquired === 'Premium'">
                            &#8369;{{
                                passenger.ship.premium.toLocaleString({
                                    minimumFractionDigits: 2,
                                })
                            }}
                        </td>
                        <td v-if="passenger.ticket_acquired === 'Economy'">
                            &#8369;{{
                                passenger.ship.economy.toLocaleString({
                                    minimumFractionDigits: 2,
                                })
                            }}
                        </td>
                        <td>
                            <span class="flex">
                                <Link
                                    :href="'/passengers/view/' + passenger.id"
                                    class="mr-1 btn bg-yellow-600 hover:bg-yellow-700"
                                >
                                    View
                                </Link>
                                <Link
                                    :href="'/passengers/edit/' + passenger.id"
                                    class="btn bg-sky-600 hover:bg-sky-700"
                                >
                                    Edit
                                </Link>
                                <Link
                                    :href="'/passengers/delete/' + passenger.id"
                                    class="ml-1 btn bg-red-700 hover:bg-red-800"
                                >
                                    Delete
                                </Link>
                            </span>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="flex justify-between">
            <div class="text-black">
                Showing <strong>{{ passengers.data.length }}</strong> entries.
            </div>
            <nav
                class="isolate inline-flex -space-x-px rounded-md shadow-sm"
                aria-label="Pagination"
            >
                <ul class="pagination">
                    <li
                        v-for="page in passengers.links"
                        :key="page.url"
                        :class="{
                            ' relative z-10 inline-flex items-center text-sky-900 ring-1 ring-inset ring-sky-300 hover:bg-sky-50 focus:outline-offset-0':
                                !page.active && page.label !== 'Previous',
                            ' relative z-10 inline-flex items-center text-sm font-semibold text-white focus:z-20 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600':
                                page.active,
                            'opacity-50 cursor-not-allowed relative z-10 inline-flex items-center px-4 py-2 text-sm font-semibold text-sky-300 ring-1 ring-inset ring-sky-300':
                                !page.url && page.label === 'Previous',
                        }"
                    >
                        <Link
                            v-if="page.url"
                            :href="page.url"
                            :class="{
                                'cursor-pointer relative z-10 inline-flex items-center px-4 py-2 text-sm font-semibold text-sky-900 ring-1 ring-inset ring-sky-300 hover:bg-sky-50 focus:outline-offset-0':
                                    !page.active && page.label !== 'Previous',
                                'cursor-pointer relative z-10 inline-flex items-center bg-sky-300 px-4 py-2 text-sm font-semibold text-black focus:z-20 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600':
                                    page.active,
                                'opacity-50 cursor-not-allowed relative z-10 inline-flex items-center px-4 py-2 text-sm font-semibold text-sky-300 ring-1 ring-inset ring-sky-300':
                                    !page.url && page.label === 'Previous',
                            }"
                        >
                            <span v-if="page.label.includes('Next')"
                                >Next <i class="fas fa-chevron-right"></i
                            ></span>

                            <span v-else-if="page.label.includes('Previous')">
                                <i class="fas fa-chevron-left"></i> Previous
                            </span>
                            <span v-else class="page-link">{{
                                page.label
                            }}</span>
                        </Link>
                        <span
                            v-else-if="page.label.includes('Previous')"
                            class="cursor-not-allowed px-4 py-2"
                            ><i class="fas fa-chevron-left"></i> Previous</span
                        >
                        <span v-else class="cursor-not-allowed px-4 py-2"
                            >Next <i class="fas fa-chevron-right"></i
                        ></span>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</template>

<script setup>
import { Link } from "@inertiajs/inertia-vue3";

defineProps({
    passengers: Array,
});
</script>
