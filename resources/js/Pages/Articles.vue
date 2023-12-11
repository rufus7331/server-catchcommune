<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import {Head, Link} from '@inertiajs/vue3';

import {usePage} from "@inertiajs/vue3";

const {articles} = usePage().props;

</script>

<template>
    <Head title="Articles"/>

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Articles</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <h1>Artykuły</h1>
                        <table class="min-w-full">
                            <thead>
                            <tr>
                                <th class="px-6 py-3 bg-gray-200 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Tytuł</th>
                                <th class="px-6 py-3 bg-gray-200 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Autor</th>
                                <th class="px-6 py-3 bg-gray-200 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Data utworzenia</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="article in articles" :key="article.id">
                                <td class="px-6 py-4 whitespace-no-wrap">
                                    <Link :href="route('articles.show', article.id)">
                                        {{ article.title }}
                                    </Link>
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap">{{ article.user.name }}</td>
                                <td class="px-6 py-4 whitespace-no-wrap">{{ article.created_at }}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

