<template>
    <div class="container text-center">
        <!-- creare componente Navbar -->
        <Navbar></Navbar>
        <h1>{{ helloMsg }}</h1>   
        <router-view></router-view>
        
        
        <!-- creare componente Footer -->
    </div>
   
    
   
   
</template>

<script>
import Navbar from "./components/Navbar.vue";

export default {
    name:"App",
    components: {Navbar},
    data() {
        return {
            helloMsg:"Benvenuto al Blog che ancora deve esistere",
           /*  postsList: [],
            currentPage:1, //pagina default dove visualizzare inzialmente
            lastPage:null // indica e capiamo quante pagine ci sono in totale */
        };
    },
   /*  methods: {
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
        
    }, */
}
</script>

<style>
    
</style>