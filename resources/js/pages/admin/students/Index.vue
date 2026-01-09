<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { Head } from '@inertiajs/vue3';
import { computed, ref, watch } from 'vue';
import Create from './actions/Create.vue';
import Delete from './actions/Delete.vue';
import Update from './actions/Update.vue';

const props = defineProps<{
    students: any[];
}>();

const search = ref('');
const currentPage = ref(1);
const pageSize = ref(10);

/* Reset page when search or page size changes */
watch([search, pageSize], () => {
    currentPage.value = 1;
});

/* Search */
const filteredData = computed(() => {
    if (!search.value) return props.students;

    return props.students.filter((item) =>
        item.name.toLowerCase().includes(search.value.toLowerCase()),
    );
});

/* Pagination */
const paginatedData = computed(() => {
    const start = (currentPage.value - 1) * pageSize.value;
    return filteredData.value.slice(start, start + pageSize.value);
});
</script>

<template>
    <Head title="សិស្សានុសិស្ស" />

    <AppLayout>
        <div
            class="flex h-full flex-1 flex-col gap-4 overflow-x-auto rounded-xl p-4"
        >
            <div class="flex w-full flex-col gap-4">
                <!-- Header -->
                <el-card shadow="never">
                    <el-page-header>
                        <template #content>
                            <span class="text-large font-600 mr-3"
                                >សិស្សានុសិស្ស</span
                            >
                        </template>
                        <template #extra>
                            <Create />
                        </template>
                    </el-page-header>
                </el-card>

                <!-- Content -->
                <el-card shadow="never">
                    <!-- Table -->
                    <el-table :data="paginatedData" style="width: 100%">
                        <el-table-column
                            prop="id"
                            label="Id"
                            width="70"
                            sortable
                        />
                        <el-table-column
                            prop="name"
                            label="ឆ្នាំសិក្សា"
                            width="180"
                            sortable
                        />
                        <el-table-column
                            prop="start_date"
                            label="ថ្ងៃចាប់ផ្តើម"
                            width="180"
                        />
                        <el-table-column
                            prop="end_date"
                            label="ថ្ងៃខែឆ្នាំបញ្ចប់"
                            width="180"
                        />
                        <el-table-column prop="note" label="កំណត់ចំណាំ" />
                        <!-- Actions -->
                        <el-table-column width="180" fixed="right">
                            <template #header>
                                <!-- Search -->
                                <div class="flex items-center gap-2">
                                    <el-input
                                        v-model="search"
                                        placeholder="ស្វែងរកឆ្នាំសិក្សា..."
                                        clearable
                                        style="width: 250px"
                                    />
                                </div>
                            </template>
                            <template #default="scope">
                                <Update :data="scope.row" />
                                <Delete :data="scope.row" />
                            </template>
                        </el-table-column>
                    </el-table>
                    <!-- Pagination -->
                    <div class="mt-4 flex items-center justify-end">
                        <el-pagination
                            class="mt-4"
                            background
                            v-model:current-page="currentPage"
                            v-model:page-size="pageSize"
                            :page-sizes="[5, 10, 20, 50]"
                            layout="total, sizes, prev, pager, next"
                            :total="filteredData.length"
                        />
                    </div>
                </el-card>
            </div>
        </div>
    </AppLayout>
</template>
