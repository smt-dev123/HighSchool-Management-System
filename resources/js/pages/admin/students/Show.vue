<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { Head } from '@inertiajs/vue3';

const props = defineProps<{
    student: any;
}>();
</script>

<template>
    <Head title="ព័ត៌មានសិស្ស" />
    <AppLayout>
        <div class="p-4">
            <el-card>
                <h2 class="text-lg font-medium">
                    {{ props.student.name_kh }} -
                    {{ props.student.student_code }}
                </h2>
                <el-descriptions title="ព័ត៌មានសិស្ស" :column="1">
                    <el-descriptions-item label="ឈ្មោះ (EN)">{{
                        props.student.name_en
                    }}</el-descriptions-item>
                    <el-descriptions-item label="ភេទ">{{
                        props.student.gender
                    }}</el-descriptions-item>
                    <el-descriptions-item label="ថ្ងៃកំណើត">{{
                        props.student.dob
                    }}</el-descriptions-item>
                    <el-descriptions-item label="ទូរស័ព្ទ">{{
                        props.student.phone
                    }}</el-descriptions-item>
                    <el-descriptions-item label="អ៊ីមែល">{{
                        props.student.email
                    }}</el-descriptions-item>
                    <el-descriptions-item label="អាសយដ្ឋាន">{{
                        props.student.address
                    }}</el-descriptions-item>
                </el-descriptions>
            </el-card>
        </div>
    </AppLayout>
</template>
