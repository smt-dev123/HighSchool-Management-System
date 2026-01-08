<script setup lang="ts">
import {
    DataAnalysis,
    DataLine,
    DocumentChecked,
    Expand,
    Fold,
    OfficeBuilding,
    Reading,
    Setting,
} from '@element-plus/icons-vue';
import { Link, usePage } from '@inertiajs/vue3';
import {
    Calendar,
    Notebook,
    School,
    Tickets,
    Timer,
    User,
} from 'lucide-vue-next';
import { ref } from 'vue';
import { route } from 'ziggy-js';

const collapsed = ref<boolean>(false);

const menuItems = [
    {
        key: '1',
        icon: DataAnalysis,
        label: 'ផ្ទាំងគ្រប់គ្រង',
        url: 'admin.dashboard',
    },
    { key: '2', icon: Reading, label: 'សិស្សានុសិស្ស', url: 'admin.students' },
    { key: '3', icon: School, label: 'គ្រូបង្រៀន', url: 'admin.teachers' },
    { key: '4', icon: Notebook, label: 'មុខវិជ្ជាទូទៅ', url: 'admin.subjects' },
    {
        key: '5',
        icon: DocumentChecked,
        label: 'មុខវិជ្ជាតាមកម្រិត',
        url: 'admin.subject_grades',
    },
    {
        key: '6',
        icon: OfficeBuilding,
        label: 'ថ្នាក់រៀន',
        url: 'admin.classes',
    },
    { key: '7', icon: Calendar, label: 'កាលវិភាគ', url: 'admin.schedules' },
    {
        key: '8',
        icon: Tickets,
        label: 'សម្រង់វត្តមាន',
        url: 'admin.attendances',
    },
    { key: '9', icon: Timer, label: 'ការប្រឡង', url: 'admin.exams' },
    { key: '10', icon: DataLine, label: 'ពិន្ទសិស្ស', url: 'admin.scores' },
    { key: '11', icon: Timer, label: 'ម៉ោងសិក្សា', url: 'admin.times' },
    {
        key: '12',
        icon: Calendar,
        label: 'ឆ្នាំសិក្សា',
        url: 'admin.academic-years',
    },
    {
        key: '13',
        icon: DocumentChecked,
        label: 'របាយការណ៍',
        url: 'admin.reports',
    },
    { key: '14', icon: User, label: 'អ្នកប្រើប្រាស់', url: 'admin.users' },
    {
        key: '15',
        icon: Setting,
        label: 'ការកំណត់ប្រព័ន្ធ',
        url: 'admin.settings',
    },
];

// Safe route generator to avoid Ziggy runtime issues in dev/HMR contexts
const safeRoute = (name: string) => {
    try {
        // try to build using Ziggy; may throw if Ziggy data isn't available yet
        const r = route(name);
        return typeof r === 'string' ? r : String(r);
    } catch (e) {
        // fallback: map route name to a sensible path (e.g. admin.dashboard -> /admin/dashboard)
        if (!name) return '#';
        const parts = name.split('.');
        return '/' + parts.join('/');
    }
};

// មុខងារពិនិត្យមើលថា Route ណាដែលកំពុង Active (ប្រើសម្រាប់ដាក់ពណ៌)
const isUrl = (name: string) => {
    const href = safeRoute(name);
    try {
        const path = href.replace(window.location.origin, '');
        return usePage().url.startsWith(path);
    } catch (e) {
        return usePage().url.startsWith(href);
    }
};
</script>

<template>
    <aside
        :class="[
            'flex h-screen flex-col border-r border-gray-200 bg-white text-gray-900 transition-all duration-300',
            collapsed ? 'w-16' : 'w-64',
        ]"
    >
        <div
            class="flex h-16 items-center justify-between border-b border-gray-200 px-4"
        >
            <Link
                v-if="!collapsed"
                :href="safeRoute('admin.dashboard')"
                class="block"
            >
                <img
                    class="h-auto w-10"
                    src="https://api.weteka.org/public/orgs/6603842b23d9386625ec762b/images/9b612c80-afff-4bb4-b4e7-330d65d5f9a3.png"
                    alt="Logo"
                />
            </Link>
            <button
                @click="collapsed = !collapsed"
                class="cursor-pointer text-2xl text-gray-600 hover:text-black"
            >
                <el-icon>
                    <Expand v-if="collapsed" />
                    <Fold v-else />
                </el-icon>
            </button>
        </div>

        <nav class="font-khmer mt-4 flex-1 overflow-auto">
            <ul class="mx-2 space-y-1">
                <li v-for="menu in menuItems" :key="menu.key">
                    <Link
                        :href="safeRoute(menu.url)"
                        :class="[
                            'flex items-center rounded px-4 py-2 transition-colors duration-200',
                            isUrl(menu.url)
                                ? 'bg-[#e6f7ff] text-[#1890ff]'
                                : 'text-gray-700 hover:bg-gray-100',
                        ]"
                    >
                        <el-icon
                            :class="[
                                'text-xl',
                                isUrl(menu.url) ? 'text-[#1890ff]' : '',
                            ]"
                        >
                            <component :is="menu.icon" />
                        </el-icon>
                        <span v-if="!collapsed" class="ml-3 line-clamp-1">{{
                            menu.label
                        }}</span>
                    </Link>
                </li>
            </ul>
        </nav>
    </aside>
</template>

<style scoped>
/* លុប router-link-active ចេញ ព្រោះយើងប្រើ Tailwind class ជំនួសវិញ */
.font-khmer {
    font-family: 'Khmer OS Battambang', sans-serif;
}
</style>
