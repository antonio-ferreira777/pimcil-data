<template>
  <div class="wrapper" :class="{ 'nav-open': $sidebar.showSidebar }">
    <event-hub></event-hub>
    <side-bar :sidebarLinks="sidebarLinks">
      <mobile-menu slot="content"></mobile-menu>
    </side-bar>

    <div class="main-panel">
      <top-navbar></top-navbar>
      <div class="content">
        <dashboard-content></dashboard-content>
      </div>
    </div>
  </div>
</template>

<script>
import DashboardContent from './Content.vue'
import TopNavbar from './TopNavbar.vue'
import MobileMenu from './MobileMenu.vue'

export default {
  components: {
    DashboardContent,
    TopNavbar,
    MobileMenu
  },
  data() {
    return {
      sidebarLinks: [
        {
          title: 'global.dashboard',
          icon: 'dashboard',
          path: { name: 'dashboard' }
        },
        {
          title: 'cruds.userManagement.title',
          icon: 'person',
          path: { name: 'user_management' },
          gate: 'user_management_access',
          children: [
            {
              title: 'cruds.permission.title',
              icon: 'perm_data_setting',
              path: { name: 'permissions.index' },
              gate: 'permission_access'
            },
            {
              title: 'cruds.role.title',
              icon: 'group',
              path: { name: 'roles.index' },
              gate: 'role_access'
            },
            {
              title: 'cruds.user.title',
              icon: 'person',
              path: { name: 'users.index' },
              gate: 'user_access'
            }
          ]
        },
        {
          title: 'cruds.product.title',
          icon: 'table_view',
          path: { name: 'products.index' },
          gate: 'product_access'
        },
        {
          title: 'cruds.taxonomy.title',
          icon: 'table_view',
          path: { name: 'taxonomies.index' },
          gate: 'taxonomy_access'
        },
        {
          title: 'cruds.fieldsSetup.title',
          icon: 'table_view',
          path: { name: 'fields_setup' },
          gate: 'fields_setup_access',
          children: [
            {
              title: 'cruds.field.title',
              icon: 'table_view',
              path: { name: 'fields.index' },
              gate: 'field_access'
            },
            {
              title: 'cruds.fieldsData.title',
              icon: 'table_view',
              path: { name: 'fields_datas.index' },
              gate: 'fields_data_access'
            },
            {
              title: 'cruds.fieldsGroup.title',
              icon: 'table_view',
              path: { name: 'fields_groups.index' },
              gate: 'fields_group_access'
            }
          ]
        },
        {
          title: 'cruds.valuesSetup.title',
          icon: 'table_view',
          path: { name: 'values_setup' },
          gate: 'values_setup_access',
          children: [
            {
              title: 'cruds.brand.title',
              icon: 'table_view',
              path: { name: 'brands.index' },
              gate: 'brand_access'
            },
            {
              title: 'cruds.color.title',
              icon: 'table_view',
              path: { name: 'colors.index' },
              gate: 'color_access'
            },
            {
              title: 'cruds.food.title',
              icon: 'table_view',
              path: { name: 'foods.index' },
              gate: 'food_access'
            },
            {
              title: 'cruds.grape.title',
              icon: 'table_view',
              path: { name: 'grapes.index' },
              gate: 'grape_access'
            },
            {
              title: 'cruds.winemaker.title',
              icon: 'table_view',
              path: { name: 'winemakers.index' },
              gate: 'winemaker_access'
            },
            {
              title: 'cruds.country.title',
              icon: 'table_view',
              path: { name: 'countries.index' },
              gate: 'country_access'
            },
            {
              title: 'cruds.region.title',
              icon: 'table_view',
              path: { name: 'regions.index' },
              gate: 'region_access'
            },
            {
              title: 'cruds.producer.title',
              icon: 'table_view',
              path: { name: 'producers.index' },
              gate: 'producer_access'
            }
          ]
        }
      ]
    }
  }
}
</script>
