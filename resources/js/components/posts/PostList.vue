<template>
  <section id="post-list">
    <h2 class="my-4">I miei post</h2>
    <Loader v-if="isLoading" />
    <div v-else>
      <article>
        <ul>
          <PostCard v-for="post in posts" :key="post.id" :post="post" />
        </ul>
        <!-- Pagination -->
        <Pagination
          :currentPage="pagination.currentPage"
          :lastPage="pagination.lastPage"
          @changePage="getPosts(page)"
        />
      </article>
    </div>
  </section>
</template>

<script>
//// Import of the 'Loader' component
import Loader from "../Loader.vue";
//// Import of the 'PostCard' component
import PostCard from "./PostCard.vue";
//// Import of the 'Pagination' component
import Pagination from "../Pagination.vue";
export default {
  name: "PostList",
  components: {
    Loader,
    PostCard,
    Pagination,
  },
  data() {
    return {
      //* Initialize empty array to receive data from Axios
      posts: [],
      pagination: {},
      isLoading: false,
    };
  },
  methods: {
    getPosts(page) {
      //? Axios call to receive data from the database
      this.isLoading = true;
      axios
        .get(`http://localhost:8000/api/posts?page=${page}`)
        .then((res) => {
          const { data, current_page, last_page } = res.data;
          this.posts = data;
          this.pagination = { currentPage: current_page, lastPage: last_page };
        })
        .catch((err) => {
          console.error(err);
        })
        .then(() => {
          this.isLoading = false;
        });
    },
  },
  created() {
    this.getPosts();
  },
};
</script>

<style lang="scss" scoped>
nav {
  cursor: pointer;
}
ul {
  background-color: lightgray;
  padding: 10px 30px;
}
</style>
