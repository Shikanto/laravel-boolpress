<template>
    <div class="container text-center">
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
            currentPage:1, //pagina default dove visualizzare inzialmente
            lastPage:null // indica e capiamo quante pagine ci sono in totale
        };
    },
    mounted() {
        window.axios.get("/api/posts").then((resp) => {
            this.postsList = resp.data.data;
            this.currentPage = resp.data.current_page;
            this.lastPage = resp.data.lastPage;
        });
    },
}
</script>

<style>
    
</style>