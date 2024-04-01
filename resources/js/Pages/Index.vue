<template>
    <div>
        <Link href='/article/create'>Ajouter</Link>
    </div>
<div>
    <div v-for="article in articles" :key="article.id">
        <h2>{{ article.title }}</h2>
        <p>{{ article.author }}</p>
        <Link :href="`/article/${article.id}`">Read more</Link>|
        <Link :href="`/article/edit/${article.id}`">Edit</Link>|
        <Link :href="`/article/delete/${article.id}`" method="delete" as="button">Supprimer</Link>
    </div>
</div>
</template>

<script setup>
import { defineProps} from 'vue';
import { Link } from '@inertiajs/vue3';

defineProps({
    articles: Object
});

</script>