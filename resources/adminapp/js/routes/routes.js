import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

const View = { template: '<router-view></router-view>' }

const routes = [
  {
    path: '/',
    component: () => import('@pages/Layout/DashboardLayout.vue'),
    redirect: 'dashboard',
    children: [
      {
        path: 'dashboard',
        name: 'dashboard',
        component: () => import('@pages/Dashboard.vue'),
        meta: { title: 'global.dashboard' }
      },
      {
        path: 'user-management',
        name: 'user_management',
        component: View,
        redirect: { name: 'permissions.index' },
        children: [
          {
            path: 'permissions',
            name: 'permissions.index',
            component: () => import('@cruds/Permissions/Index.vue'),
            meta: { title: 'cruds.permission.title' }
          },
          {
            path: 'permissions/create',
            name: 'permissions.create',
            component: () => import('@cruds/Permissions/Create.vue'),
            meta: { title: 'cruds.permission.title' }
          },
          {
            path: 'permissions/:id',
            name: 'permissions.show',
            component: () => import('@cruds/Permissions/Show.vue'),
            meta: { title: 'cruds.permission.title' }
          },
          {
            path: 'permissions/:id/edit',
            name: 'permissions.edit',
            component: () => import('@cruds/Permissions/Edit.vue'),
            meta: { title: 'cruds.permission.title' }
          },
          {
            path: 'roles',
            name: 'roles.index',
            component: () => import('@cruds/Roles/Index.vue'),
            meta: { title: 'cruds.role.title' }
          },
          {
            path: 'roles/create',
            name: 'roles.create',
            component: () => import('@cruds/Roles/Create.vue'),
            meta: { title: 'cruds.role.title' }
          },
          {
            path: 'roles/:id',
            name: 'roles.show',
            component: () => import('@cruds/Roles/Show.vue'),
            meta: { title: 'cruds.role.title' }
          },
          {
            path: 'roles/:id/edit',
            name: 'roles.edit',
            component: () => import('@cruds/Roles/Edit.vue'),
            meta: { title: 'cruds.role.title' }
          },
          {
            path: 'users',
            name: 'users.index',
            component: () => import('@cruds/Users/Index.vue'),
            meta: { title: 'cruds.user.title' }
          },
          {
            path: 'users/create',
            name: 'users.create',
            component: () => import('@cruds/Users/Create.vue'),
            meta: { title: 'cruds.user.title' }
          },
          {
            path: 'users/:id',
            name: 'users.show',
            component: () => import('@cruds/Users/Show.vue'),
            meta: { title: 'cruds.user.title' }
          },
          {
            path: 'users/:id/edit',
            name: 'users.edit',
            component: () => import('@cruds/Users/Edit.vue'),
            meta: { title: 'cruds.user.title' }
          }
        ]
      },
      {
        path: 'products',
        name: 'products.index',
        component: () => import('@cruds/Products/Index.vue'),
        meta: { title: 'cruds.product.title' }
      },
      {
        path: 'products/create',
        name: 'products.create',
        component: () => import('@cruds/Products/Create.vue'),
        meta: { title: 'cruds.product.title' }
      },
      {
        path: 'products/:id',
        name: 'products.show',
        component: () => import('@cruds/Products/Show.vue'),
        meta: { title: 'cruds.product.title' }
      },
      {
        path: 'products/:id/edit',
        name: 'products.edit',
        component: () => import('@cruds/Products/Edit.vue'),
        meta: { title: 'cruds.product.title' }
      },
      {
        path: 'taxonomies',
        name: 'taxonomies.index',
        component: () => import('@cruds/Taxonomies/Index.vue'),
        meta: { title: 'cruds.taxonomy.title' }
      },
      {
        path: 'taxonomies/create',
        name: 'taxonomies.create',
        component: () => import('@cruds/Taxonomies/Create.vue'),
        meta: { title: 'cruds.taxonomy.title' }
      },
      {
        path: 'taxonomies/:id',
        name: 'taxonomies.show',
        component: () => import('@cruds/Taxonomies/Show.vue'),
        meta: { title: 'cruds.taxonomy.title' }
      },
      {
        path: 'taxonomies/:id/edit',
        name: 'taxonomies.edit',
        component: () => import('@cruds/Taxonomies/Edit.vue'),
        meta: { title: 'cruds.taxonomy.title' }
      },
      {
        path: 'fields-setup',
        name: 'fields_setup',
        component: View,
        redirect: { name: 'fields.index' },
        children: [
          {
            path: 'fields',
            name: 'fields.index',
            component: () => import('@cruds/Fields/Index.vue'),
            meta: { title: 'cruds.field.title' }
          },
          {
            path: 'fields/create',
            name: 'fields.create',
            component: () => import('@cruds/Fields/Create.vue'),
            meta: { title: 'cruds.field.title' }
          },
          {
            path: 'fields/:id',
            name: 'fields.show',
            component: () => import('@cruds/Fields/Show.vue'),
            meta: { title: 'cruds.field.title' }
          },
          {
            path: 'fields/:id/edit',
            name: 'fields.edit',
            component: () => import('@cruds/Fields/Edit.vue'),
            meta: { title: 'cruds.field.title' }
          },
          {
            path: 'fields-datas',
            name: 'fields_datas.index',
            component: () => import('@cruds/FieldsDatas/Index.vue'),
            meta: { title: 'cruds.fieldsData.title' }
          },
          {
            path: 'fields-datas/create',
            name: 'fields_datas.create',
            component: () => import('@cruds/FieldsDatas/Create.vue'),
            meta: { title: 'cruds.fieldsData.title' }
          },
          {
            path: 'fields-datas/:id',
            name: 'fields_datas.show',
            component: () => import('@cruds/FieldsDatas/Show.vue'),
            meta: { title: 'cruds.fieldsData.title' }
          },
          {
            path: 'fields-datas/:id/edit',
            name: 'fields_datas.edit',
            component: () => import('@cruds/FieldsDatas/Edit.vue'),
            meta: { title: 'cruds.fieldsData.title' }
          },
          {
            path: 'fields-groups',
            name: 'fields_groups.index',
            component: () => import('@cruds/FieldsGroups/Index.vue'),
            meta: { title: 'cruds.fieldsGroup.title' }
          },
          {
            path: 'fields-groups/create',
            name: 'fields_groups.create',
            component: () => import('@cruds/FieldsGroups/Create.vue'),
            meta: { title: 'cruds.fieldsGroup.title' }
          },
          {
            path: 'fields-groups/:id',
            name: 'fields_groups.show',
            component: () => import('@cruds/FieldsGroups/Show.vue'),
            meta: { title: 'cruds.fieldsGroup.title' }
          },
          {
            path: 'fields-groups/:id/edit',
            name: 'fields_groups.edit',
            component: () => import('@cruds/FieldsGroups/Edit.vue'),
            meta: { title: 'cruds.fieldsGroup.title' }
          }
        ]
      },
      {
        path: 'values-setup',
        name: 'values_setup',
        component: View,
        redirect: { name: 'brands.index' },
        children: [
          {
            path: 'brands',
            name: 'brands.index',
            component: () => import('@cruds/Brands/Index.vue'),
            meta: { title: 'cruds.brand.title' }
          },
          {
            path: 'brands/create',
            name: 'brands.create',
            component: () => import('@cruds/Brands/Create.vue'),
            meta: { title: 'cruds.brand.title' }
          },
          {
            path: 'brands/:id',
            name: 'brands.show',
            component: () => import('@cruds/Brands/Show.vue'),
            meta: { title: 'cruds.brand.title' }
          },
          {
            path: 'brands/:id/edit',
            name: 'brands.edit',
            component: () => import('@cruds/Brands/Edit.vue'),
            meta: { title: 'cruds.brand.title' }
          },
          {
            path: 'colors',
            name: 'colors.index',
            component: () => import('@cruds/Colors/Index.vue'),
            meta: { title: 'cruds.color.title' }
          },
          {
            path: 'colors/create',
            name: 'colors.create',
            component: () => import('@cruds/Colors/Create.vue'),
            meta: { title: 'cruds.color.title' }
          },
          {
            path: 'colors/:id',
            name: 'colors.show',
            component: () => import('@cruds/Colors/Show.vue'),
            meta: { title: 'cruds.color.title' }
          },
          {
            path: 'colors/:id/edit',
            name: 'colors.edit',
            component: () => import('@cruds/Colors/Edit.vue'),
            meta: { title: 'cruds.color.title' }
          },
          {
            path: 'foods',
            name: 'foods.index',
            component: () => import('@cruds/Foods/Index.vue'),
            meta: { title: 'cruds.food.title' }
          },
          {
            path: 'foods/create',
            name: 'foods.create',
            component: () => import('@cruds/Foods/Create.vue'),
            meta: { title: 'cruds.food.title' }
          },
          {
            path: 'foods/:id',
            name: 'foods.show',
            component: () => import('@cruds/Foods/Show.vue'),
            meta: { title: 'cruds.food.title' }
          },
          {
            path: 'foods/:id/edit',
            name: 'foods.edit',
            component: () => import('@cruds/Foods/Edit.vue'),
            meta: { title: 'cruds.food.title' }
          },
          {
            path: 'grapes',
            name: 'grapes.index',
            component: () => import('@cruds/Grapes/Index.vue'),
            meta: { title: 'cruds.grape.title' }
          },
          {
            path: 'grapes/create',
            name: 'grapes.create',
            component: () => import('@cruds/Grapes/Create.vue'),
            meta: { title: 'cruds.grape.title' }
          },
          {
            path: 'grapes/:id',
            name: 'grapes.show',
            component: () => import('@cruds/Grapes/Show.vue'),
            meta: { title: 'cruds.grape.title' }
          },
          {
            path: 'grapes/:id/edit',
            name: 'grapes.edit',
            component: () => import('@cruds/Grapes/Edit.vue'),
            meta: { title: 'cruds.grape.title' }
          },
          {
            path: 'winemakers',
            name: 'winemakers.index',
            component: () => import('@cruds/Winemakers/Index.vue'),
            meta: { title: 'cruds.winemaker.title' }
          },
          {
            path: 'winemakers/create',
            name: 'winemakers.create',
            component: () => import('@cruds/Winemakers/Create.vue'),
            meta: { title: 'cruds.winemaker.title' }
          },
          {
            path: 'winemakers/:id',
            name: 'winemakers.show',
            component: () => import('@cruds/Winemakers/Show.vue'),
            meta: { title: 'cruds.winemaker.title' }
          },
          {
            path: 'winemakers/:id/edit',
            name: 'winemakers.edit',
            component: () => import('@cruds/Winemakers/Edit.vue'),
            meta: { title: 'cruds.winemaker.title' }
          },
          {
            path: 'countries',
            name: 'countries.index',
            component: () => import('@cruds/Countries/Index.vue'),
            meta: { title: 'cruds.country.title' }
          },
          {
            path: 'countries/create',
            name: 'countries.create',
            component: () => import('@cruds/Countries/Create.vue'),
            meta: { title: 'cruds.country.title' }
          },
          {
            path: 'countries/:id',
            name: 'countries.show',
            component: () => import('@cruds/Countries/Show.vue'),
            meta: { title: 'cruds.country.title' }
          },
          {
            path: 'countries/:id/edit',
            name: 'countries.edit',
            component: () => import('@cruds/Countries/Edit.vue'),
            meta: { title: 'cruds.country.title' }
          },
          {
            path: 'regions',
            name: 'regions.index',
            component: () => import('@cruds/Regions/Index.vue'),
            meta: { title: 'cruds.region.title' }
          },
          {
            path: 'regions/create',
            name: 'regions.create',
            component: () => import('@cruds/Regions/Create.vue'),
            meta: { title: 'cruds.region.title' }
          },
          {
            path: 'regions/:id',
            name: 'regions.show',
            component: () => import('@cruds/Regions/Show.vue'),
            meta: { title: 'cruds.region.title' }
          },
          {
            path: 'regions/:id/edit',
            name: 'regions.edit',
            component: () => import('@cruds/Regions/Edit.vue'),
            meta: { title: 'cruds.region.title' }
          },
          {
            path: 'producers',
            name: 'producers.index',
            component: () => import('@cruds/Producers/Index.vue'),
            meta: { title: 'cruds.producer.title' }
          },
          {
            path: 'producers/create',
            name: 'producers.create',
            component: () => import('@cruds/Producers/Create.vue'),
            meta: { title: 'cruds.producer.title' }
          },
          {
            path: 'producers/:id',
            name: 'producers.show',
            component: () => import('@cruds/Producers/Show.vue'),
            meta: { title: 'cruds.producer.title' }
          },
          {
            path: 'producers/:id/edit',
            name: 'producers.edit',
            component: () => import('@cruds/Producers/Edit.vue'),
            meta: { title: 'cruds.producer.title' }
          }
        ]
      }
    ]
  }
]

export default new VueRouter({
  mode: 'history',
  base: '/admin',
  routes
})
