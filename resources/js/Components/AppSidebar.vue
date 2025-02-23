<script setup lang="ts">
import ApplicationLogo from '@/components/ApplicationLogo.vue';
import {
    DropdownMenu,
    DropdownMenuContent,
    DropdownMenuItem,
    DropdownMenuTrigger,
    DropdownMenuSeparator,
    DropdownMenuLabel,
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
    useSidebar,
    SidebarMenuSub,
    SidebarMenuSubButton,
    SidebarMenuSubItem,
} from '@/components/ui/sidebar';
import {
  Collapsible,
  CollapsibleContent,
  CollapsibleTrigger,
} from '@/components/ui/collapsible';
import { Link } from '@inertiajs/vue3';
import {
    ChevronsUpDown,
    GalleryVerticalEnd,
    LogOut,
    UserPen,
    SquareTerminal,
    ChevronRight,
} from 'lucide-vue-next';

const { isMobile } = useSidebar();

const data = {
    navMain: [
        {
            title: 'Playground',
            url: '#',
            icon: SquareTerminal,
            isActive: true,
            items: [
                {
                    title: 'Home',
                    url: route('dashboard'),
                },
                {
                    title: 'Todo',
                    url: route('todos.index'),
                },
            ],
        },
    ],
    navAccount: [
        {
            name: 'Profile',
            icon: UserPen,
            url: route('profile.edit'),
        },
        {
            name: 'Logout',
            icon: LogOut,
            url: route('logout'),
        },
    ],
};
</script>

<template>
    <Sidebar>
        <SidebarHeader>
            <SidebarMenu>
                <SidebarMenuItem>
                    <DropdownMenu>
                        <DropdownMenuTrigger as-child>
                            <SidebarMenuButton size="lg"
                                class="data-[state=open]:bg-sidebar-accent data-[state=open]:text-sidebar-accent-foreground">
                                <div
                                    class="flex aspect-square size-8 items-center justify-center rounded-lg bg-sidebar-primary text-sidebar-primary-foreground">
                                    <component :is="GalleryVerticalEnd" class="size-4" />
                                </div>
                                <div class="grid flex-1 text-left text-sm leading-tight">
                                    <span class="truncate font-semibold">
                                        {{ $page.props.auth.user.name }}
                                    </span>
                                    <span class="truncate text-xs">
                                        {{ $page.props.auth.user.email }}
                                    </span>
                                </div>
                                <ChevronsUpDown class="ml-auto" />
                            </SidebarMenuButton>
                        </DropdownMenuTrigger>
                        <DropdownMenuContent class="w-[--reka-dropdown-menu-trigger-width] min-w-56 rounded-lg"
                            align="start" :side="isMobile ? 'bottom' : 'right'" :side-offset="4">
                            <DropdownMenuLabel class="text-muted-foreground text-xs">
                                Account
                            </DropdownMenuLabel>
                            <DropdownMenuSeparator />
                            <DropdownMenuItem v-for="(account, index) in data.navAccount" :key="index" class="gap-2 p-2">
                                <Link :href="account.url" class="flex items-center gap-2">
                                <div class="flex size-6 items-center justify-center rounded-sm border">
                                    <component :is="account.icon" class="size-4 shrink-0" />
                                </div>
                                {{ account.name }}
                                </Link>
                            </DropdownMenuItem>
                        </DropdownMenuContent>
                    </DropdownMenu>
                </SidebarMenuItem>
            </SidebarMenu>
        </SidebarHeader>

        <SidebarContent>
            <SidebarGroup />
            <SidebarGroupLabel>Platform</SidebarGroupLabel>
            <SidebarGroupContent>
                <SidebarMenu>
                    <Collapsible v-for="item in data.navMain" :key="item.title" as-child :default-open="item.isActive"
                        class="group/collapsible">
                        <SidebarMenuItem>
                            <CollapsibleTrigger as-child>
                                <SidebarMenuButton :tooltip="item.title">
                                    <component :is="item.icon" v-if="item.icon" />
                                    <span>{{ item.title }}</span>
                                    <ChevronRight
                                        class="ml-auto transition-transform duration-200 group-data-[state=open]/collapsible:rotate-90" />
                                </SidebarMenuButton>
                            </CollapsibleTrigger>
                            <CollapsibleContent>
                                <SidebarMenuSub>
                                    <SidebarMenuSubItem v-for="subItem in item.items" :key="subItem.title">
                                        <SidebarMenuSubButton as-child>
                                            <Link :href="subItem.url">
                                                <span>{{ subItem.title }}</span>
                                            </Link>
                                        </SidebarMenuSubButton>
                                    </SidebarMenuSubItem>
                                </SidebarMenuSub>
                            </CollapsibleContent>
                        </SidebarMenuItem>
                    </Collapsible>
                </SidebarMenu>
            </SidebarGroupContent>
            <SidebarGroup />
        </SidebarContent>

        <SidebarFooter>
            <SidebarMenuItem>
                <Link :href="route('dashboard')" class="flex items-center gap-2">
                <ApplicationLogo class="block h-9 w-auto" />
                <p>Learning Todo App</p>
                </Link>
            </SidebarMenuItem>
        </SidebarFooter>
    </Sidebar>
</template>
