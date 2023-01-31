<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { useForm } from '@inertiajs/inertia-vue3';

const artistForm = useForm({
  name: '',
  spotify_id: '',
  deezer_id: '',
  apple_id: '',
  bio: '',
});

function submit() {
  artistForm.post(route('artists.create'));
}
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
                      <label for="first-name" class="block text-sm font-medium text-gray-700">
                        Artist Name <span class="text-red-600">*</span>
                      </label>
                      <div class="mt-1">
                        <input
                          id="first-name"
                          v-model="artistForm.name"
                          type="text"
                          name="first-name"
                          autocomplete="given-name"
                          class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md"
                          :class="artistForm.errors.name && 'border-red-600'"
                        />
                        <div v-if="artistForm.errors.name" class="text-red-600 mt-1">{{ artistForm.errors.name }}</div>
                      </div>
                    </div>

                    <div class="sm:col-span-3">
                      <label for="spotify_id" class="block text-sm font-medium text-gray-700">Spotify ID</label>
                      <div class="mt-1">
                        <input
                          id="spotify_id"
                          v-model="artistForm.spotify_id"
                          type="text"
                          name="spotify_id"
                          class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md"
                          :class="artistForm.errors.spotify_id && 'border-red-600'"
                        />
                        <div v-if="artistForm.errors.spotify_id" class="text-red-600 mt-1">
                          {{ artistForm.errors.spotify_id }}
                        </div>
                      </div>
                    </div>

                    <div class="sm:col-span-3">
                      <label for="deezer_id" class="block text-sm font-medium text-gray-700">Deezer ID</label>
                      <div class="mt-1">
                        <input
                          id="deezer_id"
                          v-model="artistForm.deezer_id"
                          type="text"
                          name="deezer_id"
                          class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md"
                          :class="artistForm.errors.deezer_id && 'border-red-600'"
                        />
                        <div v-if="artistForm.errors.deezer_id" class="text-red-600 mt-1">
                          {{ artistForm.errors.deezer_id }}
                        </div>
                      </div>
                    </div>

                    <div class="sm:col-span-3">
                      <label for="apple_id" class="block text-sm font-medium text-gray-700">Apple ID</label>
                      <div class="mt-1">
                        <input
                          id="apple_id"
                          v-model="artistForm.apple_id"
                          type="text"
                          name="apple_id"
                          class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md"
                          :class="artistForm.errors.apple_id && 'border-red-600'"
                        />
                        <div v-if="artistForm.errors.apple_id" class="text-red-600 mt-1">
                          {{ artistForm.errors.apple_id }}
                        </div>
                      </div>
                    </div>

                    <div class="sm:col-span-6">
                      <label for="bio" class="block text-sm font-medium text-gray-700">Bio</label>
                      <div class="mt-1">
                        <textarea
                          id="bio"
                          v-model="artistForm.bio"
                          type="text"
                          name="bio"
                          class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md"
                          :class="artistForm.errors.bio && 'border-red-600'"
                          rows="5"
                        ></textarea>
                        <div v-if="artistForm.errors.bio" class="text-red-600 mt-1">
                          {{ artistForm.errors.bio }}
                        </div>
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
                    :disabled="artistForm.processing"
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
