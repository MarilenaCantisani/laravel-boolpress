<template>
  <li id="post-card">
    <div class="card my-4">
      <div class="card-body">
        <h4 class="card-title">
          <strong>{{ post.title }}</strong>
        </h4>
        <hr />
        <h5>
          <span class="font-weight-bold">Categoria</span>
          {{ post.category ? post.category.name : "Nessuna categoria" }}
        </h5>
        <hr />
        <div class="d-flex my-3">
          <div class="col-4 text-center">
            <img :src="post.url" :alt="post.title" />
          </div>
          <div class="col-8">
            <p class="card-text">
              {{ post.content }}
            </p>
          </div>
        </div>
        <h6 class="d-flex justify-content-end">
          <em>Scritto il: {{ getFormattedDate(post.created_at) }}</em>
        </h6>
      </div>
    </div>
  </li>
</template>

<script>
export default {
  name: "PostCard",
  props: ["post"],
  methods: {
    //* Method to format date in 'DD-MM-YY'
    getFormattedDate(date) {
      const postDate = new Date(date);
      const day = postDate.getDate();
      const month = postDate.getMonth();
      const year = postDate.getFullYear();
      return `${day}.${month}.${year}`;
    },
  },
};
</script>

<style scoped lang='scss'>
#post-card {
  list-style-type: none;
}
</style>