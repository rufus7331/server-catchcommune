<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import {Head, Link, usePage} from '@inertiajs/vue3';

const {fishingSpots} = usePage().props;

</script>

<template>
    <Head title="FishingSpots"/>

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">FishingSpots</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <h1>Lista łowisk</h1>
                        <ul>
                            <li v-for="fishingSpot in fishingSpots" :key="fishingSpot.id">
                                <div class="p-6">
                                    <Link :href="route('fishing-spots.show', { id: fishingSpot.id })">
                                        <div class="p-6">
                                            <strong>Nazwa:</strong> {{ fishingSpot.name }}<br>
                                            <strong>Szerokość geograficzna:</strong> {{ fishingSpot.latitude }}<br>
                                            <strong>Długość geograficzna:</strong> {{ fishingSpot.longitude }}<br>
                                        </div>
                                    </Link>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
