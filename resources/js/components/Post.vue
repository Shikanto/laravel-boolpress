<template>
  <div class="card mb-3 w-100">
    <div class="row g-0">
      <div class="col-md-4 d-flex align-items-center ">
        <img :src="post.coverImg" class="img-fluid rounded-start w-100 h-100" alt="..." />
      </div>
      <div class="col-md-8 ">
        <div class="card-body">
          <h3 class="card-title">{{ post.title }}</h3>
          <p class="card-text" v-html="countText(post.content)">
            {{ countText(post.content) }}
          
           
          </p>
          <p class="card-text" v-if="post.category && post.category.name"> <!-- se avessi fatto il check solo post.category.name controlla solo se c'è un campo nome category e non guarda il valore -->
            <small class="text-muted" v-if="post.category">Categoria: {{ post.category.name }}</small>
          </p>
          <div class="card-text">
            <h5 class="text-muted mb-2" v-if="post.tags">Tags: </h5>
            <div class="d-flex align-items-center justify-content-center mb-3">
              <div v-for="tag in post.tags" :key="tag.id" class="badge bg-primary text-white rounded-pill p-2">{{ tag.name }}</div>
            </div>
            
          </div>
          <h5 v-if="post.user">Autore: {{post.user.name}}</h5>
          <button class="btn btn-primary">
              <router-link class="text-white" :to="{ name: 'posts.show', params: {slug: post.slug} }">Vai al Post</router-link>
          </button>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  name: "Post",
  props: {
    post: {
      type: Object,
      required: true,
    },
  },
  methods: {

     countText(text) {
        if (text.length > 300) {
          const newText = text.substring(0,300) + "...";
        return newText;
      } else {
      return this.text;
      }
    },
  }
};
</script>

<style>
</style>