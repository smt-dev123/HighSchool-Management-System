<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { Head } from '@inertiajs/vue3';

const props = defineProps<{ exams: any[] }>();
</script>

<template>
    <Head title="ការប្រឡង" />

    <AppLayout>
        <div class="p-4">
            <el-card>
                <div class="mb-4 flex items-center justify-between">
                    <h3 class="text-lg font-medium">ការប្រឡង</h3>
                </div>

                <el-table :data="props.exams" style="width: 100%">
                    <el-table-column prop="id" label="Id" width="80" />
                    <el-table-column prop="name" label="Name" />
                    <el-table-column prop="date" label="Date" />
                </el-table>
            </el-card>
        </div>
    </AppLayout>
</template>
