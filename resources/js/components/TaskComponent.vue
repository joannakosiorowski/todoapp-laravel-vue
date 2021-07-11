<template>
<div>
 <div v-if="user">
    <h2>To do list</h2>
    <form @submit.prevent="addTask" class="mb-3">
      <div class="form-group">
        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Your task" v-model="task.title">
            <div class="input-group-append">
                <button type="submit" class="btn btn-primary">Save</button>
                <button @click="clearForm()" class="btn btn-danger" type="button">Cancel</button>
            </div>
        </div>
      </div> 
    </form>

    <div class="card card-body mt-2 mb-2" v-for="task in tasks" v-bind:key="task.id">
      <h3>{{ task.title }}</h3>

      <hr>
      <button @click="deleteTask(task.id)" class="btn btn-warning mb-2 btn-block">Task completed</button>
      <button @click="editTask(task)" class="btn btn-secondary mb-2 ">Edit</button>
    </div>
  </div>
  <div v-if="!user">
  <h3>Only for logged user </h3>
  </div>
</div> 
</template>

<script>
import {mapGetters} from 'vuex'
export default {
  data() {
    return {
      tasks: [],
      task: {
        id: '',
        title: ''
      },
      task_id: '',
      edit: false
    
    };
  },
  created() {
    this.fetchTasks();

  },
  methods: {
    fetchTasks(page_url) {
     
      page_url = 'http://127.0.0.1:8000/api/task';
      fetch(page_url)
        .then(res => res.json())
        .then(res => {
          this.tasks = res.data;
        })
        .catch(err => console.log(err));
    },
    editTask(task) {
      this.edit = true;
      this.task.id = task.id;
      this.task.task_id = task.id;
      this.task.title = task.title;
      
    },


    addTask() {
      if (this.edit === false) {
        // Add task
        fetch('/api/task', {
          method: 'post',
          body: JSON.stringify(this.task),
          headers: {
            'content-type': 'application/json'
          }
        })
          .then(res => res.json())
          .then(data => {
            this.clearForm();
            alert('Task added');
            this.fetchTasks();
          })
          .catch(err => console.log(err));
      } else {
        // edit task
        fetch('/api/task', {
          method: 'put',
          body: JSON.stringify(this.task),
          headers: {
            'content-type': 'application/json'
          }
        })
          .then(res => res.json())
          .then(data => {
            this.clearForm();
            alert('task Updated');
            this.fetchTasks();
          })
          .catch(err => console.log(err));
      }
     
    },
    
    deleteTask(id) {
      if (confirm('Are You Sure?')) {
        fetch(`/api/task/${id}`, {
          method: 'delete'
        })
          .then(res => res.json())
          .then(data => {
            alert('Task Removed');
            this.fetchTasks();
          })
          .catch(err => console.log(err));
      }
    },

    clearForm() {
      this.edit = false;
      this.task.id = null;
      this.task.task_id = null;
      this.task.title = '';
 
    }
  },
  computed: {
       ...mapGetters(['user'])
  }
};
</script>
