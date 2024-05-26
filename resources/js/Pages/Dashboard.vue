<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';

defineOptions({
    layout: AuthenticatedLayout
})
</script>

<template>
    <Head title="Dashboard" />

    <!-- <template #header>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Dashboard</h2>
    </template> -->

    <div class="transition-container">
        <div class="transition opacity-60">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">You're logged in!</div>
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped>
.transition-container {
    display: flex;
    align-items: center;
    justify-content: center;
    height: 80vh;
    overflow: hidden;
}

.transition {
    position: relative;
    z-index: 1;
    animation-name: transition;
    animation-timing-function: ease-in-out;
    animation-duration: 1.5s;
    width: 90%;
}

@keyframes transition {
    0% {
        transform: translateY(-100vh);
    }
    80% {
        transform: translateY(5vh);
    }
    100% {
        transform: translateY(0);
    }
}
</style>
