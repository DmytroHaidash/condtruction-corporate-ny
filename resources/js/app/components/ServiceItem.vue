<template>
  <div class="row">
    <div class="col-12" v-for="(item, index) in posts">
      <article class="blog-item">
        <a :href="item.link" class="block-link">
          <div class="image">
            <div>
              <img :src="item.media" alt="blog image">
            </div>
          </div>
          <div class="content">
            <div>
              <div class="data">
                            <span v-if="item.lang === 'en'">
                                <!--{{item.createdEn}}-->
                            </span>
                <span v-else>
                                <!--{{item.created}}-->
                            </span>
              </div>
              <h3 class="title">
                {{ item.title }}
              </h3>
              <div class="description" v-html="item.body"></div>
              <a :href="item.link" class="link-more">
                {{ $attrs.lang.read }}
                <svg width="25" height="10">
                  <use xlink:href="#arrow-next"></use>
                </svg>
              </a>
            </div>
          </div>
        </a>
      </article>
    </div>

    <div class="col d-flex flex-column flex-sm-row justify-content-center align-items-center mt-4">
      <a href="#" class="btn btn-outline-primary mb-4 mb-sm-0 mr-sm-4" v-if="!!url" @click.prevent="getPosts">
        {{ $attrs.lang.more }}
      </a>
    </div>
  </div>

</template>

<script>
import axios from 'axios';

export default {
  data() {
    return {
      url: '/services/items',
      posts: [],
      blog: '',

    }
  },

  methods: {
    getPosts() {
      axios.get(this.url).then(({data}) => {
        this.posts.push(...data.items);
        this.url = data.next;
        this.blog = data.blog;
      });
    },
  },
  created() {
    this.getPosts();
  }
}
</script>
