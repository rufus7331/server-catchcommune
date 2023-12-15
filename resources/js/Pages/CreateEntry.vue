<script setup>
import {Head, useForm, usePage} from "@inertiajs/vue3";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import InputLabel from "@/Components/InputLabel.vue";

const user = usePage().props.auth.user;
const fish = usePage().props.fish;
const fishingSpot = usePage().props.fishingSpot;
const fishingSpotId = (() => {
    const match = window.location.href.match(/\/fishing-spots\/(\d+)\/catch-entries\/create/);
    return match ? match[1] : null;
})();


const form = useForm({
    user_id: user.id,
    fishing_spot_id: fishingSpotId,
    fish_id: "",
    weight: "",
    length: "",
    comment: "",
});

const addCatchEntry = () => {
    form.post(route("catch-entries.store"), {
        preserveScroll: true,
    });
};
</script>


<template>
    <Head title="AddCatchEntry"/>
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Create new catch entry</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="mt-4 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <form @submit.prevent="addCatchEntry" class="mt-6 space-y-6">
                            <div>
                                <InputLabel>Wybierz rybę</InputLabel>
                                <select v-model="form.fish_id" class="mt-1 block w-full">
                                    <option v-for="fishOption in fish" :key="fishOption.id" :value="fishOption.id">
                                        {{ fishOption.name }}
                                    </option>
                                </select>
                            </div>
                            <div>
                                <InputLabel>Wybierz łowisko</InputLabel>
                                <select v-model="form.fishing_spot_id" class="mt-1 block w-full">
                                    <option v-for="fishingSpotOption in fishingSpot" :key="fishingSpotOption.id"
                                            :value="fishingSpotOption.id">
                                        {{ fishingSpotOption.name }}
                                    </option>
                                </select>
                            </div>
                            <div>
                                <InputLabel>Waga (kg)</InputLabel>
                                <TextInput
                                    v-model="form.weight"
                                    class="mt-1 block w-full"
                                    type="number"
                                    autofocus
                                />
                            </div>
                            <div>
                                <InputLabel>Długość (cm)</InputLabel>
                                <TextInput
                                    v-model="form.length"
                                    class="mt-1 block w-full"
                                    type="number"
                                    autofocus
                                />
                            </div>
                            <div>
                                <InputLabel>Komentarz</InputLabel>
                                <textarea
                                    v-model="form.comment"
                                    class="block w-full p-2 border rounded-md"
                                    rows="4"
                                ></textarea>
                            </div>
                            <div class="flex items-center gap-4">
                                <PrimaryButton :disabled="form.processing">Dodaj wpis</PrimaryButton>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
