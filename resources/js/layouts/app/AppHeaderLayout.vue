<script setup lang="ts">
import AppContent from '@/components/AppContent.vue';
import AppShell from '@/components/AppShell.vue';
import Navbar from '@/components/Navbar.vue';
import type { BreadcrumbItemType } from '@/types';

interface Props {
    breadcrumbs?: BreadcrumbItemType[];
}

withDefaults(defineProps<Props>(), {
    breadcrumbs: () => [],
});
</script>

<template>
    <AppShell class="flex-col">
        <Navbar />
        <!-- <AppHeader :breadcrumbs="breadcrumbs" /> -->
        <AppContent>
            <slot />
        </AppContent>
    </AppShell>
</template>
