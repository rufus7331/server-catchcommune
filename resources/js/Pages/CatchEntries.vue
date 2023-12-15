<script setup>
import {Head, Link, usePage} from '@inertiajs/vue3';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';

const {entries} = usePage().props;


</script>

<template>
    <div>
        <Head title="Catch Entries"/>
        <AuthenticatedLayout>
            <template #header>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">Catch Entries</h2>
            </template>
            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900">
                            <table class="min-w-full">
                                <thead>
                                <tr>
                                    <th class="px-6 py-3 bg-gray-200 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                        Wędkarz
                                    </th>
                                    <th class="px-6 py-3 bg-gray-200 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                        Miejsce łowienia
                                    </th>
                                    <th class="px-6 py-3 bg-gray-200 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                        Ryba
                                    </th>
                                    <th class="px-6 py-3 bg-gray-200 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                        Waga (kg)
                                    </th>
                                    <th class="px-6 py-3 bg-gray-200 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                        Długość (cm)
                                    </th>
                                    <th class="px-6 py-3 bg-gray-200 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                        Komentarz
                                    </th>
                                    <th class="px-6 py-3 bg-gray-200 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                        Data utworzenia
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr v-for="entry in entries" :key="entry.id">
                                    <td class="px-6 py-4 whitespace-no-wrap">{{ entry.user.name }}</td>
                                    <td class="px-6 py-4 whitespace-no-wrap">
                                        <Link :href="route('fishing-spots.show', entry.fishing_spot.id)">
                                            {{ entry.fishing_spot.name }}
                                        </Link>
                                    </td>
                                    <td class="px-6 py-4 whitespace-no-wrap">{{ entry.fish.name }}</td>
                                    <td class="px-6 py-4 whitespace-no-wrap">{{ entry.weight }}</td>
                                    <td class="px-6 py-4 whitespace-no-wrap">{{ entry.length }}</td>
                                    <td class="px-6 py-4 whitespace-no-wrap">{{ entry.comment }}</td>
                                    <td class="px-6 py-4 whitespace-no-wrap">{{ entry.created_at }}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </AuthenticatedLayout>
    </div>
</template>
