<script setup>
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import { Link } from '@inertiajs/vue3';
</script>

<template>
    
    <div class="flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100 overflow-hidden">
        <div class="content bg-gray-900 flex flex-col w-full h-screen">
            <div class="transition flex flex-col w-full h-screen">
                <div>
                    <Link href="/">
                        <ApplicationLogo class="w-20 h-20 fill-current text-gray-500" />
                    </Link>
                </div>
    
                <div
                    class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg"
                >
                        <slot />
    
                </div>
            </div>

        </div>
       
    </div>
</template>

<style scoped>

.transition{
    position: relative;
    z-index: 1;
    display: flex;
    align-items: center;
    justify-content: center;
    animation-name: transition;
    animation-timing-function: ease-in-out;
    animation-duration: 1.2s;
}

@keyframes transition {
    0% {position: absolute;
        top: -90vh;
    }
    80%{
        position: absolute;
        top: 10vh;
    }
    100%{
        position: absolute;
        top: 0vh;
    }
}


.content {
    position: relative;
    z-index: 1;
    display: flex;
    align-items: center;
    justify-content: center;
}

.content::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-image: url('https://venngage-wordpress.s3.amazonaws.com/uploads/2022/09/business-background-15.png');
    background-size: cover;
    background-position: center;
    opacity: 0.9;
    z-index: -1;
}

.content::after {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: rgba(0, 0, 0, 0.5); /* Adjust the alpha value to control the darkness */
    z-index: -1;
}


</style>

