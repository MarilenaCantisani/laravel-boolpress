<template>
  <section id="loader" class="d-flex justify-content-center">
    <div class="spinner-grow" style="width: 4rem; height: 4rem" role="status">
      <span class="sr-only">Loading...</span>
    </div>
  </section>
</template>

<script>
export default {
  name: "Loader",
};
</script>

<style lang='scss' scoped>
#loader {
  position: fixed;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  background-color: rgba(5, 5, 5, 0.281);
  display: flex;
  align-items: center;
  justify-content: center;
}
</style>