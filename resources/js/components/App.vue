<template>
    <div class="container text-center">
        <h1>{{ helloMsg }}</h1>   
        <Post v-for="post in postsList" :key="post.id" :post="post">
        </Post>
        <div class="d-flex justify-content-center">
            <!-- da qui uso le classi bootstrap per la paginazione -->
            <ul class="pagination">
                <li>
                    <button class="page-link" @click="getData(currentPage - 1)">
                        Indietro
                    </button>
                </li>
                <li v-for="page of lastPage" :key="page" class="page-item"
                :class="{ 'active' : currentPage === page}">
                    <button class="page-link" @click="getData(page)">
                        {{page}}
                    </button>
                </li>
                <li>
                    <button class="page-link" @click="getData(currentPage + 1)">
                        Avanti
                    </button>
                </li>
            </ul>

        </div>
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
    methods: {
        getData(page = 1) {
           window.axios.get("/api/posts?page=" + page).then((resp) => {
            this.postsList = resp.data.data;
            this.currentPage = resp.data.current_page;
            this.lastPage = resp.data.last_page;
        }); 
        }
    },
    mounted() {
        
        this.getData();
        
    },
}
</script>

<style>
    
</style>