<template>
<NavBlog/>
<div v-for="article in articles.data" :key="article.id">
    
<a href="#" class="flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row md:max-w-xl hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
    <img class="object-cover w-full rounded-t-lg h-96 md:h-auto md:w-48 md:rounded-none md:rounded-s-lg" :src="article.image" alt="">
    <div class="flex flex-col justify-between p-4 leading-normal">
        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ article.title }}</h5>
        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Here are the biggest enterprise technology acquisitions of 2021 so far, in reverse chronological order.</p>
    </div>
</a>

            <Link :href="`/article/${article.id}`">Read more</Link>|
            <Link :href="`/article/edit/${article.id}`">Edit</Link>|
            <Link :href="`/article/delete/${article.id}`" method="delete" as="button">Supprimer</Link>
</div>
    <Paginator :links="articles.links"/>

    
</template>

<script setup>
import { defineProps } from 'vue';
import { Link } from '@inertiajs/vue3';
import NavBlog from '@/Layouts/NavBlog.vue';
import Paginator from '@/Layouts/Paginator.vue'


defineProps({
    articles: Object,
    Login: {
        type: Boolean,
    },

});



</script>