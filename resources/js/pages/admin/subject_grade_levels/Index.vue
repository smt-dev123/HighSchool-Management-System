<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { Head } from '@inertiajs/vue3';
import { computed, ref, watch } from 'vue';
import Create from './actions/Create.vue';
import Delete from './actions/Delete.vue';
import Update from './actions/Update.vue';

const props = defineProps<{
    subject_grade_levels: any[];
    subjects: any[];
    grade_levels: any[];
    class_types: any[];
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
    if (!search.value) return props.subject_grade_levels;

    return props.subject_grade_levels.filter(
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
    <Head title="មុខវិជ្ជាតាមកម្រិត" />

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
                                >មុខវិជ្ជាតាមកម្រិត</span
                            >
                        </template>
                        <template #extra>
                            <Create
                                :subjects="subjects"
                                :grade_levels="grade_levels"
                                :class_types="class_types"
                            />
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
                            width="80"
                            fixed="left"
                            sortable
                        />
                        <el-table-column
                            prop="subject.name_kh"
                            label="មុខវិជ្ជា"
                            sortable
                            fixed="left"
                        />
                        <el-table-column
                            prop="grade_level.name"
                            label="កម្រិត"
                            sortable
                        />
                        <el-table-column
                            prop="class_type.name"
                            label="ប្រភេទថ្នាក់"
                            sortable
                        />
                        <el-table-column
                            prop="full_score"
                            label="ពិន្ទុពេញ"
                            width="150"
                        />
                        <el-table-column
                            prop="divide"
                            label="មេគុណ"
                            width="150"
                        />
                        <el-table-column
                            prop="average"
                            label="មធ្យមភាគ"
                            width="150"
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
                                    :subjects="subjects"
                                    :grade_levels="grade_levels"
                                    :class_types="class_types"
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
