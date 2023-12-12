<script setup>
import {Head, useForm, usePage} from "@inertiajs/vue3";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import InputLabel from "@/Components/InputLabel.vue";

const {article} = usePage().props;
const user = usePage().props.auth.user;

const form = useForm({
    title: "",
    content: "",
});

const addArticle = () => {
    form.post(route("articles.store"), {
        preserveScroll: true,
    });
};
</script>


<template>
    <Head title="ArticleCreate"/>

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Create new article</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="mt-4 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <form @submit.prevent="addArticle" class="mt-6 space-y-6">
                            <div>
                                <InputLabel>Tytuł</InputLabel>
                                <TextInput
                                    v-model="form.title"
                                    class="mt-1 block w-full"
                                    type="text"
                                    autofocus
                                />
                            </div>
                            <div>
                                <InputLabel>Treść artykułu</InputLabel>
                                <textarea
                                    v-model="form.content"
                                    class="block w-full p-2 border rounded-md"
                                    rows="4"
                                ></textarea>
                            </div>
                            <div class="flex items-center gap-4">
                                <PrimaryButton :disabled="form.processing">Dodaj artykuł</PrimaryButton>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
