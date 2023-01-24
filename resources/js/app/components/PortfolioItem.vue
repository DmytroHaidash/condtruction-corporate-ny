<template>
    <div class="row">
        <div class="col-12" v-for="(item, index) in posts">
            <div class="portfolio-slider portfolio-slider--secondary " :class="{'portfolio-slider--end': index % 2 == 0, 'portfolio-slider--start': index % 2 != 0 }">
                <div class="portfolio-item">
                    <div class="place">{{ item.content.address }}</div>
                    <div class="image"
                         :style="{ backgroundImage: 'url(' + item.media + ')' }"></div>
                    <div class="description">
                        <div class="logo">
                            <img :src="item.logo" alt="logo">
                        </div>
                        <div class="content">
                            <div class="subtitle">
                                {{ item.subtitle }}
                            </div>
                            <h3 class="title">
                                {{ item.title }}
                            </h3>
                            <div v-html="item.body"></div>
                            <a :href="item.link" class="link-more">
                                {{ $attrs.lang.more }}
                                <svg width="25" height="10">
                                    <use xlink:href="#arrow-next"></use>
                                </svg>
                            </a>
                        </div>
                    </div>
                    <div class="decor-title decor-title--white">{{ item.title }}</div>
                    <div class="decor-title decor-title--transparent">{{ item.title }}</div>
                </div>

            </div>
        </div>

        <div class="col text-center">
            <a href="#" class="btn btn-outline-primary" v-if="!!url" @click.prevent="getPosts">
                {{ $attrs.lang.want }}
            </a>
        </div>
    </div>

</template>

<script>
    import axios from 'axios';

    export default {
        data() {
            return {
                url: '/portfolio/items',
                posts: []
            }
        },

        methods: {
            getPosts() {
                axios.get(this.url).then(({data}) => {
                    this.posts.push(...data.items);
                    this.url = data.next;
                });
            },
        },
        created() {
            this.getPosts();
        }
    }
</script>
