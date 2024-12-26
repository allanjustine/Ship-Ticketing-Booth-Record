<template layout>
    <div
        class="container mx-auto p-4 h-[900px]"
        style="
            background-image: url('/images/bg.jpg');
            background-repeat: no-repeat;
            background-size: cover;
        "
    >
        <div
            class="flex flex-col items-center justify-center min-h-screen"
            style="margin-top: -100px"
        >
            <h1 class="text-4xl font-bold mb-6">
                Welcome to the Ticketing Booth!
            </h1>
            <div class="grid grid-cols-2 gap-20">
                <div
                    class="flex flex-col items-center p-4 bg-white rounded-lg shadow-md"
                >
                    <h2 class="text-2xl font-semibold mb-2">
                        Total Passengers
                    </h2>
                    <span class="w-64 h-20 text-center mt-20 mb-2 rounded-lg"
                        ><h1>
                            {{ totalPassengers }}
                        </h1></span
                    >
                    <Link
                        v-if="!auth.user"
                        href="/login"
                        class="bg-blue-500 text-white font-bold py-2 px-4 rounded hover:bg-blue-600 focus:outline-none focus:shadow-outline"
                        >Proceed</Link
                    >
                </div>
                <div
                    class="flex flex-col items-center p-4 bg-white rounded-lg shadow-md"
                >
                    <h2 class="text-2xl font-semibold mb-2">Total Ships</h2>
                    <span class="w-64 h-20 text-center mt-20 mb-2 rounded-lg"
                        ><h1>
                            {{ totalShips }}
                        </h1></span
                    >
                    <Link
                        v-if="!auth.user"
                        href="/login"
                        class="bg-blue-500 text-white font-bold py-2 px-4 rounded hover:bg-blue-600 focus:outline-none focus:shadow-outline"
                        >Proceed</Link
                    >
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { Link, usePage } from "@inertiajs/inertia-vue3";

const props = defineProps({
    auth: Array,
    totalPassengers: Number,
    totalShips: Number,
});

const user = usePage().props.auth;

console.log(user);
</script>
