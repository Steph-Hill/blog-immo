<template>
    <NavBlog/>
    <div>
        <h1>{{ article.title }}</h1>
        <h3>{{ article.author }}</h3>
        <div>
            <span>{{ article.content }}</span>
        </div>

    </div>
    
</template>

<script setup>

import { defineProps } from 'vue';
import NavBlog from '@/Layouts/NavBlog.vue';


defineProps({
    article: Object,
});

</script>