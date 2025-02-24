<script setup>
import { Head } from '@inertiajs/vue3';

defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
});
</script>

<template>
    <Head title="Welcome" />
    <div class="bg-gray-50 text-black/50 dark:bg-black dark:text-white/50">
        <div
            class="relative flex min-h-screen flex-col items-center justify-center selection:bg-[#FF2D20] selection:text-white"
        >
            <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">
                <header
                    class="grid grid-cols-2 items-center gap-2 py-10 lg:grid-cols-3"
                >
                    <div class="flex lg:col-start-2 lg:justify-center">
                        <img
                            :src="$page.props.logo"
                            alt="learning_todo_logo"
                            class="h-28"
                        />
                    </div>
                </header>

                <main class="mt-6">
                    <div class="grid gap-6 lg:grid-cols-1 lg:gap-8">
                        <div
                            class="flex items-start justify-center gap-4 rounded-lg bg-white p-6 shadow-[0px_14px_34px_0px_rgba(0,0,0,0.08)] ring-1 ring-white/[0.05] dark:bg-zinc-900 dark:ring-zinc-800 lg:pb-10"
                        >
                            <div class="pt-3 sm:pt-5">
                                <h2
                                    class="text-2xl font-bold text-black dark:text-white"
                                >
                                    Transform Your Learning Journey 🚀
                                </h2>

                                <div
                                    class="mt-4 text-sm/relaxed text-black dark:text-white"
                                >
                                    <p class="text-lg leading-relaxed">
                                        Feeling overwhelmed with scattered
                                        learning materials?
                                        <span
                                            class="font-semibold text-[#FF2D20]"
                                            >Learning Todo App</span
                                        >
                                        is your solution!
                                    </p>

                                    <div class="mt-8 grid gap-6 md:grid-cols-2">
                                        <div class="space-y-4">
                                            <h3 class="text-xl font-semibold">
                                                ✨ Key Features
                                            </h3>
                                            <ul class="space-y-3">
                                                <li
                                                    class="flex items-center gap-2"
                                                >
                                                    <span class="text-[#FF2D20]"
                                                        >▸</span
                                                    >
                                                    <span
                                                        >Store & organize
                                                        learning resources in
                                                        one place</span
                                                    >
                                                </li>
                                                <li
                                                    class="flex items-center gap-2"
                                                >
                                                    <span class="text-[#FF2D20]"
                                                        >▸</span
                                                    >
                                                    <span
                                                        >Intuitive & visual
                                                        progress tracking</span
                                                    >
                                                </li>
                                                <li
                                                    class="flex items-center gap-2"
                                                >
                                                    <span class="text-[#FF2D20]"
                                                        >▸</span
                                                    >
                                                    <span
                                                        >Cross-device
                                                        synchronization</span
                                                    >
                                                </li>
                                                <li
                                                    class="flex items-center gap-2"
                                                >
                                                    <span class="text-[#FF2D20]"
                                                        >▸</span
                                                    >
                                                    <span
                                                        >Smart reminders for
                                                        learning
                                                        consistency</span
                                                    >
                                                </li>
                                            </ul>
                                        </div>

                                        <div class="space-y-4">
                                            <h3 class="text-xl font-semibold">
                                                💪 Benefits
                                            </h3>
                                            <ul class="space-y-3">
                                                <li
                                                    class="flex items-center gap-2"
                                                >
                                                    <span
                                                        class="text-emerald-500"
                                                        >✓</span
                                                    >
                                                    <span
                                                        >Boost learning
                                                        productivity up to
                                                        2x</span
                                                    >
                                                </li>
                                                <li
                                                    class="flex items-center gap-2"
                                                >
                                                    <span
                                                        class="text-emerald-500"
                                                        >✓</span
                                                    >
                                                    <span
                                                        >Minimalist &
                                                        user-friendly
                                                        interface</span
                                                    >
                                                </li>
                                                <li
                                                    class="flex items-center gap-2"
                                                >
                                                    <span
                                                        class="text-emerald-500"
                                                        >✓</span
                                                    >
                                                    <span
                                                        >Measurable progress
                                                        tracking</span
                                                    >
                                                </li>
                                                <li
                                                    class="flex items-center gap-2"
                                                >
                                                    <span
                                                        class="text-emerald-500"
                                                        >✓</span
                                                    >
                                                    <span
                                                        >Active learning
                                                        community</span
                                                    >
                                                </li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="mt-10 space-y-6">
                                        <div
                                            class="rounded-lg bg-gradient-to-r from-[#FF2D20]/10 to-transparent p-6"
                                        >
                                            <h3 class="text-xl font-semibold">
                                                🎯 Start Your Learning Journey
                                            </h3>
                                            <p class="mt-2">
                                                Join now and experience the ease
                                                of managing your learning with a
                                                structured system.
                                            </p>
                                        </div>

                                        <div
                                            class="flex items-center justify-center space-x-4"
                                        >
                                            <a
                                                v-if="$page.props.auth.user"
                                                :href="route('dashboard')"
                                                class="inline-flex items-center gap-2 rounded-full bg-[#FF2D20] px-6 py-3 text-base font-semibold text-white transition hover:bg-[#FF2D20]/90"
                                            >
                                                GoTo Dashboard
                                            </a>
                                            <template v-else>
                                                <a
                                                    v-if="canRegister"
                                                    :href="route('register')"
                                                    class="inline-flex items-center gap-2 rounded-full bg-[#FF2D20] px-6 py-3 text-base font-semibold text-white transition hover:bg-[#FF2D20]/90"
                                                >
                                                    Sign Up
                                                </a>
                                                <a
                                                    v-if="canLogin"
                                                    :href="route('login')"
                                                    class="inline-flex items-center gap-2 rounded-full bg-[#FF2D20] px-6 py-3 text-base font-semibold text-white transition hover:bg-[#FF2D20]/90"
                                                >
                                                    Login
                                                </a>
                                            </template>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <nav
                        class="mt-4 flex items-center gap-4 text-sm text-primary underline"
                    >
                        <a :href="route('policy')">Privacy Policy</a>
                        <a :href="route('tos')">Terms & Condition</a>
                    </nav>
                </main>

                <footer
                    class="py-16 text-center text-sm text-black dark:text-white/70"
                >
                    @Copyright 2024 - {{ new Date().getFullYear() }} Labkita
                </footer>
            </div>
        </div>
    </div>
</template>
