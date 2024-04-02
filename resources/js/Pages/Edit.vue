<template>
    <div>
        <form action="" @submit.prevent="updateArticle">
            <div>
                <label for="">Titre</label>
                <input type="text" name="" id="" v-model="form.title" />
            </div>
            <div>
                <label for="">Auteur</label>
                <input type="text" name="" id="" v-model="form.author" />
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
            <div>
                <input type="submit" value="Modifier" />
            </div>
        </form>
    </div>
</template>

<script setup>
import { useForm,router } from '@inertiajs/vue3';
import { defineProps } from 'vue';

let props = defineProps({
    article: Object,
    image: String
});

const form = useForm({
    title: props.article.title,
    author: props.article.author,
    content: props.article.content,
    image: null,
    oldImage: props.article.image,
});

function updateArticle () {
    router.post(`/article/update/${props.article.id}`, {
  _method: 'put',
  title: form.title,
  author: form.author,
  content: form.content,
  image: form.image,
})
}



</script>