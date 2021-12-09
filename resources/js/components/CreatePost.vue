<template>
  <div :key="componentKey" class="mt-4">
    <h3 class="text-secondary text-center">Credential {{ credentialIndex }}</h3>
    <div
      v-if="status_msg"
      :class="{ 'alert-success': status, 'alert-danger': !status }"
      class="alert"
      role="alert"
    >
      {{ status_msg }}
    </div>
    <form>
      <div class="d-flex justify-content-center my-4">
        <el-upload
          action="https://jsonplaceholder.typicode.com/posts/"
          list-type="picture-card"
          :on-preview="handlePictureCardPreview"
          :on-change="updateImageList"
          :on-remove="handleRemove" 
          :auto-upload="false"
        >
          <i class="el-icon-plus" />
        </el-upload>
        <el-dialog :visible.sync="dialogVisible">
          <img width="100%" :src="dialogImageUrl" alt>
        </el-dialog>
      </div>
    </form>
    <div class="d-flex justify-content-center">
      <button
        type="button"
        class="btn btn-success"
        @click="createPost"
      >
        {{ isCreatingPost ? "Posting..." : "Upload File" }}
      </button>
    </div>
    <ul class="ml-auto flex-row justify-content-between">
      <li class="w-100" v-for="(image, i) in imageList" :key=i>
        {{image.name}}
      </li>
    </ul>
  </div>
</template>

<style>
.avatar-uploader .el-upload {
  border: 1px dashed #d9d9d9;
  border-radius: 6px;
  cursor: pointer;
  position: relative;
  overflow: hidden;
}
.avatar-uploader .el-upload:hover {
  border-color: #409eff;
}
.avatar-uploader-icon {
  font-size: 28px;
  color: #8c939d;
  width: 178px;
  height: 178px;
  line-height: 178px;
  text-align: center;
}
.avatar {
  width: 178px;
  height: 178px;
  display: block;
}
</style>

<script>
import { mapActions } from 'vuex'

export default {
  name: 'CreatePost',
  data () {
    return {
      dialogImageUrl: '',
      dialogVisible: false,
      imageList: [],
      status_msg: '',
      status: '',
      isCreatingPost: false,
      title: '',
      body: '',
      componentKey: 0,
      credentialIndex: 1,
    }
  },
  computed: {},
  mounted () {
    this.credentialIndex = window.location.pathname.split('/').pop()
  },
  methods: {
    ...mapActions(['getAllPosts']),
    updateImageList (file) {
      this.imageList.push(file.raw)
    },
    handleRemove(file, fileList) {
      this.imageList = fileList
    },
    handlePictureCardPreview (file) {
      this.dialogImageUrl = file.url
      this.dialogVisible = true
    },
    createPost (e) {
      e.preventDefault()
      if (!this.validateForm()) {
        return false
      }
      const that = this
      this.isCreatingPost = true
      const formData = new FormData()

      formData.append('credential', `credential ${this.credentialIndex}`)
      $.each(this.imageList, function (key, image) {
        formData.append(`images[${key}]`, image)
      })

      api
        .post('/post/create_post', formData, {
          headers: { 'Content-Type': 'multipart/form-data' }
        })
        .then((res) => {
          this.status = true
          this.showNotification('Post Successfully Created')
          this.isCreatingPost = false
          this.imageList = []
          /*
           this.getAllPosts() can be used here as well
           note: "that" has been assigned the value of "this" at the top
           to avoid context related issues.
           */
          that.getAllPosts()
          that.componentKey += 1
        })
    },
    validateForm () {
      // no vaildation for images - it is needed
      return true
    },
    showNotification (message) {
      this.status_msg = message
      setTimeout(() => {
        this.status_msg = ''
      }, 3000)
    }
  }
}
</script>
