<template>
    <div>
        <form action="" @submit.prevent="form.post('/article')">
            <div>
                <label for="">Titre</label>
                <input type="text" name="" id="" v-model="form.title"/>
            </div>
            <div>
                <label for="">Auteur</label>
                <input type="text" name="" id="" v-model="form.author"/>
            </div>
            <div>
                <label for="">Description</label>
                <textarea name="" id="" cols="30" rows="10" v-model="form.content"></textarea>
            </div>
            <div>
                <label for="">Image</label>
                <input type="file" @input="form.image = $event.target.files[0]" />
            </div>
            <div>
                <input type="submit" value="Create new article"/>
            </div>
        </form>
    </div>
</template>

<script setup>
import { useForm } from '@inertiajs/vue3';

const form = useForm({
    title: '',
    author:'',
    content:'',
    image: null
})
</script>