<template>
  <div class="row">
    <h2 class="text-center w-100 mb-4">User Uploads</h2>
    <div class="d-flex flex-column upload-section">
      <div class="w-100" v-for="(post, i) in posts" :key=i>
        <div class="d-flex" v-if="post.post_images.length">
          <ul class="flex-column m-0">
            <li v-for="(image, j) in post.post_images" :key=j>
              <h4 class="col-md-12">User{{post.user_id}}, {{post.credential}}, {{image.post_image_caption}}</h4>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { mapState } from 'vuex';

export default {
  name: 'all-posts',
  data() {
    return {
    };
  },
  computed: {
    ...mapState(['posts'])
  },
  beforeMount() {
    this.$store.dispatch('getAllPosts');
  },
  methods: {
    truncateText(text) {
      if (text.length > 24) {
        return `${text.substr(0, 24)}...`;
      }
      return text;
    },
  },
}
</script>