<template>
  <div>
    <input
      type="text"
      placeholder="what are you looking for?"
      v-model="query"
      v-on:keyup="autoComplete"
      class="form-control"
    >
    <div class="panel-footer" v-if="results.length">
      <ul class="list-group">
        <li
          class="list-group-item"
          v-for="result in results"
          v-bind:key="result.id"
        >{{ result.city }}</li>
      </ul>
    </div>
  </div>
</template>
<script>
function debounce(fn, delay = 300) {
  var timeoutID = null;

  return function() {
    clearTimeout(timeoutID);

    var args = arguments;
    var that = this;

    timeoutID = setTimeout(function() {
      fn.apply(that, args);
    }, delay);
  };
}

// this is where we integrate the v-debounce directive!
// We can add it globally (like now) or locally!
Vue.directive("debounce", (el, binding) => {
  if (binding.value !== binding.oldValue) {
    // window.debounce is our global function what we defined at the very top!
    el.oninput = debounce(ev => {
      el.dispatchEvent(new Event("change"));
    }, parseInt(binding.value) || 300);
  }
});

export default {
  data() {
    return {
      query: "",
      results: []
    };
  },
  methods: {
    autoComplete() {
      this.results = [];
      if (this.query.length > 2) {
        axios
          .get("/api/search", { params: { query: this.query } })
          .then(response => {
            this.results = response.data;
          });
      }
    }
  }
};
</script>