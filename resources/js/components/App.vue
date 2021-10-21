<template>
  <div class="container">
    <!-- Header section -->
    <header>
      <h1 class="text-center my-5">Benvenuti nel mio blog</h1>
      <p>
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugiat atque
        ipsum dignissimos blanditiis quae obcaecati possimus quis dolorem neque
        repudiandae tempora laborum iure ad, voluptates totam mollitia tempore
        commodi iusto. Lorem ipsum dolor sit, amet consectetur adipisicing elit.
        Dignissimos, inventore natus nostrum placeat vitae ex tenetur odit quo,
        qui veritatis facilis voluptate ipsum mollitia animi nam eos id
        doloribus sapiente!
      </p>
    </header>
    <!-- Main section -->
    <main>
      <PostList />
    </main>
  </div>
</template>

<script>
//// Import of the 'Postlist' component
import PostList from "./posts/PostList.vue";
export default {
  name: "App",
  components: { PostList },
};
</script>
