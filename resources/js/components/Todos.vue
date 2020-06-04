<template>
  <div>
    <h1 class="text-center">Todos</h1>
    <form action="" @submit="createTodo(todo)">
      <h4 class="text-center font-weight-bold">Create new Todo</h4>
      <div class="form-group">
          <input v-model="todo.description" placeholder="Todo description" class="form-control" />
      </div>
      <div class="form-group">
        <button :disabled="!isValid" class="btn btn-block btn-primary" @click.prevent="createTodo(todo)">Submit
        </button>
      </div>
    </form>
    <ul>
      <li v-for="todo in todos" :key="todo.id">
        {{ todo.description }}
        <button class="btn btn-danger" @click="deletePost(todo)">Delete</button>
      </li>
    </ul>
  </div>
</template>

<script>
  import axios from 'axios';

  export default {
    data() {
      return {
        todo: {
          description: '',
        },
        todos: [],
      }
    },
    computed: {
      isValid() {
          return this.todo.description !== '';
      }
    },
    mounted() {
      this.fetchTodos();
    },
    methods: {
      createTodo(todo) {
        axios.post('/api/todos', todo).then(res => {
          this.fetchTodos();
          this.todo.description = '';
        }).catch(err => console.log(err));
      },
      fetchTodos() {
        axios.get('/api/todos').then(res => (this.todos = res.data.results)).catch(err => console.log(err));
      },
      deletePost(todo) {
        axios.delete(`/api/todos/${todo.id}`).then(res => {
          this.fetchTodos();
        }).catch(err => console.log(err));
      },
    }
  }
</script>