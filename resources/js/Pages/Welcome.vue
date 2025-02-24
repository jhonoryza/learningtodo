<script setup>
import { Head } from '@inertiajs/vue3';

defineProps({
    canLogin: boolean,
    canRegister: boolean,
});
</script>

<template>
    <Head title="Welcome" />
    <div class="bg-gray-50 text-black/50 dark:bg-black dark:text-white/50">
        <img
            id="background"
            class="absolute -left-20 top-0 max-w-[877px]"
            src="https://laravel.com/assets/img/welcome/background.svg"
        />
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
                    <nav v-if="canLogin" class="-mx-3 flex flex-1 justify-end">
                        <a
                            v-if="$page.props.auth.user"
                            :href="route('dashboard')"
                            class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                        >
                            Dashboard
                        </a>

                        <template v-else>
                            <a
                                :href="route('login')"
                                class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                            >
                                Log in
                            </a>

                            <a
                                v-if="canRegister"
                                :href="route('register')"
                                class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                            >
                                Register
                            </a>
                        </template>
                    </nav>
                </header>

                <main class="mt-6">
                    <div class="grid gap-6 lg:grid-cols-1 lg:gap-8">
                        <div
                            class="flex items-start gap-4 rounded-lg bg-white p-6 shadow-[0px_14px_34px_0px_rgba(0,0,0,0.08)] ring-1 ring-white/[0.05] dark:bg-zinc-900 dark:ring-zinc-800 lg:pb-10"
                        >
                            <div
                                class="flex size-12 shrink-0 items-center justify-center rounded-full bg-[#FF2D20]/10 sm:size-16"
                            >
                                <svg
                                    class="size-5 sm:size-6"
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        fill="#FF2D20"
                                        d="M23 4a1 1 0 0 0-1.447-.894L12.224 7.77a.5.5 0 0 1-.448 0L2.447 3.106A1 1 0 0 0 1 4v13.382a1.99 1.99 0 0 0 1.105 1.79l9.448 4.728c.14.065.293.1.447.1.154-.005.306-.04.447-.105l9.453-4.724a1.99 1.99 0 0 0 1.1-1.789V4ZM3 6.023a.25.25 0 0 1 .362-.223l7.5 3.75a.251.251 0 0 1 .138.223v11.2a.25.25 0 0 1-.362.224l-7.5-3.75a.25.25 0 0 1-.138-.22V6.023Zm18 11.2a.25.25 0 0 1-.138.224l-7.5 3.75a.249.249 0 0 1-.329-.099.249.249 0 0 1-.033-.12V9.772a.251.251 0 0 1 .138-.224l7.5-3.75a.25.25 0 0 1 .362.224v11.2Z"
                                    />
                                    <path
                                        fill="#FF2D20"
                                        d="m3.55 1.893 8 4.048a1.008 1.008 0 0 0 .9 0l8-4.048a1 1 0 0 0-.9-1.785l-7.322 3.706a.506.506 0 0 1-.452 0L4.454.108a1 1 0 0 0-.9 1.785H3.55Z"
                                    />
                                </svg>
                            </div>

                            <div class="pt-3 sm:pt-5">
                                <h2
                                    class="text-xl font-semibold text-black dark:text-white"
                                >
                                    Learning Todo App - Kelola Pembelajaranmu
                                    dengan Mudah!
                                </h2>

                                <div
                                    class="mt-4 text-sm/relaxed text-black dark:text-white"
                                >
                                    <h2 class="text-lg font-semibold">
                                        Belajar Lebih Terstruktur dengan
                                        Learning Todo App
                                    </h2>

                                    <p class="mt-2">
                                        Apakah kamu sering menemukan artikel,
                                        video, atau sumber belajar yang ingin
                                        dipelajari nanti, tetapi sulit mengatur
                                        semuanya? Learning Todo App hadir untuk
                                        membantumu menyimpan, mengatur, dan
                                        menandai sumber belajar yang sudah kamu
                                        selesaikan.
                                    </p>

                                    <h2 class="mt-4 text-lg font-semibold">
                                        Fitur Utama
                                    </h2>
                                    <ul class="mt-2 list-disc">
                                        <li>
                                            Simpan Link Pembelajaran - Tambahkan
                                            artikel, video, atau materi belajar
                                            lainnya ke dalam daftar todo.
                                        </li>
                                        <li>
                                            Checklist Sumber Belajar - Tandai
                                            materi yang sudah selesai dibaca
                                            atau ditonton untuk melacak progres
                                            belajarmu.
                                        </li>
                                        <li>
                                            Progress Tracker - Pantau
                                            perkembangan belajarmu dengan fitur
                                            visual yang intuitif.
                                        </li>
                                        <li>
                                            Akses di Mana Saja - Sinkronisasi
                                            otomatis sehingga kamu bisa
                                            mengakses daftar belajarmu dari
                                            berbagai perangkat.
                                        </li>
                                    </ul>

                                    <h2 class="mt-4 text-lg font-semibold">
                                        Kenapa Learning Todo App?
                                    </h2>
                                    <ul class="mt-2 list-disc">
                                        <li>
                                            Membantu Fokus - Tidak perlu lagi
                                            membuka banyak tab atau kehilangan
                                            sumber belajar penting.
                                        </li>
                                        <li>
                                            Produktif & Efisien - Atur prioritas
                                            materi dan rencanakan jadwal belajar
                                            dengan lebih baik.
                                        </li>
                                        <li>
                                            Mudah Digunakan - Antarmuka
                                            sederhana yang intuitif untuk
                                            pengalaman belajar tanpa ribet.
                                        </li>
                                    </ul>

                                    <p class="mt-4 font-semibold">
                                        Jangan biarkan sumber belajar berharga
                                        hilang begitu saja. Gunakan Learning
                                        Todo App untuk mengelola dan melacak
                                        progres pembelajaranmu dengan lebih
                                        efektif!
                                    </p>
                                    <p class="mt-4 font-semibold">
                                        🚀
                                        <a
                                            href="/register"
                                            class="text-sky-500 underline hover:text-sky-600"
                                        >
                                            Daftar Sekarang</a
                                        >
                                        & Mulai Perjalanan Belajarmu!
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
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
