<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { Edit } from '@element-plus/icons-vue';
import { Head, router } from '@inertiajs/vue3';
import { computed, ref, watch } from 'vue';
import Delete from './actions/Delete.vue';
import Update from './actions/Update.vue';

const props = defineProps<{
    attendances: any[];
}>();

console.log('props.attendances', props.attendances);

const search = ref('');
const currentPage = ref(1);
const pageSize = ref(10);

/* Reset page when search or page size changes */
watch([search, pageSize], () => {
    currentPage.value = 1;
});

/* Search */
const filteredData = computed(() => {
    if (!search.value) return props.attendances;

    return props.attendances.filter(
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
    <Head title="មុខវិជ្ជា" />

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
                                >សម្រង់វត្តមានសិស្ស</span
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
                            label="ឈ្មោះបន្ទប់"
                            sortable
                        />
                        <el-table-column
                            prop="class_type.name"
                            label="ឈ្មោះថ្នាក់"
                            sortable
                        />
                        <el-table-column
                            prop="grade_level.name"
                            label="ប្រភេទថ្នាក់"
                            width="150"
                            sortable
                        />
                        <el-table-column
                            prop="name_en"
                            label="គ្រូសរុប"
                            width="150"
                        />
                        <el-table-column
                            prop="name_en"
                            label="សិស្សសរុប"
                            width="150"
                        />
                        <el-table-column
                            prop="academic_year.name"
                            label="ឆ្នាំសិក្សា"
                            width="150"
                        />
                        <!-- Actions -->
                        <el-table-column width="180" fixed="right">
                            <template #header>
                                <!-- Search -->
                                <div class="flex items-center gap-2">
                                    <el-input
                                        v-model="search"
                                        placeholder="ស្វែងរកឈ្មោះ..."
                                        clearable
                                        style="width: 250px"
                                    />
                                </div>
                            </template>
                            <template #default="scope">
                                <el-button
                                    type="primary"
                                    size="small"
                                    @click="
                                        router.get(
                                            route(
                                                'attendances.show',
                                                scope.row.id,
                                            ),
                                        )
                                    "
                                >
                                    <el-icon class="mr-1"><Edit /></el-icon>
                                    កត់វត្តមាន
                                </el-button>
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
