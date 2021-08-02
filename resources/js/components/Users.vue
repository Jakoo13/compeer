<template>
    <div class="container">
        <div class="row mt-5">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Users Table</h3>

                <div class="card-tools">
                  <button class="btn btn-success" @click="newModal">Add New <i class="fas fa-user-plus fa-fw"></i></button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Team</th>
                      <th>Position</th>
                      <th>Modify</th>
                    </tr>
                  </thead>
                  
                  <tbody>
                    
                    <tr v-for="user in users" :key="user.id">
                      <router-link to="/users/2"><td>{{ user.id }}</td></router-link>
                      <td>{{ user.name | upText }}</td>
                      <td>{{ user.email }}</td>
                      <td>{{ user.team | upText }}</td>
                      <td>{{ user.position }}</td>
                      <td>
                          <a href="#" @click="editModal(user)"><i class="fa fa-edit blue"></i></a>
                          /
                          <a href="#" @click="deleteUser(user.id)"><i class="fa fa-trash red"></i></a>
                      </td>
                    </tr>
                    
                  </tbody>
                 
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="addNew" tabindex="-1" aria-labelledby="addNewLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" v-show="!editmode" id="addNewLabel">Add New</h5>
                    <h5 class="modal-title" v-show="editmode" id="addNewLabel">Edit User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form @submit.prevent="editmode ? updateUser() : createUser()">
                  <div class="modal-body">
                      <div class="form-group">
                        <input type="text" v-model="form.name" name="name" placeholder="Name" class="form-control" :class="{ 'is-valid': form.errors.has('name') }">
                        <has-error :form="form" field="name"></has-error>
                      </div>
                      <div class="form-group">
                        <input type="email" v-model="form.email" name="email" placeholder="Email" class="form-control" :class="{ 'is-valid': form.errors.has('email') }">
                        <has-error :form="form" field="email"></has-error>
                      </div>
                      <div class="form-group">
                        <textarea v-model="form.position" name="position" placeholder="Position or Title" class="form-control" :class="{ 'is-valid': form.errors.has('position') }"></textarea>
                        <has-error :form="form" field="position"></has-error>
                      </div>
                      <div class="form-group">
                        <select v-model="form.team" name="team" id="team" class="form-control" :class="{ 'is-valid': form.errors.has('team') }" >
                          <option value="">Select User Role</option>
                          <option value="accounting">Accounting</option>
                          <option value="buyers">Buyers</option>
                          <option value="customerSupport">Customer Support</option>
                          <option value="engineering">Engineering</option>
                          <option value="executive">Executive</option>
                          <option value="humanResources">Human Resources</option>
                          <option value="logistics">Logistics</option>
                          <option value="marketing">Marketing</option>
                        </select>
                        <has-error :form="form" field="type"></has-error>
                      </div>
                      <div class="form-group">
                        <input type="password" v-model="form.password" name="password" id="password" placeholder="Password" class="form-control" :class="{ 'is-valid': form.errors.has('password') }" >
                        <has-error :form="form" field="password"></has-error>
                      </div>
                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                      <button type="submit" v-show="!editmode" class="btn btn-primary">Create</button>
                      <button type="submit" v-show="editmode" class="btn btn-success">Update</button>
                  </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
          return {
            editmode: false,
            users: {},
            form: new Form({
              id: '',
              name: '',
              email: '',
              password: '',
              team: '',
              position: '',
              photo: 'user.png'
            })
          }
        },
        methods: {
          loadUsers(){
            axios.get('api/user').then(({ data }) => (this.users = data.data));
          },
          createUser(){
            this.$Progress.start();
            this.form.post('api/user')
            .then(()=>{
              Fire.$emit('afterUserCreated');

            $('#addNew').modal('hide');
          
            toast.fire({
              icon: 'success',
              title: 'User created successfully'
            })

            this.$Progress.finish();
            })
            .catch(()=> {
              this.$Progress.fail();
            });
            
          },
          deleteUser(id){
            swal.fire({
              title: 'Are you sure?',
              text: "You won't be able to revert this!",
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
              if (result.isConfirmed) {
                  swal.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                  )
                    //Send Request To Server
                  this.form.delete('api/user/'+id).then(()=> {
                    Fire.$emit('afterUserCreated');
                }).catch(() => {

                  swal("Failed!", "There was something wrong.", "warning");
                })
              }
              
              
            })
            
            
          },
          newModal(){
            this.editmode = false;
            this.form.reset();
            $('#addNew').modal('show');
          },
          editModal(user){
            this.editmode = true;
            this.form.reset();
            $('#addNew').modal('show');
            this.form.fill(user);
          },
          updateUser() {
            this.$Progress.start();
            this.form.put('api/user/'+this.form.id)
            .then(()=>{
              Fire.$emit('afterUserCreated');

            $('#addNew').modal('hide');
          
            toast.fire({
              icon: 'success',
              title: 'User info updated successfully'
            })

            this.$Progress.finish();
            })
            .catch(()=> {
              this.$Progress.fail();
            });
          }
        },
        created() {
            this.loadUsers();
            Fire.$on('afterUserCreated', () => {
              this.loadUsers();
            });
            // setInterval(()=>this.loadUsers(), 3000)
        }
    }
</script>
