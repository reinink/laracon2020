<template>
  <layout>
    <div class="max-w-2xl mx-auto px-4 sm:px-6 md:px-8">
      <h1 class="text-2xl font-semibold text-gray-900">Create User</h1>
    </div>
    <div class="max-w-2xl mx-auto py-4 px-4 sm:px-6 md:px-8">
      <div class="bg-white overflow-hidden shadow sm:rounded-lg">
        <form @submit.prevent="submit">
          <div class="px-4 py-5 sm:p-6">
            <div class="grid grid-cols-6 gap-6">
              <div class="col-span-6">
                <label for="name" class="block text-sm font-medium leading-5 text-gray-700">
                  Name
                </label>
                <div class="mt-1 rounded-md shadow-sm">
                  <input v-model="form.name" class="form-input block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                </div>
                <div v-if="errors.name" class="mt-1 text-red-600 text-sm font-medium">{{ errors.name[0] }}</div>
              </div>
              <div class="col-span-6">
                <label for="email" class="block text-sm font-medium leading-5 text-gray-700">
                  Email
                </label>
                <div class="mt-1 rounded-md shadow-sm">
                  <input v-model="form.email" class="form-input block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                </div>
                <div v-if="errors.email" class="mt-1 text-red-600 text-sm font-medium">{{ errors.email[0] }}</div>
              </div>
              <div class="col-span-6">
                <label for="role" class="block text-sm font-medium leading-5 text-gray-700">
                  Role
                </label>
                <select v-model="form.role" class="mt-1 form-select block w-full pl-3 pr-10 py-2 text-base leading-6 border-gray-300 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5">
                  <option />
                  <option>Admin</option>
                  <option>Owner</option>
                  <option>Member</option>
                </select>
                <div v-if="errors.role" class="mt-1 text-red-600 text-sm font-medium">{{ errors.role[0] }}</div>
              </div>
            </div>
          </div>
          <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
            <button class="py-2 px-4 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-indigo-600 shadow-sm hover:bg-indigo-500 focus:outline-none focus:shadow-outline-blue active:bg-indigo-600 transition duration-150 ease-in-out">
              Create
            </button>
          </div>
        </form>
      </div>
    </div>
  </layout>
</template>

<script>
import Layout from '../../Components/Layout'

export default {
  components: {
    Layout,
  },
  props: {
    errors: Object,
  },
  data() {
    return {
      form: {
        name: null,
        email: null,
        role: null,
      },
    }
  },
  remember: ['form'],
  methods: {
    submit() {
      this.$inertia.post('/users', this.form)
    },
  },
}
</script>
