<template>
    <div>
        <div class="container">
            <h2 class="mb-4">Categoria: {{category.name}}</h2>
            
            <h3 v-if="!category.posts || category.posts.length === 0">
                Nessun post da visualizzare...
            </h3>
            <div v-else>
                 <Post v-for="post in category.posts" :key="post.id" :post="post">
                </Post>
            </div>
        </div>
    </div>        
</template>
<script>
import Post from "../../components/Post.vue";

export default {
    components: {Post},
    data() {
        return {
            category: { 
                type: Object,
                default: () => ({}), 
            }
        }
    },
    methods: {
        fetchPost() {
            const urlPost = "/api/categories/" + this.$route.params.category; 
            window.axios.get( urlPost ).then((resp) => {
                this.category = resp.data;
            })
        },
    },
    mounted() {
        this.fetchPost();
    },
}
</script>
<style>
    
</style>