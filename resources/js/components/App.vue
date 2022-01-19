<template>
    <div class="container">
        <h1>{{ helloMsg }}</h1>   
        <Post v-for="post in postsList" :key="post.id" :post="post">
        </Post>
    </div>
   
    
   
   
</template>

<script>
import Post from "./partials/Post.vue";

export default {
    name:"App",
    components: {Post},
    data() {
        return {
            helloMsg:"Benvenuto al Blog che ancora deve esistere",
            postsList: [],
        };
    },
    mounted() {
        window.axios.get("/api/posts").then((resp) => {
            this.postsList = resp.data;
        });
    },
}
</script>

<style>
    
</style>