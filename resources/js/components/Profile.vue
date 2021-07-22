<template>
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-3">
                <div class="card card-widget widget-user">
              <!-- Add the bg color to the header using any of the bg-* classes -->
              <div class="widget-user-header" style="background-image:url('./img/logo.png');">
                <h3 class="widget-user-username" >{{this.user.name}}</h3>
                <h5 class="widget-user-desc">{{this.user.position}}</h5>
              </div>
              <div class="widget-user-image">
                <img class="img-circle elevation-2" :src="this.profilePhoto" alt="User Avatar">
              </div>
              <div class="card-footer">
                <div class="row">
                  <div class="col-sm-4 border-right">
                    <div class="description-block">
                      <h5 class="description-header">15</h5>
                      <span class="description-text">AUTHORIZATIONS</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-4 border-right">
                    <div class="description-block">
                      <h5 class="description-header">5</h5>
                      <span class="description-text">POSTS</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-4">
                    <div class="description-block">
                      <h5 class="description-header">15</h5>
                      <span class="description-text">COMMENTS</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  
                  <!-- /.col -->
                </div>
                <!-- /.row -->
              </div>
              
            </div>


            </div>
        </div>
        <!-- Photo Edit -->
        <div class="form-group">
          <label for="file" class="col-sm-2 control-label">Profile Photo</label>
              <div class="col-sm-12">
                <input type="file" id="file" accept="image/*" @change="onImageChange" class="form-control">
                <button  :disabled="isDisabled" @click.prevent="uploadImage" class="btn btn-success m-3">Update</button>
              </div>
            
          
        </div>
       
    </div>
</template>

<style scoped>

.widget-user-header {
    
    background-repeat: no-repeat; 
    background-position: right; 
    margin-right: 20px;
    
}

</style>

<script>
    
    export default {
       props: ['user'],
       users: {},
        data(){
          return {
            profilePhoto: "img/profile/" + this.user.photo,
            form: new Form({
              id:this.user.id,
              file: ''
            }),
            fileSize: false
          }
        },
        created(){
          console.log(this.user);
          
        },
        methods: {
         
          onImageChange(e) {
                let file = e.target.files[0];
                let reader = new FileReader();
                console.log(this.form.id);
                //check if file is bigger than 2 MB
                if(file['size'] < 2111775){
                  
                  reader.onloadend = (file) => {
                  //console.log('RESULT', reader.result)
                  this.form.file = reader.result;
                  }
                  reader.readAsDataURL(file);
                  this.fileSize = true;
                } else{
                  
                  swal.fire({
                    icon: 'error',
                    title: 'Oops..',
                    text: 'Your file is too large',
                    
                });
                this.fileSize = false;
                
              }
                
            },
            uploadImage(){
              if(this.fileSize == true){
              this.$Progress.start();
              this.form.put('api/profile/'+this.form.id)
              .then(()=>{
                window.location.reload();
                this.$Progress.finish();
                
                
              })
              .catch(()=> {
                this.$Progress.fail();
              });
            } else{
            swal.fire({
                    icon: 'error',
                    title: 'Oops..',
                    text: 'Your file is too large',
                    
                })
            }
          },
          getProfilePhoto(){
            return "img/profile/" + this.user.photo;
            
          } 
        },
        computed: {
          isDisabled(){
              if(this.form.file == ''){
                return true
              } else {
                return false
              }
            }
        }
    }
        
</script>

