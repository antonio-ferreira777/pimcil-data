<template>
  <div class="container-fluid">
    <form @submit.prevent="submitForm">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header card-header-primary card-header-icon">
              <div class="card-icon">
                <i class="material-icons">add</i>
              </div>
              <h4 class="card-title">
                {{ $t('global.create') }}
                <strong>{{ $t('cruds.fieldsData.title_singular') }}</strong>
              </h4>
            </div>
            <div class="card-body">
              <back-button></back-button>
            </div>
            <div class="card-body">
              <bootstrap-alert />
              <div class="row">
                <div class="col-md-12">
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.product_id !== null,
                      'is-focused': activeField == 'product'
                    }"
                  >
                    <label class="bmd-label-floating required">{{
                      $t('cruds.fieldsData.fields.product')
                    }}</label>
                    <v-select
                      name="product"
                      label="ean"
                      :key="'product-field'"
                      :value="entry.product_id"
                      :options="lists.product"
                      :reduce="entry => entry.id"
                      @input="updateProduct"
                      @search.focus="focusField('product')"
                      @search.blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.field_id !== null,
                      'is-focused': activeField == 'field'
                    }"
                  >
                    <label class="bmd-label-floating required">{{
                      $t('cruds.fieldsData.fields.field')
                    }}</label>
                    <v-select
                      name="field"
                      label="name"
                      :key="'field-field'"
                      :value="entry.field_id"
                      :options="lists.field"
                      :reduce="entry => entry.id"
                      @input="updateField"
                      @search.focus="focusField('field')"
                      @search.blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.field_order,
                      'is-focused': activeField == 'field_order'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.fieldsData.fields.field_order')
                    }}</label>
                    <input
                      class="form-control"
                      type="number"
                      step="1"
                      :value="entry.field_order"
                      @input="updateFieldOrder"
                      @focus="focusField('field_order')"
                      @blur="clearFocus"
                    />
                  </div>
                </div>
              </div>
            </div>
            <div class="card-footer">
              <vue-button-spinner
                class="btn-primary"
                :status="status"
                :isLoading="loading"
                :disabled="loading"
              >
                {{ $t('global.save') }}
              </vue-button-spinner>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>
</template>

<script>
import { mapGetters, mapActions } from 'vuex'

export default {
  data() {
    return {
      status: '',
      activeField: ''
    }
  },
  computed: {
    ...mapGetters('FieldsDatasSingle', ['entry', 'loading', 'lists'])
  },
  mounted() {
    this.fetchCreateData()
  },
  beforeDestroy() {
    this.resetState()
  },
  methods: {
    ...mapActions('FieldsDatasSingle', [
      'storeData',
      'resetState',
      'setProduct',
      'setField',
      'setFieldOrder',
      'fetchCreateData'
    ]),
    updateProduct(value) {
      this.setProduct(value)
    },
    updateField(value) {
      this.setField(value)
    },
    updateFieldOrder(e) {
      this.setFieldOrder(e.target.value)
    },
    submitForm() {
      this.storeData()
        .then(() => {
          this.$router.push({ name: 'fields_datas.index' })
          this.$eventHub.$emit('create-success')
        })
        .catch(error => {
          this.status = 'failed'
          _.delay(() => {
            this.status = ''
          }, 3000)
        })
    },
    focusField(name) {
      this.activeField = name
    },
    clearFocus() {
      this.activeField = ''
    }
  }
}
</script>
