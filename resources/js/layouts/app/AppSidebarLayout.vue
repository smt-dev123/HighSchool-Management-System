<script setup lang="ts">
import AppContent from '@/components/AppContent.vue';
import AppShell from '@/components/AppShell.vue';
import Navbar from '@/components/Navbar.vue';
import Sidebar from '@/components/Sidebar.vue';

// interface Props {
//     breadcrumbs?: BreadcrumbItemType[];
// }

// withDefaults(defineProps<Props>(), {
//     breadcrumbs: () => [],
// });
</script>

<template>
    <AppShell variant="sidebar">
        <!-- <AppSidebar /> -->
        <Sidebar />
        <AppContent variant="sidebar" class="overflow-x-hidden">
            <!-- <AppSidebarHeader :breadcrumbs="breadcrumbs" /> -->
            <Navbar />
            <div class="h-full bg-blue-50" style="width: 100%">
                <slot />
            </div>
        </AppContent>
    </AppShell>
</template>
