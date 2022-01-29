<template>
    <div>
        <div class="container d-flex justify-content-center">
            <div class="card w-100" style="width: 18rem;">
                <h2>{{post.title}}</h2>
                <h3>{{post.subtitle}}</h3>
                <img :src="post.coverImg" class="card-img-top" alt="...">
                <div class="card-body">
                    <p class="card-text" v-html="post.content">{{ post.content }}</p>
                    <!-- <h5>Autore: {{post.user.name}}</h5> -->
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    data() {
        return {
            post: { //faccio così perchè i dati del post arrivano dal fetch in un secondo momento, all'inizio quindi i dati saranno undefined ma non daranno errori e appena il fetch ha finito di prendere i dati caricherà tutto sull pagina
                type: Object,
                default: () => ({}), // ({}) scrittura che indica che torna un oggeto vuoto
            }
        }
    },
    methods: {
        fetchPost() {
            const urlPost = "/api/posts/" + this.$route.params.slug; //genera un url dipendete dallo slug che poi passa per fare la chiamata axios
            window.axios.get( urlPost ).then((resp) => {
                this.post = resp.data;
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