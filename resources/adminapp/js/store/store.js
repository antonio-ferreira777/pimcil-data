import Vue from 'vue'
import Vuex from 'vuex'

import Alert from './modules/alert'
import I18NStore from './modules/i18n'

import PermissionsIndex from './cruds/Permissions'
import PermissionsSingle from './cruds/Permissions/single'
import RolesIndex from './cruds/Roles'
import RolesSingle from './cruds/Roles/single'
import UsersIndex from './cruds/Users'
import UsersSingle from './cruds/Users/single'
import ProductsIndex from './cruds/Products'
import ProductsSingle from './cruds/Products/single'
import BrandsIndex from './cruds/Brands'
import BrandsSingle from './cruds/Brands/single'
import ColorsIndex from './cruds/Colors'
import ColorsSingle from './cruds/Colors/single'
import CountriesIndex from './cruds/Countries'
import CountriesSingle from './cruds/Countries/single'
import FoodsIndex from './cruds/Foods'
import FoodsSingle from './cruds/Foods/single'
import GrapesIndex from './cruds/Grapes'
import GrapesSingle from './cruds/Grapes/single'
import RegionsIndex from './cruds/Regions'
import RegionsSingle from './cruds/Regions/single'
import TaxonomiesIndex from './cruds/Taxonomies'
import TaxonomiesSingle from './cruds/Taxonomies/single'
import WinemakersIndex from './cruds/Winemakers'
import WinemakersSingle from './cruds/Winemakers/single'
import FieldsIndex from './cruds/Fields'
import FieldsSingle from './cruds/Fields/single'
import FieldsDatasIndex from './cruds/FieldsDatas'
import FieldsDatasSingle from './cruds/FieldsDatas/single'
import FieldsGroupsIndex from './cruds/FieldsGroups'
import FieldsGroupsSingle from './cruds/FieldsGroups/single'
import ProducersIndex from './cruds/Producers'
import ProducersSingle from './cruds/Producers/single'

Vue.use(Vuex)

const debug = process.env.NODE_ENV !== 'production'

export default new Vuex.Store({
  modules: {
    Alert,
    I18NStore,
    PermissionsIndex,
    PermissionsSingle,
    RolesIndex,
    RolesSingle,
    UsersIndex,
    UsersSingle,
    ProductsIndex,
    ProductsSingle,
    BrandsIndex,
    BrandsSingle,
    ColorsIndex,
    ColorsSingle,
    CountriesIndex,
    CountriesSingle,
    FoodsIndex,
    FoodsSingle,
    GrapesIndex,
    GrapesSingle,
    RegionsIndex,
    RegionsSingle,
    TaxonomiesIndex,
    TaxonomiesSingle,
    WinemakersIndex,
    WinemakersSingle,
    FieldsIndex,
    FieldsSingle,
    FieldsDatasIndex,
    FieldsDatasSingle,
    FieldsGroupsIndex,
    FieldsGroupsSingle,
    ProducersIndex,
    ProducersSingle
  },
  strict: debug
})
