<script setup>
import { Head, Link } from '@inertiajs/vue3';

defineProps({
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
    laravelVersion: {
        type: String,
        required: true,
    },
    phpVersion: {
        type: String,
        required: true,
    },
});


</script>

<template>
    <Head title="Welcome" />
    <div class="bg-gray-50 text-black/50 dark:bg-black dark:text-white/50">
        <div
            class="content relative min-h-screen flex flex-col items-center justify-center selection:bg-[#FF2D20] selection:text-white"
        >
            <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">
                <header class="grid grid-cols-2 items-center gap-2 py-10 lg:grid-cols-3">
                    <div class="flex lg:justify-center lg:col-start-2">
                    </div>
                    
                    <nav v-if="canLogin" class="-mx-3 flex flex-1 justify-end">
                        <Link
                            v-if="$page.props.auth.user"
                            :href="route('dashboard')"
                            class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                        >
                            Dashboard
                        </Link>

                        <template v-else>
                            <Link
                                :href="route('login')"
                                class="btn px-5 py-2 text-white"
                            >
                                Log in
                            </Link>

                            <Link
                                v-if="canRegister"
                                :href="route('register')"
                                class="btn px-10 py-2 text-white"
                            >
                                Register
                            </Link>

                            
                        </template>
                    </nav>
                </header>

                <div class="card ">
        <div class="header text-red">Are you ready to shop now? </div>

        <div class="body text-white">
            Welcome to our online store! Explore our range of innovative products designed to enhance your life.
             From cutting-edge gadgets to sleek accessories, we've got something for everyone. Happy shopping!
              Don't miss out on our exclusive deals and latest arrivals!
        </div>

        <div class="btn1 text-white">
            <button class="cursor-pointer bg-blue">View more</button>
        </div>
    </div>

            
            </div>
        </div>
    </div>
</template>

<style scoped>

header {
    transform: translateY(-15vh);
}

.content {
    background-image: url('https://venngage-wordpress.s3.amazonaws.com/uploads/2022/09/business-background-15.png');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    position: relative;
}

.content::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5); /* Adjust the opacity as needed */
    z-index: 0; /* Ensure the overlay is behind the content */
}

.relative > * {
    position: relative;
    z-index: 1; /* Ensure content is above the overlay */
}

.btn  {
    min-height: 65px;
    display: flex;
    width: 90px;
    justify-content: center;
    align-items: center;
    border-bottom: 2px solid transparent;
    transition: border-bottom 0.3s ease-in-out;
}

.btn:hover {
    border-bottom: 2.4px solid red;
}

.btn1 {
    color: white;
    width: 35%;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 5vh;
    margin-top: 15%;
    border: 2px solid rgb(255, 0, 0);
    background-color: transparent; /* Ensure initial background is set */
    cursor: pointer; /* Set the cursor to pointer by default */
}

.btn1:hover {
    background-color: rgba(0, 0, 0, 0.7); /* Dark background color with opacity */
    cursor: pointer; /* Change cursor to pointer on hover */
}

.card {
    height: 70%;
    min-height: 45vh;
    /* opacity: .9; */
    max-width: 60%;
    width: 40%;
    margin-left: 10%;
    margin-top: 8%;
    transform: translateY(-40%);
}

.header {
   
    color: rgba(255, 0, 0, 0.727);
    font-size: 45px;
    font-weight: 600;
    font-size: 40px;
}

.body {
    font-size: 16px;
    color: white;
    font-weight: 300;
    font-family: 'Quicksand', sans-serif;
    word-spacing: 1px;
    margin-top: 10px;


}
</style>
