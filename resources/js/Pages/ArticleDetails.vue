<script setup>
import {Head, useForm, usePage} from "@inertiajs/vue3";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import DangerButton from "@/Components/DangerButton.vue";

const {article} = usePage().props;
const {data: comments} = usePage().props.article.comments;
const user = usePage().props.auth.user;

const form = useForm({
    article_id: 1,
    body: "",
});

const addComment = () => {
    form.post(route("articles.comments.store", article.id), {
        preserveScroll: true,
        onSuccess: (response) => {
            const newComment = response.data;
            comments.push(newComment);
            form.reset("body");
        },
    });
};

const deleteArticle = () => {
    form.delete(route("articles.destroy", article.id), {
        preserveScroll: true,
        onSuccess: (response) => {
            console.log(response);
        },
    });
};
</script>


<template>
    <Head title="ArticleDetails"/>

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ article.title }}</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <div>
                            <p><strong>Autor:</strong> {{ article.user.name }}</p>
                            <p><strong>Data utworzenia:</strong> {{ article.created_at }}</p>
                            <p>{{ article.content }}</p>
                        </div>
                        <DangerButton
                            v-if="user && user.id === article.user_id"
                            class="mt-4"
                            :class="{ 'opacity-25': form.processing }"
                            :disabled="form.processing"
                            @click="deleteArticle"
                        >
                            Delete Article
                        </DangerButton>
                    </div>
                </div>

                <div class="mt-4 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <h2>Dodaj komentarz</h2>
                        <form @submit.prevent="addComment" class="mt-6 space-y-6">
                            <div>
                                <input type="hidden" name="article_id" :value="article.id">
                                <textarea
                                    v-model="form.body"
                                    class="block w-full p-2 border rounded-md"
                                    rows="4"
                                    placeholder="Treść komentarza"
                                ></textarea>
                            </div>
                            <div class="flex items-center gap-4">
                                <PrimaryButton :disabled="form.processing">Dodaj komentarz</PrimaryButton>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="mt-4 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <h2>Komentarze</h2>
                        <ul>
                            <li v-for="comment in article.comments" :key="comment.id">
                                <div>
                                    <p><strong>Autor id: {{ comment.user_id }}</strong></p>
                                    <p>{{ comment.body }}</p>
                                    <p>Data dodania: {{ comment.created_at }}</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
