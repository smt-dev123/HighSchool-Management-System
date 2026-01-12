<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { Head } from '@inertiajs/vue3';
import { computed, ref, watch } from 'vue';
import Create from './actions/Create.vue';
import Delete from './actions/Delete.vue';
import Update from './actions/Update.vue';

const props = defineProps<{
    teachers: any[];
    teacher_statuses: any[];
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
    if (!search.value) return props.teachers;

    return props.teachers.filter(
        (item) =>
            item.name_kh.toLowerCase().includes(search.value.toLowerCase()) ||
            item.name_en.toLowerCase().includes(search.value.toLowerCase()),
    );
});

/* Pagination */
const paginatedData = computed(() => {
    const start = (currentPage.value - 1) * pageSize.value;
    return filteredData.value.slice(start, start + pageSize.value);
});
</script>

<template>
    <Head title="គ្រូបង្រៀន" />

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
                                >គ្រូបង្រៀន</span
                            >
                        </template>
                        <template #extra>
                            <Create :teacher_statuses="teacher_statuses" />
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
                            width="120"
                            fixed="left"
                            sortable
                        />
                        <el-table-column
                            prop="name_kh"
                            label="ឈ្មោះជាខ្មែរ"
                            width="180"
                            sortable
                            fixed="left"
                        />
                        <el-table-column
                            prop="name_en"
                            label="ឈ្មោះជាអង់គ្លេស"
                            width="180"
                            sortable
                        />
                        <el-table-column label="ភេទ" width="80">
                            <template #default="scope">
                                {{
                                    scope.row.gender === 'M' ? 'ប្រុស' : 'ស្រី'
                                }}
                            </template>
                        </el-table-column>
                        <el-table-column
                            prop="dob"
                            label="ថ្ងៃខែឆ្នាំកំណើត"
                            width="120"
                        />
                        <el-table-column
                            prop="address"
                            label="អាសយដ្ឋាន"
                            width="180"
                        />
                        <el-table-column
                            prop="phone"
                            label="លេខទូរសព្ទ"
                            width="180"
                        />
                        <el-table-column
                            prop="email"
                            label="អ៊ីម៉ែល"
                            width="180"
                        />
                        <el-table-column
                            prop="other"
                            label="ផ្សេងៗ"
                            width="200"
                        />

                        <!-- Actions -->
                        <el-table-column width="180" fixed="right">
                            <template #header>
                                <!-- Search -->
                                <div class="flex items-center gap-2">
                                    <el-input
                                        v-model="search"
                                        placeholder="ស្វែងរក..."
                                        clearable
                                        style="width: 250px"
                                    />
                                </div>
                            </template>
                            <template #default="scope">
                                <Update
                                    :data="scope.row"
                                    :teacher_statuses="teacher_statuses"
                                />
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
