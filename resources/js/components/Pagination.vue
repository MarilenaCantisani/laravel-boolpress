<template>
  <!-- Navigation bar to change pages  -->
  <nav>
    <ul class="pagination">
      <li
        class="page-item"
        v-if="currentPage > 1"
        @click="$emit('changePage', currentPage - 1)"
      >
        <a class="page-link">
          <span>&laquo;</span>
        </a>
      </li>
      <li
        class="page-item"
        v-for="i in lastPage"
        :key="i"
        @click="$emit('changePage', i)"
        :class="i === currentPage ? 'active' : ''"
      >
        <a class="page-link">{{ i }}</a>
      </li>
      <li
        class="page-item"
        v-if="currentPage == lastPage"
        @click="$emit('changePage', currentPage + 1)"
      >
        <a class="page-link">
          <span>&raquo;</span>
        </a>
      </li>
    </ul>
  </nav>
</template>

<script>
export default {
  name: "Pagination",
  props: ["currentPage", "lastPage"],
};
</script>
