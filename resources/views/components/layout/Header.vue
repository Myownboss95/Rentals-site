<template>
  <header id="page-topbar">
    <div class="navbar-header">
      <div class="d-flex">
        <!-- LOGO -->
        <div class="navbar-brand-box">
          <inertia-link :href="route(`${is_admin ? 'admin':'user'}.index`)" class="logo logo-dark">
            <span class="logo-sm">
              <img src="@/assets/images/logo-sm.png" alt="" height="24" />
            </span>
            <span class="logo-lg">
              <img src="@/assets/images/logo-sm.png" alt="" height="24" />
              <span class="logo-txt">{{ appName }}</span>
            </span>
          </inertia-link>

          <inertia-link :href="route(`${is_admin ? 'admin':'user'}.index`)" class="logo logo-light">
            <span class="logo-sm">
              <img src="@/assets/images/logo-sm.svg" alt="" height="24" />
            </span>
            <span class="logo-lg">
              <img src="@/assets/images/logo-sm.svg" alt="" height="24" />
              <span class="logo-txt">{{ appName }}</span>
            </span>
          </inertia-link>
        </div>

        <button
          type="button"
          class="btn btn-sm px-3 font-size-16 header-item"
          id="vertical-menu-btn"
          @click="toggleSidebar"
        >
          <i class="fa fa-fw fa-bars"></i>
        </button>

        <!-- App Search-->
        <form class="app-search d-none d-lg-block">
          <div class="position-relative">
            <input type="text" class="form-control" placeholder="Search..." />
            <button class="btn btn-primary" type="button">
              <i class="bx bx-search-alt align-middle"></i>
            </button>
          </div>
        </form>
      </div>

      <div class="d-flex align-content-center">

        <!-- <div class="dropdown">
          <button
            type="button"
            class="btn header-item"
            data-bs-toggle="dropdown"
            aria-haspopup="true"
            aria-expanded="false"
          >
            <img
              id="header-lang-img"
              :src="loadFlag(activeLocale.flag)"
              alt="Header Language"
              height="16"
            />
          </button>
          <div class="dropdown-menu dropdown-menu-end">
            <div
              href="javascript:void(0);"
              class="dropdown-item notify-item language cursor-pointer"
              data-lang="en"
              v-for="(lang, key) in locales"
              :key="key"
              @click="setLocale(lang)"
            >
              <img
                :src="loadFlag(lang.flag)"
                alt="user-image"
                class="me-1"
                height="12"
              />
              <span class="align-middle">{{lang.name}}</span>
            </div>
          </div>
        </div> -->
        <div style="margin: 5px;">
            <div id="google_translate_element"></div>
        </div>

        <div class="dropdown">
          <button
            type="button"
            class="btn header-item"
            id="mode-setting-btn"
            @click="toggleMode"
          >
            <i data-feather="moon" class="icon-lg dark"></i>
            <i data-feather="sun" class="icon-lg light"></i>
          </button>
        </div>

        <!-- <div class="dropdown d-inline-block">
          <button
            type="button"
            class="btn header-item noti-icon position-relative"
            id="page-header-notifications-dropdown"
            data-bs-toggle="dropdown"
            aria-haspopup="true"
            aria-expanded="false"
          >
            <i data-feather="bell" class="icon-lg"></i>
            <span class="badge bg-danger rounded-pill">5</span>
          </button>
          <div
            class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
            aria-labelledby="page-header-notifications-dropdown"
          >
            <div class="p-3">
              <div class="row align-items-center">
                <div class="col">
                  <h6 class="m-0">Notifications</h6>
                </div>
                <div class="col-auto">
                  <a
                    href="#!"
                    class="small text-reset text-decoration-underline"
                  >
                    Unread (3)</a
                  >
                </div>
              </div>
            </div>
            <div id="notification-items-wrapper">
              <a href="#!" class="text-reset notification-item">
                <div class="d-flex">
                  <div class="flex-shrink-0 me-3">
                    <img
                      src="@/assets/images/users/avatar-3.jpg"
                      class="rounded-circle avatar-sm"
                      alt="user-pic"
                    />
                  </div>
                  <div class="flex-grow-1">
                    <h6 class="mb-1">James Lemire</h6>
                    <div class="font-size-13 text-muted">
                      <p class="mb-1">It will seem like simplified English.</p>
                      <p class="mb-0">
                        <i class="mdi mdi-clock-outline"></i>
                        <span>1 hour ago</span>
                      </p>
                    </div>
                  </div>
                </div>
              </a>
              <a href="#!" class="text-reset notification-item">
                <div class="d-flex">
                  <div class="flex-shrink-0 avatar-sm me-3">
                    <span
                      class="
                        avatar-title
                        bg-primary
                        rounded-circle
                        font-size-16
                      "
                    >
                      <i class="bx bx-cart"></i>
                    </span>
                  </div>
                  <div class="flex-grow-1">
                    <h6 class="mb-1">Your order is placed</h6>
                    <div class="font-size-13 text-muted">
                      <p class="mb-1">
                        If several languages coalesce the grammar
                      </p>
                      <p class="mb-0">
                        <i class="mdi mdi-clock-outline"></i>
                        <span>3 min ago</span>
                      </p>
                    </div>
                  </div>
                </div>
              </a>
              <a href="#!" class="text-reset notification-item">
                <div class="d-flex">
                  <div class="flex-shrink-0 avatar-sm me-3">
                    <span
                      class="
                        avatar-title
                        bg-success
                        rounded-circle
                        font-size-16
                      "
                    >
                      <i class="bx bx-badge-check"></i>
                    </span>
                  </div>
                  <div class="flex-grow-1">
                    <h6 class="mb-1">Your item is shipped</h6>
                    <div class="font-size-13 text-muted">
                      <p class="mb-1">
                        If several languages coalesce the grammar
                      </p>
                      <p class="mb-0">
                        <i class="mdi mdi-clock-outline"></i>
                        <span>3 min ago</span>
                      </p>
                    </div>
                  </div>
                </div>
              </a>

              <a href="#!" class="text-reset notification-item">
                <div class="d-flex">
                  <div class="flex-shrink-0 me-3">
                    <img
                      src="@/assets/images/users/avatar-6.jpg"
                      class="rounded-circle avatar-sm"
                      alt="user-pic"
                    />
                  </div>
                  <div class="flex-grow-1">
                    <h6 class="mb-1">Salena Layfield</h6>
                    <div class="font-size-13 text-muted">
                      <p class="mb-1">
                        As a skeptical Cambridge friend of mine occidental.
                      </p>
                      <p class="mb-0">
                        <i class="mdi mdi-clock-outline"></i>
                        <span>1 hour ago</span>
                      </p>
                    </div>
                  </div>
                </div>
              </a>
            </div>
            <div class="p-2 border-top d-grid">
              <a
                class="btn btn-sm btn-link font-size-14 text-center"
                href="javascript:void(0)"
              >
                <i class="mdi mdi-arrow-right-circle me-1"></i>
                <span>View More..</span>
              </a>
            </div>
          </div>
        </div> -->


        <div class="dropdown d-inline-block">
          <button
            type="button"
            class="btn header-item bg-soft-light border-start border-end"
            id="page-header-user-dropdown"
            data-bs-toggle="dropdown"
            aria-haspopup="true"
            aria-expanded="false"
          >
            <img
              class="rounded-circle header-profile-user mr-1"
              :src="profile_picture(user.image)"
            />
            <!-- <span class="d-none d-xl-inline-block ms-1 fw-medium"
              >Shawn L.</span
            > -->
            <i class="mdi mdi-chevron-down d-inline-block"></i>
          </button>
          <div class="dropdown-menu dropdown-menu-end">
            <inertia-link v-if="!is_admin" class="dropdown-item" :href="route('user.profile.view')"
              ><i
                class="mdi mdi-user font-size-16 align-middle me-1"
              ></i>
              Profile
            </inertia-link>
            <inertia-link as="button" method="post" v-if="$page.props.admin_id" class="dropdown-item" :href="route('switch-to-admin',$page.props.admin_id)">
            <i class="mdi mdi-user font-size-16 align-middle me-1"></i>
              Switch to Admin
            </inertia-link>
            <div class="dropdown-divider"></div>
            <inertia-link method="post" as="button" class="dropdown-item" :href="route('logout')" replace>
                <i class="mdi mdi-logout font-size-16 align-middle me-1"></i>
              Logout
              </inertia-link>
          </div>
        </div>
      </div>
    </div>
  </header>
</template>

<script setup>
  import { ref, onMounted, watch, computed } from 'vue';
  import feather from 'feather-icons';
  import { useTheme } from '@/stores/theme';
import { usePage } from '@inertiajs/inertia-vue3';
import { profile_picture } from '@/js/functions';
import { Inertia } from '@inertiajs/inertia';
import route from 'ziggy-js';

 
const user = computed(() => usePage().props.value.auth.user);
const is_admin = user.value.is_admin;

const locales = ref([
    {
        name: 'English',
        short_name: 'en',
        flag: 'us.jpg',
    },
    {
        name: 'Spanish',
        short_name: 'es',
        flag: 'spain.jpg',
    },
    {
        name: 'German',
        short_name: 'de',
        flag: 'germany.jpg',
    },
    {
        name: 'Italian',
        short_name: 'it',
        flag: 'italy.jpg',
    },
]);

const loadFlag = flag => {
    return `/storage/flags/${ flag }`;
}

const locale = computed(() => usePage().props.value.app.locale);

const activeLocale = computed(() => locales.value.filter(loc => loc.short_name == locale.value)[0]);

const setLocale = locale => Inertia.post(route('set-locale', locale.short_name ));



  const theme = useTheme();

  const appName = import.meta.env.VITE_APP_NAME;

  const toggleMode = theme.toggleTheme;

  onMounted((_) => {
    theme.initTheme();
    feather.replace();
  });

  const toggleSidebar = (_) => {
    var body = document.body;
    var e = body.getAttribute('data-sidebar-size');
    body.classList.toggle('sidebar-enable');
    if (992 <= window.innerWidth) {
      if (null == e || e == 'lg') {
        body.setAttribute('data-sidebar-size', (e = 'sm'));
      } else {
        body.setAttribute('data-sidebar-size', (e = 'lg'));
      }
      localStorage.setItem('sidebar-size', e);
    }
  };
</script>

<style>
  #notification-items-wrapper {
    max-height: 250px;
    overflow-y: scroll;
  }
</style>
