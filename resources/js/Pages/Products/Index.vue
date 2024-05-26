<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

const props = defineProps({
  products: Array,
});

defineOptions({
    layout: AuthenticatedLayout
})

const onDelete = (product) => {
  console.log(product.id)
  const delForm = useForm({
    id: product.id
  })
  const del = confirm("Are you sure you want to delete this product!")
  if(del){
    delForm.submit('delete', '/products/' + product.id, {
      preserveScroll: true,
    })
  }
};
</script>

<template>
  <Head title="Products" />

  <div class="transition mt-10flex flex-col items-center justify-center opacity-70">
    <div class="w-full px-4 sm:px-6 lg:px-8">
      <div class="py-12 max-w-7xl mx-auto">
        <div class="bg-white bg-opacity-60 overflow-hidden shadow-sm sm:rounded-lg">
          <table class="table table-bordered table-striped mt-4 w-full">
            <thead>
              <tr>
                <th class="border px-4 py-2 bg-black text-white text-center">Name</th>
                <th class="border px-4 py-2 bg-black text-white text-center">Description</th>
                <th class="border px-4 py-2 bg-black text-white text-center">Price</th>
                <th class="border px-4 py-2 bg-black text-white text-center">Category</th>
                <th class="border px-4 py-2 bg-black text-white text-center">Action</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="product in props.products" :key="product.id" class="border-t">
                <td class="border px-10 py-3">{{ product.name }}</td>
                <td class="border px-10 py-3">{{ product.description }}</td>
                <td class="border px-10 py-3">{{ product.price }}</td>
                <td class="border px-10 py-3">{{ product.category }}</td>
                <td class="border px-10 py-3 flex gap-5">
                  <Link :href="'/products/'+ product.id" class="edit "><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="blue" d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160V416c0 53 43 96 96 96H352c53 0 96-43 96-96V320c0-17.7-14.3-32-32-32s-32 14.3-32 32v96c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h96c17.7 0 32-14.3 32-32s-14.3-32-32-32H96z"/></svg></Link> 
                  <button @click="onDelete(product)" class="del"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="red" d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm96 64c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16z"/></svg></button> 
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</template>

<style scoped>

svg {
  width: 25px;
}

.edit svg {
    opacity: 0.9; 
}

.del svg {
    opacity: 0.9; 
}

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
