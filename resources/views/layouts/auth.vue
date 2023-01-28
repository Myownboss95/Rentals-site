<template>
  <div class="auth-page"> 
    <div class="container-fluid p-0">
      <div class="row g-0">
        <div class="col-xxl-4 col-lg-4 col-md-6">
          <div class="auth-full-page-content d-flex p-sm-5 p-4">
            <div class="w-100">
              <div class="d-flex flex-column h-100">
                <div class="mb-4 mb-md-5 text-center">
                  <a href="/" class="d-block auth-logo">
                    <img src="@/assets/images/black-logo.png" alt="" height="28" />
                    <!-- <span class="logo-txt">{{ $appName }}</span> -->
                  </a>
                </div>
                <div class="auth-content my-auto">
                  <!-- Auth content -->
                  <slot />

                  <div class="text-center pt-5">
                    <div @click="toggleTheme" class="cursor-pointer">
                      <i data-feather="moon" class="icon-lg dark"></i>
                      <i data-feather="sun" class="icon-lg light"></i>
                    </div>
                  </div>
                </div>

                <div class="mt-4 mt-md-5 text-center">
                  <p class="mb-0">
                    ©
                    {{ new Date().getFullYear() }}
                    {{ $appName }}
                  </p>
                </div>
              </div>
            </div>
          </div>
          <!-- end auth full page content -->
        </div>
        <!-- end col -->
        <div class="col-xxl-8 col-lg-8 col-md-6">
          <div class="auth-bg pt-md-5 p-4 d-flex">
            <div class="bg-overlay bg-primary"></div>
            <ul class="bg-bubbles">
              <li></li>
              <li></li>
              <li></li>
              <li></li>
              <li></li>
              <li></li>
              <li></li>
              <li></li>
              <li></li>
              <li></li>
            </ul>
            <!-- end bubble effect -->
            <div class="row justify-content-center align-items-center">
              <div class="col-xl-7">
                <div class="p-0 p-sm-4 px-xl-0">
                  <div
                    id="reviewcarouselIndicators"
                    class="carousel slide"
                    data-bs-ride="carousel"
                  >
                    <div
                      class="
                        carousel-indicators carousel-indicators-rounded
                        justify-content-start
                        ms-0
                        mb-0
                      "
                    >
                      <button
                        type="button"
                        data-bs-target="#reviewcarouselIndicators"
                        data-bs-slide-to="0"
                        class="active"
                        aria-current="true"
                        aria-label="Slide 1"
                      ></button>
                      <button
                        type="button"
                        data-bs-target="#reviewcarouselIndicators"
                        data-bs-slide-to="1"
                        aria-label="Slide 2"
                      ></button>
                      <button
                        type="button"
                        data-bs-target="#reviewcarouselIndicators"
                        data-bs-slide-to="2"
                        aria-label="Slide 3"
                      ></button>
                    </div>
                    <!-- end carouselIndicators -->
                    <div class="carousel-inner">
                      <div class="carousel-item active" data-bs-interval="3000">
                        <div class="testi-contain text-white">
                          <i
                            class="bx bxs-quote-alt-left text-success display-6"
                          ></i>

                          <h4 class="mt-4 fw-medium lh-base text-white">
                            “Finding {{$appName}} was the best thing which could
                            have happened to me as business man and I'm happy it's easy to rent stuff here”
                          </h4>
                          <div class="mt-4 pt-3 pb-5">
                            <div class="d-flex align-items-start">
                              <div class="flex-shrink-0">
                                <img
                                  src="@/assets/images/users/avatar-1.jpg"
                                  class="avatar-md img-fluid rounded-circle"
                                  alt="..."
                                />
                              </div>
                              <div class="flex-grow-1 ms-3 mb-4">
                                <h5 class="font-size-18 text-white">
                                  Richard Drews
                                </h5>
                                <p class="mb-0 text-white-50">Professional Trader</p>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="carousel-item" data-bs-interval="3000">
                        <div class="testi-contain text-white">
                          <i
                            class="bx bxs-quote-alt-left text-success display-6"
                          ></i>

                          <h4 class="mt-4 fw-medium lh-base text-white">
                            “Finding {{$appName}} was the best thing which could
                            have happened to me as business man and I'm happy it's easy to rent stuff here.”
                          </h4>
                          <div class="mt-4 pt-3 pb-5">
                            <div class="d-flex align-items-start">
                              <div class="flex-shrink-0">
                                <img
                                  src="@/assets/images/users/avatar-2.jpg"
                                  class="avatar-md img-fluid rounded-circle"
                                  alt="..."
                                />
                              </div>
                              <div class="flex-grow-1 ms-3 mb-4">
                                <h5 class="font-size-18 text-white">
                                  Rosanna French
                                </h5>
                                <p class="mb-0 text-white-50">Banking Analyst</p>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="carousel-item" data-bs-interval="3000">
                        <div class="testi-contain text-white">
                          <i
                            class="bx bxs-quote-alt-left text-success display-6"
                          ></i>

                          <h4 class="mt-4 fw-medium lh-base text-white">
                            “Finding {{$appName}} was the best thing which could
                            have happened to me as business man and I'm happy it's easy to rent stuff here.”
                          </h4>
                          <div class="mt-4 pt-3 pb-5">
                            <div class="d-flex align-items-start">
                              <img
                                src="@/assets/images/users/avatar-3.jpg"
                                class="avatar-md img-fluid rounded-circle"
                                alt="..."
                              />
                              <div class="flex-1 ms-3 mb-4">
                                <h5 class="font-size-18 text-white">
                                  Ilse R. Eaton
                                </h5>
                                <p class="mb-0 text-white-50">Financial Analyst</p>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- end carousel-inner -->
                  </div>
                  <!-- end review carousel -->
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- end col -->
      </div>
      <!-- end row -->
    </div>
    <!-- end container fluid -->
  </div>
</template>

<script setup>
  import { onMounted, watch } from 'vue';
  import feather from 'feather-icons';
  import { useTheme } from '@/stores/theme';
  import { error, success } from '@/js/toast';

  const theme = useTheme();

  const toggleTheme = theme.toggleTheme;

  const props = defineProps(['errors']);
  watch(
    () => props.errors,
    (errors) => {
      if ('error' in errors) {
        error(errors.error);
        delete errors.error;
      }
    }
  );

  onMounted(() => {
    theme.initTheme();
    feather.replace();
  });
</script>

<style></style>
