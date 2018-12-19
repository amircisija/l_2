<template>
  <div>
    <input
      type="text"
      placeholder="Type here.."
      v-model="search"
      v-on:keyup="getSearchData"
      class="form-control"
    >

    <div class="panel-footer" v-if="results.length">
      <ul class="list-group">
        <li
          class="list-group-item"
          v-for="result in results"
          v-bind:key="result.id"
        >@{{ result.city }}</li>
      </ul>
    </div>
  </div>
</template>

<script>
export default {
  data: function() {
    return {
      search: "",
      results: []
    };
  },
  methods: {
    getSearchData() {
      this.results = [];
      if (this.search.length > 0) {
        axios
          .get("search", { params: { search: this.search } })
          .then(response => {
            this.results = response.data;
          });
      }
    }
  }
};
</script>