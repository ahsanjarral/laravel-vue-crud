<script setup>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue';
import { Head } from '@inertiajs/inertia-vue3';
import { Link } from '@inertiajs/inertia-vue3'
defineProps(['movies']);
</script>

<template>
    <Head title="Movies" />

    <BreezeAuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Movies
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <!-- You're logged in movies! -->
                        <div class="mb-4">
                            <Link
                                class="
                                    px-6
                                    py-2
                                    mb-2
                                    text-green-100
                                    bg-green-500
                                    rounded
                                "
                                :href="route('movie.create')"
                            >
                                Create Movie
                            </Link>
                        </div>
                        <table class="min-w-full">
                            <thead class="font-bold bg-gray-300 border-b-2">
                                <td class="px-4 py-2">ID</td>
                                <td class="px-4 py-2">Title</td>
                                <td class="px-4 py-2">Director</td>
                                <td class="px-4 py-2">Release Date</td>
                                <td class="px-4 py-2">Action</td>
                            </thead>
                            <tbody>
                                <tr v-for="movie in movies" :key="movie.id">
                                    <td class="px-4 py-2">{{ movie.id }}</td>
                                    <td class="px-4 py-2">{{ movie.title }}</td>
                                    <td class="px-4 py-2">{{ movie.director }}</td>
                                    <td class="px-4 py-2">{{ movie.date }}</td>
                                    <td class="px-4 py-2 font-extrabold">
                                        <Link
                                            class="text-green-700"
                                            :href="route('movie.edit', movie.id)"
                                        >Edit
                                        </Link>
                                        <Link
                                            class="text-red-700"
                                            :href="route('movie.delete', movie.id)"
                                            >Delete
                                        </Link>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>