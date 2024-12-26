<template layout="default">
    <div class="flex justify-center items-center h-screen bg-gray-100">
        <div
            class="w-[700px] bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4"
            style="margin-top: -100px"
        >
            <div class="grid grid-cols-2 sm:grid-cols-2">
                <div>
                    <div class="logo mx-auto mb-4 mt-10">
                        <img
                            src="/images/logo.jpg"
                            alt="Logo"
                            class="rounded-full"
                        />
                    </div>
                </div>
                <div>
                    <h1 class="text-center">Sign In</h1>
                    <br />
                    <form @submit.prevent="submit">
                        <div class="mb-4">
                            <label
                                for="username"
                                class="block text-gray-700 font-bold mb-2"
                                >Username</label
                            >
                            <input
                                v-model="form.username"
                                type="text"
                                id="username"
                                placeholder="Username"
                                class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-blue-500"
                            />

                            <div
                                class="text-sm text-red-500 italic"
                                v-if="form.errors.username"
                            >
                                {{ form.errors.username }}
                            </div>
                        </div>
                        <div class="mb-6">
                            <label
                                for="password"
                                class="block text-gray-700 font-bold mb-2"
                                >Password</label
                            >
                            <input
                                type="password"
                                id="password"
                                v-model="form.password"
                                placeholder="Password"
                                class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-blue-500"
                            />
                            <div
                                class="text-sm text-red-500 italic"
                                v-if="form.errors.password"
                            >
                                {{ form.errors.password }}
                            </div>
                        </div>
                        <div class="flex items-center justify-between">
                            <button
                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                                type="submit"
                            >
                                Sign In
                            </button>
                            <Link href="/register" class="text-blue-500"
                                >Register an account</Link
                            >
                        </div>
                        <div
                            class="text-sm text-red-500 italic"
                            v-if="form.errors.authentication"
                        >
                            {{ form.errors.authentication }}
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { useForm } from "@inertiajs/inertia-vue3";
import { Link } from "@inertiajs/inertia-vue3";

let form = useForm({
    username: "",
    password: "",
});

let submit = () => {
    form.post("/login");
};
</script>
