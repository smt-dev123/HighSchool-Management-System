<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { Head } from '@inertiajs/vue3';
import { computed, ref, watch } from 'vue';
import Create from './actions/Create.vue';
import Update from './actions/Update.vue';
import Delete from './actions/Delete.vue';

const props = defineProps<{
    users: any[];
    userRoles: any[];
}>();

console.log(props.users);

const search = ref('');
const currentPage = ref(1);
const pageSize = ref(10);

/* Reset page when search or page size changes */
watch([search, pageSize], () => {
    currentPage.value = 1;
});

/* Search */
const filteredData = computed(() => {
    if (!search.value) return props.users;

    return props.users.filter((item) =>
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
    <Head title="អ្នកប្រើប្រាស់" />

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
                                >អ្នកប្រើប្រាស់</span
                            >
                        </template>
                        <template #extra>
                            <Create :userRoles="userRoles" />
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
                            label="ឈ្មោះអ្នកប្រើប្រាស់"
                            sortable
                        />
                        <el-table-column
                            prop="phone"
                            label="ទូរសព្ទ"
                            sortable
                        />
                        <el-table-column
                            prop="email"
                            label="អ៊ីមែល"
                            sortable
                        />
                        <el-table-column
                            prop="user_role.name"
                            label="តួនាទី"
                            sortable
                        />
                        <!-- <el-table-column
                            prop="created_at"
                            label="បានបង្កើតនៅ"
                            sortable
                        /> -->
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
                                <Update :data="scope.row" :userRoles="userRoles" />
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
