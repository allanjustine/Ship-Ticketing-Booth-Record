<template layout="default">
    <div
        class="container bg-red-700 border text-white border-gray-600 w-[500px] shadow p-10 mx-auto mt-5"
    >
        <p class="mb-2">
            <strong
                >Deleting Ship: (<i>{{ ship.name }}</i
                >)</strong
            >
        </p>
        <hr />
        <br /><span class="text-2md font-bold text-white"
            >Are you sure you want to delete this ship to list?</span
        >
        <br />
        <div class="flex justify-between">
            <button
                @click="deleteShip"
                class="mt-10 bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded"
            >
                Yes, Proceed
            </button>
            <Link
                href="/ships"
                class="mt-10 bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded"
            >
                Cancel
            </Link>
        </div>
    </div>
</template>

<script setup>
import { Inertia } from "@inertiajs/inertia";
import { Link } from "@inertiajs/inertia-vue3";

const props = defineProps({
    ship: Object,
});

const deleteShip = () => {
    Inertia.post(`/ships/${props.ship.id}`, {
        _method: "delete",
    });
};
</script>
