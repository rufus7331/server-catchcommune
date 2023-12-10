<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';

import { usePage} from "@inertiajs/vue3";

const { data: fishingSpots } = usePage().props;

</script>

<template>
    <Head title="FishingSpots" />

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
                            <li v-for="fishingSpot in $page.props.fishingSpots" :key="fishingSpot.id">
                               <div class="p-6">
                                   <strong>Nazwa:</strong> {{ fishingSpot.name }}<br>
                                   <strong>Szerokość geograficzna:</strong> {{ fishingSpot.latitude }}<br>
                                   <strong>Długość geograficzna:</strong> {{ fishingSpot.longitude }}<br>
                                   <strong>Data utworzenia:</strong> {{ fishingSpot.created_at }}<br>
                                   <strong>Data aktualizacji:</strong> {{ fishingSpot.updated_at }}<br>
                               </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
