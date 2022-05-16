<script setup>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated.vue";
import { Head } from "@inertiajs/inertia-vue3";
import { useForm } from "@inertiajs/inertia-vue3";

const props = defineProps({movie: Object,errors:Object});

const form = useForm({
    title: props.movie.title,
    director: props.movie.director,
    date: props.movie.date,
});

function update(){
    form.patch(route("movie.update", props.movie.id));
}
</script>

<template>
    <Head title="Movie" />
    <!-- <BreezeValidationErrors class="mb-4" /> -->
    <BreezeAuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Movie \ Edit
            </h2>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">

                    <div v-if="errors">
                        <p v-for="error in errors" :key="error" class="bg-red-500 text-white py-2 px-4 pr-0 rounded font-bold mb-4 shadow-lg text-sm">{{ error }}</p>
                    </div>

                        <form @submit.prevent="update">
                            <div>
                                <label for="title">Title</label>
                                <input
                                    type="text"
                                    v-model="form.title"
                                    class="
                                        w-full
                                        px-4
                                        py-2
                                        mt-2
                                        border
                                        rounded-md
                                        focus:outline-none
                                        focus:ring-1
                                        focus:ring-blue-600
                                    "
                                />
                            </div>
                            <div>
                                <label for="category">Director</label>
                                <input
                                    type="text"
                                    v-model="form.director"
                                    class="
                                        w-full
                                        px-4
                                        py-2
                                        mt-2
                                        border
                                        rounded-md
                                        focus:outline-none
                                        focus:ring-1
                                        focus:ring-blue-600
                                    "
                                />
                            </div>
                            <div>
                                <label for="release_date">Release Date</label>
                                <input
                                    type="text"
                                    v-model="form.date"
                                    class="
                                        w-full
                                        px-4
                                        py-2
                                        mt-2
                                        border
                                        rounded-md
                                        focus:outline-none
                                        focus:ring-1
                                        focus:ring-blue-600
                                    "
                                />
                            </div>

                            <!-- submit -->
                            <div class="flex items-center mt-4">
                                <button
                                    class="
                                        px-6
                                        py-2
                                        text-white
                                        bg-gray-900
                                        rounded
                                    "
                                >
                                    Save
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>