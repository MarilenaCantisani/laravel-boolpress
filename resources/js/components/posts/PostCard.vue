<template>
  <li id="post-card">
    <div class="card my-4">
      <div class="card-body">
        <h4 class="card-title">
          <strong>{{ post.title }}</strong>
        </h4>
        <hr />
        <h5>
          <strong>Categoria:</strong>
          {{ post.category ? post.category.name : "Nessuna categoria" }}
        </h5>
        <hr />
        <h6>
          <em>Scritto il: {{ getFormattedDate(post.created_at) }}</em>
        </h6>
        <p class="card-text">
          {{ post.content }}
        </p>
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