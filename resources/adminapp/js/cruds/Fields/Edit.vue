<template>
  <div class="container-fluid">
    <form @submit.prevent="submitForm">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header card-header-primary card-header-icon">
              <div class="card-icon">
                <i class="material-icons">edit</i>
              </div>
              <h4 class="card-title">
                {{ $t('global.edit') }}
                <strong>{{ $t('cruds.field.title_singular') }}</strong>
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
                      'has-items': entry.name,
                      'is-focused': activeField == 'name'
                    }"
                  >
                    <label class="bmd-label-floating required">{{
                      $t('cruds.field.fields.name')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.name"
                      @input="updateName"
                      @focus="focusField('name')"
                      @blur="clearFocus"
                      required
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.description,
                      'is-focused': activeField == 'description'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.field.fields.description')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.description"
                      @input="updateDescription"
                      @focus="focusField('description')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.type,
                      'is-focused': activeField == 'type'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.field.fields.type')
                    }}</label>
                    <v-select
                      name="type"
                      :key="'type-field'"
                      :value="entry.type"
                      :options="lists.type"
                      :reduce="entry => entry.value"
                      @input="updateType"
                      @search.focus="focusField('type')"
                      @search.blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.table_link,
                      'is-focused': activeField == 'table_link'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.field.fields.table_link')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.table_link"
                      @input="updateTableLink"
                      @focus="focusField('table_link')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div class="form-group form-check">
                    <label class="form-check-label"
                      ><input
                        class="form-check-input"
                        type="checkbox"
                        :value="entry.nullable"
                        :checked="entry.nullable"
                        @change="updateNullable"
                      /><span class="form-check-sign"
                        ><span class="check"></span></span
                      >{{ $t('cruds.field.fields.nullable') }}</label
                    >
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.field_group_id !== null,
                      'is-focused': activeField == 'field_group'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.field.fields.field_group')
                    }}</label>
                    <v-select
                      name="field_group"
                      label="name"
                      :key="'field_group-field'"
                      :value="entry.field_group_id"
                      :options="lists.field_group"
                      :reduce="entry => entry.id"
                      @input="updateFieldGroup"
                      @search.focus="focusField('field_group')"
                      @search.blur="clearFocus"
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
    ...mapGetters('FieldsSingle', ['entry', 'loading', 'lists'])
  },
  beforeDestroy() {
    this.resetState()
  },
  watch: {
    '$route.params.id': {
      immediate: true,
      handler() {
        this.resetState()
        this.fetchEditData(this.$route.params.id)
      }
    }
  },
  methods: {
    ...mapActions('FieldsSingle', [
      'fetchEditData',
      'updateData',
      'resetState',
      'setName',
      'setDescription',
      'setType',
      'setTableLink',
      'setNullable',
      'setFieldGroup'
    ]),
    updateName(e) {
      this.setName(e.target.value)
    },
    updateDescription(e) {
      this.setDescription(e.target.value)
    },
    updateType(value) {
      this.setType(value)
    },
    updateTableLink(e) {
      this.setTableLink(e.target.value)
    },
    updateNullable(e) {
      this.setNullable(e.target.checked)
    },
    updateFieldGroup(value) {
      this.setFieldGroup(value)
    },
    submitForm() {
      this.updateData()
        .then(() => {
          this.$router.push({ name: 'fields.index' })
          this.$eventHub.$emit('update-success')
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
