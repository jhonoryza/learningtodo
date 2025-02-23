<script setup lang="ts">
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import {
    DropdownMenu,
    DropdownMenuContent,
    DropdownMenuItem,
    DropdownMenuTrigger,
} from '@/components/ui/dropdown-menu';
import {
    Sidebar,
    SidebarContent,
    SidebarFooter,
    SidebarGroup,
    SidebarGroupContent,
    SidebarGroupLabel,
    SidebarHeader,
    SidebarMenu,
    SidebarMenuButton,
    SidebarMenuItem,
} from '@/components/ui/sidebar';
import { Link } from '@inertiajs/vue3';
import { Home } from 'lucide-vue-next';

// Menu items.
const items = [
    {
        title: 'Dashboard',
        url: route('dashboard'),
        icon: Home,
    },
];
</script>

<template>
    <Sidebar>
        <SidebarHeader>
            <Link :href="route('dashboard')">
            <ApplicationLogo class="block h-9 w-auto" />
            </Link>
        </SidebarHeader>

        <SidebarContent>
            <SidebarGroup />
            <SidebarGroupLabel>Learning Todo App</SidebarGroupLabel>
            <SidebarGroupContent>
                <SidebarMenu>
                    <SidebarMenuItem v-for="item in items" :key="item.title">
                        <SidebarMenuButton asChild>
                            <Link :href="item.url">
                                <component :is="item.icon" />
                                <span>{{ item.title }}</span>
                            </Link>
                        </SidebarMenuButton>
                    </SidebarMenuItem>
                </SidebarMenu>
            </SidebarGroupContent>
            <SidebarGroup />
        </SidebarContent>

        <SidebarFooter>
            <SidebarMenu>
                <SidebarMenuItem>
                    <DropdownMenu>
                        <DropdownMenuTrigger asChild>
                            <SidebarMenuButton>
                                <User2 /> {{ $page.props.auth.user.name }}
                                <ChevronUp class="ml-auto" />
                            </SidebarMenuButton>
                        </DropdownMenuTrigger>
                        <DropdownMenuContent side="top" class="w-[--reka-popper-anchor-width]">
                            <DropdownMenuItem>
                                <Link :href="route('profile.edit')">
                                    <span>Account</span>
                                </Link>
                            </DropdownMenuItem>
                            <DropdownMenuItem>
                                <a :href="route('logout')">
                                    <span>Sign out</span>
                                </a>
                            </DropdownMenuItem>
                        </DropdownMenuContent>
                    </DropdownMenu>
                </SidebarMenuItem>
            </SidebarMenu>
        </SidebarFooter>
    </Sidebar>
</template>
