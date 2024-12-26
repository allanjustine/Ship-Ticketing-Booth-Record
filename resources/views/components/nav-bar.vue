<template>
    <section class="bg-sky-200 shadow">
        <div class="wrapper flex">
            <div id="brand" class="text-lg text-sky-900 font-bold py-5" style="font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif">
                Ship Ticketing Booth Record
            </div>
            <nav class="main-nav py-2 ml-10">
                <Link class="main-link" href="/">Home</Link>
                <!-- <Link v-if="user" class="main-link" href="/users"
                    >Users</Link
                > -->
                <Link v-if="user" class="main-link" href="/passengers"
                    >Passengers</Link
                >
                <Link v-if="user" class="main-link" href="/ships"
                    >Ships</Link
                >
            </nav>
            <div class="flex p-2 ml-auto">
                <Link
                    v-if="!user"
                    class="ml-2 py-4 font-semibold bg-sky-500 hover:bg-sky-600 text-white font-bold px-4 rounded"
                    href="/login"
                    >Log In</Link
                >
                <Link
                    v-if="user"
                    class="py-4 text-white font-semibold hover:bg-sky-500 px-2"
                    href="/logout"
                    method="post"
                    as="button"
                    >Log Out</Link
                >
            </div>
        </div>
    </section>
</template>

<script setup>
import { Link } from "@inertiajs/inertia-vue3";
import { defineProps } from "vue";

defineProps({
    user: "",
});
</script>
