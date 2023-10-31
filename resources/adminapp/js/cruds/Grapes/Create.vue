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
                <strong>{{ $t('cruds.grape.title_singular') }}</strong>
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
                      'has-items': entry.grapes,
                      'is-focused': activeField == 'grapes'
                    }"
                  >
                    <label class="bmd-label-floating required">{{
                      $t('cruds.grape.fields.grapes')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.grapes"
                      @input="updateGrapes"
                      @focus="focusField('grapes')"
                      @blur="clearFocus"
                      required
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.synonyms,
                      'is-focused': activeField == 'synonyms'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.grape.fields.synonyms')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.synonyms"
                      @input="updateSynonyms"
                      @focus="focusField('synonyms')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.color,
                      'is-focused': activeField == 'color'
                    }"
                  >
                    <label class="bmd-label-floating required">{{
                      $t('cruds.grape.fields.color')
                    }}</label>
                    <v-select
                      name="color"
                      :key="'color-field'"
                      :value="entry.color"
                      :options="lists.color"
                      :reduce="entry => entry.value"
                      @input="updateColor"
                      @search.focus="focusField('color')"
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
    ...mapGetters('GrapesSingle', ['entry', 'loading', 'lists'])
  },
  mounted() {
    this.fetchCreateData()
  },
  beforeDestroy() {
    this.resetState()
  },
  methods: {
    ...mapActions('GrapesSingle', [
      'storeData',
      'resetState',
      'setGrapes',
      'setSynonyms',
      'setColor',
      'fetchCreateData'
    ]),
    updateGrapes(e) {
      this.setGrapes(e.target.value)
    },
    updateSynonyms(e) {
      this.setSynonyms(e.target.value)
    },
    updateColor(value) {
      this.setColor(value)
    },
    submitForm() {
      this.storeData()
        .then(() => {
          this.$router.push({ name: 'grapes.index' })
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
