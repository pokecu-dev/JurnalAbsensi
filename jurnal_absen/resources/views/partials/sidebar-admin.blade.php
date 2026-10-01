<aside id="sidebar"
       class="fixed inset-y-0 left-0
              w-60
              bg-dark-green text-white
              p-6
              flex flex-col justify-between
              z-50
              -translate-x-full
              md:translate-x-0
              transition-transform duration-300">

    <!-- ================================================= -->
    <!-- SIDEBAR TOP -->
    <!-- ================================================= -->

    <div>

        <!-- LOGO -->

        <div class="flex flex-col
                    items-center
                    gap-2
                    mb-10
                    text-center">

            <img src="{{ asset('image/logo.png') }}"
                 alt="Logo Jurnal Absensi"
                 class="w-16 h-auto">

            <span class="font-bold text-sm tracking-wide">
                Jurnal Absensi
            </span>

        </div>


        <!-- ================================================= -->
        <!-- NAVIGATION -->
        <!-- ================================================= -->

        <nav class="flex flex-col gap-5
                    font-semibold text-xs">


            <!-- ================================================= -->
            <!-- UTAMA -->
            <!-- ================================================= -->

            <div>

                <div class="text-[10px]
                            uppercase
                            font-extrabold
                            text-gray-400
                            tracking-wider
                            mb-2
                            px-2">

                    Utama

                </div>


                <div class="space-y-1">


                    <!-- DASHBOARD -->

                    <a href="{{ url('/admin/dashboard') }}"
                       class="flex items-center gap-3
                              px-4 py-3
                              rounded-xl
                              transition
                              active:scale-[0.98]
                              {{ request()->is('admin/dashboard') || request()->is('admin/dashboard/') 
                                  ? 'bg-white/10 text-mint-green' 
                                  : 'text-gray-300 hover:bg-white/10 hover:text-mint-green' }}">

                        <i class="fa-solid fa-house w-4 text-center"></i>

                        Dashboard

                    </a>


                    <!-- MONITORING JURNAL -->

                    <a href="{{ url('/admin/data_jurnal') }}"
                       class="flex items-center gap-3
                              px-4 py-3
                              rounded-xl
                              transition
                              active:scale-[0.98]
                              {{ request()->is('admin/data_jurnal*') 
                                  ? 'bg-white/10 text-mint-green' 
                                  : 'text-gray-300 hover:bg-white/10 hover:text-mint-green' }}">

                        <i class="fa-solid fa-book-bookmark w-4 text-center"></i>

                        Monitoring Jurnal

                    </a>


                    <!-- DISPENSASI -->

                    <a href="{{ url('/admin/data_dispensasi') }}"
                       class="flex items-center gap-3
                              px-4 py-3
                              rounded-xl
                              transition
                              active:scale-[0.98]
                              {{ request()->is('admin/data_dispensasi*') || request()->is('admin/detail_dispensasi*')
                                  ? 'bg-white/10 text-mint-green' 
                                  : 'text-gray-300 hover:bg-white/10 hover:text-mint-green' }}">

                        <i class="fa-solid fa-file-signature w-4 text-center"></i>

                        Dispensasi

                    </a>

                </div>

            </div>


            <!-- ================================================= -->
            <!-- DATA MASTER -->
            <!-- ================================================= -->

            <div>

                <div class="text-[10px]
                            uppercase
                            font-extrabold
                            text-gray-400
                            tracking-wider
                            mb-2
                            px-2">

                    Data Master

                </div>


                <div class="space-y-1">


                    <!-- DATA GURU -->

                    <a href="{{ url('/admin/data_guru') }}"
                       class="flex items-center gap-3
                              px-4 py-3
                              rounded-xl
                              transition
                              active:scale-[0.98]
                              {{ request()->is('admin/data_guru*') || request()->is('admin/detail_guru*')
                                  ? 'bg-white/10 text-mint-green' 
                                  : 'text-gray-300 hover:bg-white/10 hover:text-mint-green' }}">

                        <i class="fa-solid fa-chalkboard-user w-4 text-center"></i>

                        Data Guru

                    </a>


                    <!-- DATA SISWA -->

                    <a href="{{ url('/admin/data_siswa') }}"
                       class="flex items-center gap-3
                              px-4 py-3
                              rounded-xl
                              transition
                              active:scale-[0.98]
                              {{ request()->is('admin/data_siswa*') || request()->is('admin/detail_siswa*')
                                  ? 'bg-white/10 text-mint-green' 
                                  : 'text-gray-300 hover:bg-white/10 hover:text-mint-green' }}">

                        <i class="fa-solid fa-user-graduate w-4 text-center"></i>

                        Data Siswa

                    </a>


                    <!-- DATA KELAS -->

                    <a href="{{ url('/admin/data_kelas') }}"
                       class="flex items-center gap-3
                              px-4 py-3
                              rounded-xl
                              transition
                              active:scale-[0.98]
                              {{ request()->is('admin/data_kelas*') 
                                  ? 'bg-white/10 text-mint-green' 
                                  : 'text-gray-300 hover:bg-white/10 hover:text-mint-green' }}">

                        <i class="fa-solid fa-school w-4 text-center"></i>

                        Data Kelas

                    </a>


                    <!-- JADWAL -->

                    <a href="{{ url('/admin/jadwal') }}"
                       class="flex items-center gap-3
                              px-4 py-3
                              rounded-xl
                              transition
                              active:scale-[0.98]
                              {{ request()->is('admin/jadwal*') 
                                  ? 'bg-white/10 text-mint-green' 
                                  : 'text-gray-300 hover:bg-white/10 hover:text-mint-green' }}">

                        <i class="fa-solid fa-calendar-days w-4 text-center"></i>

                        Jadwal

                    </a>

                </div>

            </div>

        </nav>

    </div>


    <!-- ================================================= -->
    <!-- FOOTER SIDEBAR -->
    <!-- ================================================= -->

    <div class="flex flex-col gap-1
                pt-3
                border-t border-white/10
                text-xs">


        <!-- AKUN ADMIN -->

        <a href="{{ url('/admin/akun') }}"
           class="flex items-center gap-2
                  px-2 py-2
                  rounded-lg
                  active:scale-[0.98]
                  transition-all duration-200
                  {{ request()->is('admin/akun*') 
                      ? 'bg-white/10 text-mint-green' 
                      : 'hover:bg-white/10' }}">

            <i class="fa-solid fa-user-circle w-4"></i>

            <span>Akun Admin</span>

        </a>


        <!-- LOGOUT -->

        <a href="{{ route('logout') }}"
           class="w-full
                  flex items-center gap-2
                  px-2 py-2
                  rounded-lg
                  hover:bg-white/10
                  active:scale-[0.98]
                  transition-all duration-200">

            <i class="fa-solid fa-right-from-bracket w-4"></i>

            <span>Logout</span>

        </a>

    </div>

</aside>