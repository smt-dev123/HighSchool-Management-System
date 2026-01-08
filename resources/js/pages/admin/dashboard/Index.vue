<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { Head } from '@inertiajs/vue3';
import { LineChart } from 'echarts/charts';
import {
    GridComponent,
    TitleComponent,
    TooltipComponent,
} from 'echarts/components';
import { use } from 'echarts/core';
import { CanvasRenderer } from 'echarts/renderers';
import { ref } from 'vue';
import VChart from 'vue-echarts';
import { getDashboard, getMonth } from './data';

// Register ECharts components
use([
    CanvasRenderer,
    LineChart,
    GridComponent,
    TooltipComponent,
    TitleComponent,
]);

// ទិន្នន័យសម្រាប់ក្រាប
const chartOptions = ref({
    tooltip: { trigger: 'axis' },
    xAxis: {
        type: 'category',
        data: getMonth().map((month) => month.name),
        axisLabel: { family: 'Kantumruy Pro' },
    },
    yAxis: {
        type: 'value',
        max: 100,
        axisLabel: { formatter: '{value}%' },
    },
    series: [
        {
            data: getDashboard().map((dashboard) => dashboard.value),
            type: 'line',
            smooth: true,
            color: '#409eff',
            areaStyle: { opacity: 0.1 },
        },
    ],
    grid: { left: '10%', right: '5%', bottom: '10%', top: '10%' },
});
</script>

<template>
    <Head title="Dashboard" />

    <AppLayout>
        <div class="flex h-full flex-1 flex-col overflow-x-auto rounded-xl p-4">
            <div class="grid grid-cols-2 gap-4 lg:grid-cols-4">
                <div
                    v-for="item in getDashboard()"
                    :key="item.id"
                    class="rounded-lg bg-white p-6 shadow"
                >
                    <div class="mb-4 flex items-center gap-2">
                        <el-icon :size="20" :color="item.color">
                            <component :is="item.icon" />
                        </el-icon>
                        <span class="text-xl font-semibold">{{
                            item.label
                        }}</span>
                    </div>
                    <p
                        :class="[
                            'font-bold',
                            'text-right',
                            'text-2xl',
                            item.textColor,
                        ]"
                    >
                        {{ item.value }}
                        {{
                            item.id === 2
                                ? 'នាក់'
                                : item.id === 1
                                  ? 'នាក់'
                                  : 'ថ្នាក់'
                        }}
                    </p>
                </div>
            </div>

            <div class="mt-4 grid grid-cols-1 gap-4 lg:grid-cols-2">
                <el-card shadow="never">
                    <h2 class="mb-4 text-lg font-bold">
                        សិស្សវត្តមានច្រើនជាងគេ
                    </h2>
                    <el-table
                        :data="[
                            { name: 'សិស្ស A', attendance: '95%' },
                            { name: 'សិស្ស B', attendance: '93%' },
                            { name: 'សិស្ស C', attendance: '92%' },
                            { name: 'សិស្ស D', attendance: '90%' },
                        ]"
                    >
                        <el-table-column prop="name" label="ឈ្មោះសិស្ស" />
                        <el-table-column prop="attendance" label="វត្តមាន" />
                    </el-table>
                </el-card>

                <el-card shadow="never">
                    <h2 class="mb-4 text-lg font-bold">
                        វត្តមានសិស្សប្រចាំខែ (%)
                    </h2>
                    <div class="h-64">
                        <v-chart
                            class="chart"
                            :option="chartOptions"
                            autoresize
                        />
                    </div>
                </el-card>
            </div>
        </div>
    </AppLayout>
</template>

<style scoped>
.chart {
    height: 100%;
    width: 100%;
}
</style>
