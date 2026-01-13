<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { Head } from '@inertiajs/vue3';

const props = defineProps<{ scores: any[] }>();
</script>

<template>
    <Head title="ពិន្ទសិស្ស" />

    <AppLayout>
        <div class="p-4">
            <el-card>
                <div class="mb-4 flex items-center justify-between">
                    <h3 class="text-lg font-medium">ពិន្ទសិស្ស</h3>
                </div>

                <el-table :data="props.scores" style="width: 100%">
                    <el-table-column prop="id" label="Id" width="80" />
                    <el-table-column prop="class.name" label="Class" />
                    <el-table-column prop="scoreType.name" label="Type" />
                </el-table>
            </el-card>
        </div>
    </AppLayout>
</template>
