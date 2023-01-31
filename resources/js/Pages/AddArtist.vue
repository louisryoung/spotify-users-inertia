<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { useForm } from '@inertiajs/inertia-vue3';

const artistForm = useForm({
  name: '',
  spotify_id: '',
  bio: '',
});
</script>

<template>
  <AppLayout title="Dashboard">
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">Add Artist</h2>
    </template>

    <div class="py-8">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="sm:flex sm:items-center">
          <div class="sm:flex-auto">
            <h1 class="text-xl font-semibold text-gray-900">Add Artist</h1>
            <p class="mt-2 text-sm text-gray-700">Add a new artist to your roster.</p>
          </div>
        </div>
        <div class="mt-4 bg-white overflow-hidden shadow-xl sm:rounded-lg">
          <div class="flex flex-col px-8 py-4">
            <form class="space-y-8 divide-y divide-gray-200" @submit.prevent="submit">
              <div class="space-y-8 divide-y divide-gray-200">
                <div>
                  <div class="mt-2 grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
                    <div class="sm:col-span-3">
                      <label for="first-name" class="block text-sm font-medium text-gray-700">Artist Name</label>
                      <div class="mt-1">
                        <input
                          type="text"
                          name="first-name"
                          id="first-name"
                          autocomplete="given-name"
                          class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md"
                        />
                      </div>
                    </div>

                    <div class="sm:col-span-3">
                      <label for="spotify_id" class="block text-sm font-medium text-gray-700">Spotify ID</label>
                      <div class="mt-1">
                        <input
                          type="text"
                          name="spotify_id"
                          id="spotify_id"
                          class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md"
                        />
                      </div>
                    </div>

                    <div class="sm:col-span-6">
                      <label for="bio" class="block text-sm font-medium text-gray-700">Bio</label>
                      <div class="mt-1">
                        <textarea
                          type="text"
                          name="bio"
                          id="bio"
                          class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md"
                          rows="5"
                        ></textarea>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="pt-5">
                <div class="flex justify-end">
                  <button
                    type="submit"
                    class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                  >
                    Save
                  </button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </AppLayout>
</template>
