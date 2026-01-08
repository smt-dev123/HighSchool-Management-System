<script setup lang="ts">
const props = defineProps({
    currentPage: { type: Number, default: 1 },
    pageSize: { type: Number, default: 10 },
    pageSizes: {
        type: Array as () => number[],
        default: () => [5, 10, 20, 50],
    },
    total: { type: Number, default: 0 },
    layout: { type: String, default: 'total, sizes, prev, pager, next' },
});

const emit = defineEmits(['update:currentPage', 'update:pageSize']);

const handleCurrentChange = (page: number) => emit('update:currentPage', page);
const handleSizeChange = (size: number) => emit('update:pageSize', size);
</script>

<template>
    <el-pagination
        :current-page="currentPage"
        :page-size="pageSize"
        :page-sizes="pageSizes"
        :layout="layout"
        :total="total"
        @current-change="handleCurrentChange"
        @size-change="handleSizeChange"
        background
    />
</template>
