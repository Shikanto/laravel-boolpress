<template>
  <div class="card mb-3 " style="width: 100%">
    <div class="row g-0">
      <div class="col-md-4 d-flex align-items-center">
        <img :src="post.coverImg" class="img-fluid rounded-start" alt="..." />
      </div>
      <div class="col-md-8 ">
        <div class="card-body">
          <h3 class="card-title">{{ post.title }}</h3>
          <p class="card-text" v-html="post.content">
            <!-- {{ post.content }} -->
          </p>
          <p class="card-text" v-if="post.category && post.category.name"> <!-- se avessi fatto il check solo post.category.name controlla solo se c'è un campo nome category e non guarda il valore -->
            <small class="text-muted">Categoria: {{ post.category.name }}</small>
          </p>
          <p class="card-text" v-else>
            <small class="text-muted">Categoria: Sconosciuta</small>
          </p>
          <div class="card-text">
            <h5 class="text-muted mb-2">Tags: </h5>
            <div class="d-flex align-items-center justify-content-center mb-3">
              <div v-for="tag in post.tags" :key="tag.id" class="badge bg-primary text-white rounded-pill p-2">{{ tag.name }}</div>
            </div>
            
          </div>
          <h5>Autore: {{post.user.name}}</h5>
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
};
</script>

<style>
</style>