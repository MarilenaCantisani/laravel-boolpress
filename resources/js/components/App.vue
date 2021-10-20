<template>
  <div class="container">
    <h1>Benvenuti nel mio sito</h1>
    <p>
      Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugiat atque
      ipsum dignissimos blanditiis quae obcaecati possimus quis dolorem neque
      repudiandae tempora laborum iure ad, voluptates totam mollitia tempore
      commodi iusto.
    </p>
    <PostsList />
  </div>
</template>

<script>
import PostsList from "./posts/PostsList.vue";
export default {
  name: "App",
  components: { PostsList },
};
</script>
