<script setup>
import {Head, Link, usePage} from "@inertiajs/vue3";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";

const {fishingSpot} = usePage().props;
const {catchEntries} = usePage().props;
</script>

<template>
    <div>
        <Head title="FishingSpotDetails"/>

        <AuthenticatedLayout>
            <template #header>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">Fishing Spot Details</h2>
            </template>
            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900">
                            <p><strong>Nazwa:</strong> {{ fishingSpot.name }}</p>
                            <p><strong>Szerokość geograficzna:</strong> {{ fishingSpot.latitude }}</p>
                            <p><strong>Długość geograficzna:</strong> {{ fishingSpot.longitude }}</p>
                            <p><strong>Opis:</strong> {{ fishingSpot.description }}</p>
                        </div>
                        <Link :href="route('catch-entries.create', fishingSpot.id)">
                            <div class="p-6">
                                <strong>Dodaj wpis</strong>
                            </div>
                        </Link>
                    </div>
                </div>
            </div>
            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900">
                            <h2>Złowione ryby na tym łowisku</h2>
                            <ul>
                                <li v-for="entry in catchEntries" :key="entry.id">
                                    {{ entry.fish.name }} - Waga: {{ entry.weight }} kg, Długość: {{ entry.length }} cm,
                                    Użytkownik: {{ entry.user.name }}
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </AuthenticatedLayout>
    </div>
</template>

