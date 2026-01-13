<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { Head } from '@inertiajs/vue3';

const props = defineProps<{ attendances: any[] }>();
</script>

<template>
    <Head title="សម្រង់វត្តមាន" />

    <AppLayout>
        <div class="p-4">
            <el-card>
                <div class="mb-4 flex items-center justify-between">
                    <h3 class="text-lg font-medium">សម្រង់វត្តមាន</h3>
                </div>

                <el-table :data="props.attendances" style="width: 100%">
                    <el-table-column prop="id" label="Id" width="80" />
                    <el-table-column prop="class.name" label="Class" />
                    <el-table-column prop="time.name" label="Time" />
                </el-table>
            </el-card>
        </div>
    </AppLayout>
</template>
