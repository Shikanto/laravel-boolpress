<template>
    <div>
        <div class="progress mb-5" v-if="loading">
            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%"></div>
        </div>
        <div class="d-flex">
            <div>
                <Post v-for="post in postsList" :key="post.id" :post="post">
                </Post>
            </div>
            <div class="sidebar ml-4">
                <h3>Categorie Posts</h3>
                <ul>
                    <li v-for="category in categoriesList" :key="category.id">  
                        <router-link :to="{name: 'categories.show', 
                        params: {category: category.id}}">
                            {{category.name}}
                        </router-link>
                    </li>
                </ul>
            </div>
        </div>
        <div class="d-flex justify-content-center " v-if="lastPage > 1">
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
import Post from "../components/Post.vue"

export default {
    components: {Post},
    data() {
        return {
            postsList: [],
            categoriesList:[],
            currentPage:1, //pagina default dove visualizzare inzialmente
            lastPage:null, // indica e capiamo quante pagine ci sono in totale
            loading: true,
        };
    },
     methods: {
        getData(page = 1) {
            this.loading = true;

           window.axios.get("/api/posts?page=" + page).then((resp) => {
            this.postsList = resp.data.data;
            this.currentPage = resp.data.current_page;
            this.lastPage = resp.data.last_page;
            this.loading = false;
            }); 
        },
        getCategories() {
            window.axios.get("/api/categories").then((resp) =>{
                this.categoriesList = resp.data;
            });
        },
    },
    mounted() {
        
        this.getData();
        this.getCategories();
        
    },
}
</script>
<style>
    .sidebar{
        width: 35%;
    }

    ul{
        text-decoration: none;
        list-style-type: none;
        text-align: start;
        margin-top: 30px;
        padding-left: 20px;
        
    }

    li{
            color: black;
        }
</style>