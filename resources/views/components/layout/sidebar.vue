<template>
  <!-- ========== Left Sidebar Start ========== -->
  <div class="vertical-menu">
    <div data-simplebar class="h-100">
      <!--- Sidemenu -->
      <div id="sidebar-menu">
        <!-- Left Menu Start -->
        <ul class="metismenu list-unstyled" id="side-menu">
          <li class="menu-title">Menu</li>
          <SidebarItem
            name="Dashboard"
            :url="route(`${is_admin ? 'admin' : 'user'}.index`)"
            icon="layers"
          />
          <SidebarItem
            name="Users"
            :url="route('admin.users.index')"
            icon="users"
            v-if="is_admin"
          />
          <SidebarItem
            name="KYC verification"
            :url="route('admin.kyc.index')"
            icon="user-x"
            v-if="is_admin"
          />
          <SidebarItem
            name="Product Categories"
            :url="route('admin.categories.index')"
            icon="folder-minus"
            v-if="is_admin"
          />
          <SidebarItem
            name="Product"
            :url="route('admin.products.index')"
            icon="archive"
            v-if="is_admin"
          />
          <SidebarItem
            name="Product Tags"
            :url="route('admin.tags.index')"
            icon="tag"
            v-if="is_admin"
          />
          
          <!-- <li class="menu-title">Trading</li>
          <SidebarItem
            name="Trades History"
            :url="route(`${is_admin ? 'admin' : 'user'}.trades.index`)"
            icon="table"
          /> -->
          <SidebarItem
            name="My Orders"
            :url="route('user.trades.view')"
            icon="archive"
            v-if="!is_admin"
          />
          <SidebarItem
            name="My WishList"
            :url="route('user.wishlist.index')"
            icon="heart"
            v-if="!is_admin"
          />
          <!-- <SidebarItem
            name="My Orders"
            :url="route(`${is_admin ? 'admin' : 'user'}.bots.index`)"
            icon="cpu"
          />  -->
          <li class="menu-title">Transactions</li>
          <SidebarItem
            :name="`${is_admin ? 'All Crypto Deposits' : 'My Crypto Deposits'}`"
            :url="route(`${is_admin ? 'admin' : 'user'}.deposits.index`)"
            icon="credit-card"
          />
         
          <li class="menu-title" v-if="is_admin">Communication</li>
          <SidebarItem
            name="Send Email"
            :url="route('admin.mail.index')"
            icon="mail"
            v-if="is_admin"
          />
          <li class="menu-title">Settings</li>

          <SidebarItem
            name="My Profile"
            :url="route('user.profile.view')"
            icon="user"
            v-if="!is_admin"
          />
          <SidebarItem
            name="Password reset"
            :url="route('password.change')"
            icon="lock"
          />
          
          <SidebarItem
            name="Payment Methods"
            :url="route('admin.payment-method.index')"
            icon="plus-square"
            v-if="is_admin"
          />
         
          <hr />
          <SidebarItem
            name="Logout"
            method="post"
            :url="route('logout')"
            icon="power"
          />
          <SidebarItem
            name="Home"
            :url="route('front.index')"
            icon="home"
            :raw="true"
          />
        </ul>
      </div>
      <!-- Sidebar -->
    </div>
  </div>
  <!-- Left Sidebar End -->
</template>

<script setup>
  import { computed, onMounted } from 'vue';
  import feather from 'feather-icons';
  import MetisMenu from 'metismenujs';
  import SidebarItem from './sidebarItem.vue';
  import { usePage } from '@inertiajs/inertia-vue3';

const is_admin = computed(() => usePage().props.value.auth.user.is_admin == 1);

const botsMenu = computed(() => is_admin == true ? 'Trade Bots' : 'Trade Bot');
const stakes = computed(() => is_admin == true ? 'All Stakes' : 'My Stakes');

  onMounted((_) => {
    new MetisMenu('#side-menu');
    feather.replace();
  });
</script>

<style>
</style>
