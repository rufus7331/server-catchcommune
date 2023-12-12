<script setup>
import {Head, usePage} from "@inertiajs/vue3";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";

const {fishingSpot} = usePage().props;
</script>

<template>
    <Head title="FishingSpotDetails"/>

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Informacje o łowisku</h2>
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
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
