<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

const props = defineProps({
  products: Array,
});

defineOptions({
    layout: AuthenticatedLayout
})

const form = useForm({
  name: '',
  description: '',
  price: null,
  category: '',
})

const submit = () => {
    console.log(form)   
    form.post('/products')
}
</script>

<template>
    <Head title="Create Product" />

    <div class="transition mt-11 flex items-center justify-center rounded overflow-hidden opacity-60">
        <div class="bg-white p-8 rounded shadow-lg w-full max-w-md">
            <h2 class="text-2xl font-bold mb-6 text-center">Create Product</h2>
            <form @submit.prevent="submit">
                <div class="flex flex-col mb-4">
                    <label for="name" class="mb-2 font-medium text-gray-700">Product Name</label>
                    <input type="text" id="name" v-model="form.name" class="border-gray-300 rounded p-2 focus:ring focus:ring-blue-500 focus:border-blue-500">
                </div>
                <div class="flex flex-col mb-4">
                    <label for="description" class="mb-2 font-medium text-gray-700">Description</label>
                    <input type="text" id="description" v-model="form.description" class="border-gray-300 rounded p-2 focus:ring focus:ring-blue-500 focus:border-blue-500">
                </div>
                <div class="flex flex-col mb-4">
                    <label for="price" class="mb-2 font-medium text-gray-700">Price</label>
                    <input type="number" id="price" v-model="form.price" class="border-gray-300 rounded p-2 focus:ring focus:ring-blue-500 focus:border-blue-500">
                </div>
                <div class="flex flex-col mb-4">
                    <label for="category_id" class="mb-2 font-medium text-gray-700">Category</label>
                    <select name="category_id" id="category_id" v-model="form.category" class="border-gray-300 rounded p-2 focus:ring focus:ring-blue-500 focus:border-blue-500">
                        <option value="0">Select a Category</option>
                        <option value="Food">Food</option>
                        <option value="Accessories">Accessories</option>
                        <option value="Clothing">Clothing</option>
                    </select>
                </div>
                <button class="bg-blue-700 py-2 px-6 rounded mt-3 text-white hover:bg-blue-600" type="submit">Save Changes</button>
            </form>
        </div>
    </div>
</template>

<style scoped>
.transition {
    position: relative;
    z-index: 1;
    animation-name: transition;
    animation-timing-function: cubic-bezier(0.42, 0, 0.58, 1);
    animation-duration: 1.5s;
}

@keyframes transition {
    0% {
        transform: translateY(-100vh);
    }
    60% {
        transform: translateY(5vh);
    }
    80% {
        transform: translateY(-2vh);
    }
    100% {
        transform: translateY(0);
    }
}
</style>
