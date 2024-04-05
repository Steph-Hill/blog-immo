<template>

    <NavBlog />
    
    <div class="flex flex-col pt-8 justify-center items-center " v-for="article in articles.data" :key="article.id">
        <div class="bg-white rounded-lg shadow-lg overflow-hidden max-w-lg w-full">
            <img v-if="article.image" :src="article.image" alt="Mountain" class="w-full h-64 object-cover">
            <img v-else src="https://images.unsplash.com/photo-1454496522488-7a8e488e8606" alt="Default Image"
                class="w-full h-64 object-cover">
            <div class="p-6">
                <h2 class="text-2xl text-center font-bold text-gray-800 mb-2">{{ article.title }}</h2>
                <p class="text-gray-700 leading-tight mb-4" v-if="article.content.length > 50">
                    {{ article.content.substring(0, 100) }}...
                </p>
                <p class="text-gray-700 leading-tight mb-4" v-else>
                    {{ article.content }}
                </p>
                <div class="flex justify-between items-center" v-if="$page.props.auth.user">
                    <div class="flex items-center">
                        <Link :href="`/article/edit/${article.id}`"><button 
                             class="relative inline-flex items-center justify-center p-0.5 mb-2 me-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-teal-300 to-lime-300 group-hover:from-teal-300 group-hover:to-lime-300 dark:text-white dark:hover:text-gray-900 focus:ring-4 focus:outline-none focus:ring-lime-200 dark:focus:ring-lime-800">
                            <span
                                class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                                Modifier
                            </span>
                        </button></Link>
                    </div>
                    <div class="flex items-center">
                        <Link :href="`/article/${article.id}`"><button 
                             class="relative inline-flex items-center justify-center p-0.5 mb-2 me-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-teal-300 to-lime-300 group-hover:from-teal-300 group-hover:to-lime-300 dark:text-white dark:hover:text-gray-900 focus:ring-4 focus:outline-none focus:ring-lime-200 dark:focus:ring-lime-800">
                            <span
                                class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                                Voir plus
                            </span>
                        </button></Link>
                    </div>
                    <div class="flex items-center">
                        <Link :href="`/article/delete/${article.id}`" method="delete"><button
                            class="relative inline-flex items-center justify-center p-0.5 mb-2 me-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-pink-500 to-orange-400 group-hover:from-pink-500 group-hover:to-orange-400 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-pink-200 dark:focus:ring-pink-800">
                            <span
                                class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                            Supprimer                            
                            </span>
                        </button></Link>
                    </div>
                </div>
                <div class="flex justify-between items-center" v-else="!$page.props.auth.user">
                    <div class="flex items-center">
                        <Link :href="`/article/${article.id}`"><button 
                             class="relative inline-flex items-center justify-center p-0.5 mb-2 me-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-teal-300 to-lime-300 group-hover:from-teal-300 group-hover:to-lime-300 dark:text-white dark:hover:text-gray-900 focus:ring-4 focus:outline-none focus:ring-lime-200 dark:focus:ring-lime-800">
                            <span
                                class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                                Voir plus
                            </span>
                        </button></Link>
                    </div>
                   
                </div>
                
            </div>
        </div>
    </div>






    <!-- <div class="flex flex-row flex-wrap">
        <div class="  max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 "
            v-for="article in articles.data" :key="article.id">
            <a href="#">
                <img class="rounded-t-lg" :src="article.image" alt="" />
            </a>
            <div class="p-5">
                <a href="#">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ article.title }}
                    </h5>
                </a>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ article.content }}</p>
                <Link :href="`/article/${article.id}`"
                    class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Voir Plus
                <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="none" viewBox="0 0 14 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M1 5h12m0 0L9 1m4 4L9 9" />
                </svg>
                </Link>
            </div>

            <Link :href="`/article/edit/${article.id}`">Edit</Link>|
            <Link :href="`/article/delete/${article.id}`" method="delete" as="button">Supprimer</Link>
        </div>
    </div> -->
    <Paginator :links="articles.links" />
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