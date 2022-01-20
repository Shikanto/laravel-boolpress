<template>
  <div class="card mb-3" style="width: 100%">
    <div class="row g-0">
      <div class="col-md-4 d-flex align-items-center">
        <img :src="post.coverImg" class="img-fluid rounded-start" alt="..." />
      </div>
      <div class="col-md-8">
        <div class="card-body">
          <h3 class="card-title">{{ post.title }}</h3>
          <p class="card-text" v-html="post.content">
            <!-- {{ post.content }} -->
          </p>
          <p class="card-text">
            <small class="text-muted">{{ post.author }}</small>
          </p>
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