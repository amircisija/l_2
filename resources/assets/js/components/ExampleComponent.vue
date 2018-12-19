<template>
  <div>
    <input
      type="text"
      placeholder="City, Zip"
      :trigger-on-focus="false"
      v-model="state"
      :fetch-suggestions="querySearch"
      @select="handleSelect"
    >
    <div v-if="loading">loading...</div>
    <div v-else>
      <ul>
        <li v-for="code in codes" v-bind:key="code.id">
          <p>{{code.city}} - {{ code.zip}}</p>
        </li>
      </ul>
    </div>
  </div>
</template>

<script>
const URL = "../js/germany.json";
export default {
  data() {
    return {
      loading: true,
      codes: [],
      state: "",
      label: "label"
    };
  },
  methods: {
    querySearch(query, cb) {
      var codes = this.codes;
      var results = query ? codes.filter(this.createFilter(query)) : codes;
      var top3 = results.slice(0, 3);
      console.log(JSON.stringify(top3));
      cb(top3); // number of things returned
    },
    createFilter(query) {
      return code => {
        return code.value.toLowerCase().includes(query.toLowerCase());
      };
    },
    loadAll() {
      return [codes];
    },
    handleSelect(item) {
      this.label = item.value;
      console.log(item);
    }
  },
  created() {
    //this.loading = true --> not needed already set in data
    axios.get(URL).then(response => {
      // console.log(response.data, this)
      this.codes = response.data;
      this.loading = false;
      this.codes = this.loadAll();
    });
  },
  mounted() {}
};
</script>
