<template>
    <NavBlog/>
    <div>
        <form action="" @submit.prevent="updateArticle">
            <div>
                <label for="">Titre</label>
                <input type="text" name="" id="" v-model="form.title" />
            </div>
            <div>
                <label for="">Description</label>
                <textarea name="" id="" cols="30" rows="10" v-model="form.content"></textarea>
            </div>
            <div>
                <label for="">Image actuelle</label>
                <img :src="form.oldImage" alt="Image actuelle" />
                <label for="">Nouvelle image</label>
                <input type="file" @input="form.image = $event.target.files[0]"/>
            </div>

            <label for="category_id">Catégorie</label>
            <select id="category_id" v-model="form.category_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option v-for="category in categories" :key="category.id" :value="category.id" :selected="form.category_id">
                    {{ category.name }}
                </option>
            </select>

            <div>
                <input type="submit" value="Modifier" />
            </div>
        </form>
    </div>
</template>

<script setup>
import { useForm,router } from '@inertiajs/vue3';
import { defineProps } from 'vue';
import NavBlog from '@/Layouts/NavBlog.vue';

let props = defineProps({
    article: Object,
    image: String
});

const form = useForm({
    title: props.article.title,
    content: props.article.content,
    image: null,
    oldImage: props.article.image,
    category_id: props.article.category_id,
});

function updateArticle () {
    router.post(`/article/update/${props.article.id}`, {
  _method: 'put',
  title: form.title,
  content: form.content,
  image: form.image,
  category_id: form.category_id
})
}



</script>