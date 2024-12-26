<template layout>
    <div>
        <h1 class="mb-3">Ships List</h1>
    </div>
    <div class="bg-sky-100 w-[1250px] p-5 text-white rounded mt-5">
        <br />
        <Link
            href="/ships/create"
            class="btn bg-sky-500 text-center hover:bg-sky-600 mt-5 mb-4"
            >Add New Ship</Link
        >
        <div class="py-4">
            <table class="table mt-5 text-center">
                <thead>
                    <tr>
                        <th>ID.</th>
                        <th>Name</th>
                        <th>Capacity</th>
                        <th>Travel Duration</th>
                        <th>Business Class Price</th>
                        <th>Premium Class Price</th>
                        <th>Economy Class Price</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr
                        v-for="ship in ships.data"
                        :key="ship.id"
                        class="text-black"
                    >
                        <td>{{ ship.id }}</td>
                        <td>{{ ship.name }}</td>
                        <td>{{ ship.capacity }}</td>
                        <td>{{ ship.travel_duration }}</td>
                        <td>
                            &#8369;
                            {{
                                ship.business.toLocaleString({
                                    minimumFractionDigits: 2,
                                })
                            }}
                        </td>
                        <td>
                            &#8369;
                            {{
                                ship.premium.toLocaleString({
                                    minimumFractionDigits: 2,
                                })
                            }}
                        </td>
                        <td>
                            &#8369;
                            {{
                                ship.economy.toLocaleString({
                                    minimumFractionDigits: 2,
                                })
                            }}
                        </td>
                        <td>{{ ship.status }}</td>
                        <td>
                            <Link
                                :href="'/ships/edit/' + ship.id"
                                class="btn bg-sky-600 hover:bg-sky-700"
                            >
                                Edit
                            </Link>
                            <Link
                                :href="'/ships/delete/' + ship.id"
                                class="ml-1 btn bg-red-700 hover:bg-red-800"
                            >
                                Delete
                            </Link>
                        </td>
                    </tr>

                    <tr>
                        <td
                            v-if="ships.data.length === 0"
                            class="text-center text-black"
                            colspan="9"
                        >
                            No data.
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="flex justify-between">
            <div class="text-black">
                Showing <strong>{{ ships.data.length }}</strong> entries.
            </div>
            <nav
                class="isolate inline-flex -space-x-px rounded-md shadow-sm"
                aria-label="Pagination"
            >
                <ul class="pagination">
                    <li
                        v-for="page in ships.links"
                        :key="page.url"
                        :class="{
                            ' relative z-10 inline-flex items-center text-black ring-1 ring-inset ring-sky-300 hover:bg-sky-50 focus:outline-offset-0':
                                !page.active && page.label !== 'Previous',
                            ' relative z-10 inline-flex items-center text-sm font-semibold text-black focus:z-20 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-sky-900':
                                page.active,
                            'opacity-50 cursor-not-allowed relative z-10 inline-flex items-center px-4 py-2 text-sm font-semibold text-sky-300 ring-1 ring-inset ring-sky-300':
                                !page.url && page.label === 'Previous',
                        }"
                    >
                        <Link
                            v-if="page.url"
                            :href="page.url"
                            :class="{
                                'cursor-pointer relative z-10 inline-flex items-center px-4 py-2 text-sm font-semibold text-black ring-1 ring-inset ring-sky-300 hover:bg-sky-50 focus:outline-offset-0':
                                    !page.active && page.label !== 'Previous',
                                'cursor-pointer relative z-10 inline-flex items-center bg-sky-300 px-4 py-2 text-sm font-semibold text-black focus:z-20 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-sky-600':
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
    ships: Array,
});
</script>
