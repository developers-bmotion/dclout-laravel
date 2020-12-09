<template>
    <div>
        <h1>{{ $t('profile-clout.configuracion_profile_clout') }}</h1>
        <div class="row">
            <div class="col-12">
                <vs-collapse :accordion="true" type="margin" class="pb-5" style="padding: 0px !important;">
                    <vs-collapse-item :open="openTabInforPerson">
                        <div slot="header">
                            {{ $t('profile-clout.titlo_colapse_informacion_personal') }}
                        </div>

                        <div class="row p-2">
                            <div class="col-12 col-md-4 col-lg-4">
                                <input-form
                                    id="txtNames"
                                    :label="$t('register-aspirant.nombres')"
                                    pattern="alf"
                                    :errorMsg="$t('register-aspirant.error_name')"
                                    :requiredMsg="$t('register-aspirant.requerido_name')"
                                    :modelo.sync="user.name"
                                    :required="true"
                                    :value="user.name"

                                ></input-form>
                            </div>
                            <div class="col-12 col-md-4 col-lg-4">
                                <input-form
                                    id="txtLastName"
                                    :label="$t('register-aspirant.apellidos')"
                                    pattern="alf"
                                    :errorMsg="$t('register-aspirant.error_last_name')"
                                    :requiredMsg="$t('register-aspirant.requerido_last_name')"
                                    :modelo.sync="user.last_name"
                                    :required="true"
                                ></input-form>
                            </div>
                            <div class="col-12 col-md-4 col-lg-4">
                                <input-form
                                    id="txtEmail"
                                    :label="$t('register-aspirant.correo')"
                                    pattern="email"
                                    :errorMsg="$t('register-aspirant.error_email')"
                                    :requiredMsg="$t('register-aspirant.requerido_email')"
                                    :modelo.sync="user.email"
                                    :required="true"
                                ></input-form>
                            </div>
                            <div class="col-12 col-md-4 col-lg-4" v-if="showPhoneCodeCountry === false">
                                <input-form
                                    id="txtPhone"
                                    :label="$t('register-aspirant.telefono')"
                                    pattern="email"
                                    :modelo.sync="user.phone"
                                    :required="false"
                                    disabled
                                ></input-form>
                                <i @click="showEditPhone(true)" style="margin-top: -5rem;"
                                   class="float-right fas fa-pencil-alt"></i>
                            </div>
                            <div class="col-12 col-md-4 col-lg-4" style="top: -1.2rem;"
                                 v-if="showPhoneCodeCountry === true">
                                <label class="form-control-label label-selects">{{
                                        $t('register-aspirant.telefono')
                                    }}</label>
                                <VuePhoneNumberInput
                                    v-model="user.phoneSend"
                                    @update="user.phoneI=$event.formatInternational"
                                    :fetch-country="false"
                                    :translations="{
                                countrySelectorLabel: $t('register-aspirant.codigo_pais_telefono'),
                                countrySelectorError: $t('register-aspirant.seleccione_pais_telefono'),
                                phoneNumberLabel: $t('register-aspirant.numero_pais_telefono'),
                                example: $t('register-aspirant.ejemplo_telefono')
                            }"
                                />
                                <i @click="showEditPhone(false)" style="margin-top: -4rem;"
                                   class="float-right fas fa-times"></i>
                            </div>
                            <div class="col-12 col-md-4 col-lg-4" v-if="showSelectCountry === false">
                                <input-form
                                    id="txtCountry"
                                    :label="$t('profile-clout.pais_editar_perfil')"
                                    pattern="alf"
                                    :modelo.sync="country"
                                    :required="false"
                                    disabled
                                ></input-form>
                                <i @click="showEditCountry(true)" style="margin-top: -5rem;"
                                   class="float-right fas fa-pencil-alt"></i>
                            </div>
                            <div class="col-12 col-lg-4 col-md-4" v-show="showSelectCountry">
                                <input-form
                                    class="input-label-register"
                                    :label="$t('register-aspirant.selecciona_pais')"
                                    id="txtCountrySelect"
                                    errorMsg
                                    :requiredMsg="$t('register-aspirant.requerido_seleccionar_pais')"
                                    :required="true"
                                    :modelo.sync="user.valueCountry"
                                    type="multiselect"
                                    @updatedValue="getCloudCities"
                                    selectLabel="Busca tu país"
                                    :multiselect="{ options: optionsCountries,
                                          // selectLabel:$t('company.multiselect.select'),
                                          // selectedLabel:$t('company.multiselect.selected'),
                                          // deselectLabel:$t('company.multiselect.remove'),
                                          placeholder:$t('register-aspirant.selecciona_pais'),
                                          taggable : true,
                                          'track-by':'id',
                                          label: 'name',
                                          'custom-label': countries=>countries.name
                                        }"
                                ></input-form>
                                <i @click="showEditCountry(false)" style="margin-top: -5.5rem;"
                                   class="float-right fas fa-times"></i>
                            </div>

                            <div class="col-12 col-lg-4 col-md-4" v-if="showSelectCountry">
                                <input-form
                                    class="input-label-register"
                                    :label="$t('register-aspirant.selecciona_ciudad')"
                                    id="txtCity"
                                    errorMsg
                                    :requiredMsg="$t('register-aspirant.requerido_seleccionar_ciudad')"
                                    :required="true"
                                    :modelo.sync="user.valueCity"
                                    type="multiselect"
                                    selectLabel="Busca tu ciudad"
                                    :multiselect="{ options: optionsCities,
                                          // selectLabel:$t('company.multiselect.select'),
                                          // selectedLabel:$t('company.multiselect.selected'),
                                          // deselectLabel:$t('company.multiselect.remove'),
                                          placeholder:$t('register-aspirant.selecciona_ciudad'),
                                          taggable : true,
                                          'track-by':'id',
                                          label: 'name',
                                          'custom-label': countries=>countries.name
                                        }"

                                ></input-form>
                            </div>
                        </div>

                    </vs-collapse-item>
                    <vs-collapse-item>
                        <div slot="header">
                            {{ $t('register-aspirant.perfilacion') }}
                        </div>

                        <div class="row p-2">
                            <div class="col-12 col-md-6 col-lg-6" v-if="showCategoryClout === false">
                                <input-form
                                    id="txtCategory"
                                    :label="$t('profile-clout.categoria_relacionada')"
                                    pattern="alf"
                                    :modelo.sync="categoryClout"
                                    disabled=""
                                    :required="false"
                                ></input-form>
                                <i @click="showEditCategory(true)" style="margin-top: -5rem;"
                                   class="float-right fas fa-pencil-alt"></i>
                            </div>
                            <div class="col-12 col-lg-6 col-md-6 profiling" v-show="showCategoryClout">
                                <input-form
                                    :label="$t('register-aspirant.seleccionar_categoria_profiling')"
                                    id="txtCategoryProfiling"
                                    errorMsg
                                    :requiredMsg="$t('register-aspirant.requerido_selecc_categoria_perfilacion')"
                                    :required="true"
                                    :modelo.sync="profiling.categoryProfiling"
                                    type="multiselect"
                                    selectLabel="Busca tu categoría"
                                    :multiselect="{ options: optionsCategoryProfiling,
                                          // selectLabel:$t('company.multiselect.select'),
                                          // selectedLabel:$t('company.multiselect.selected'),
                                          // deselectLabel:$t('company.multiselect.remove'),
                                          placeholder:$t('register-aspirant.selecciona'),
                                          taggable : true,
                                          'track-by':'id',
                                          label: 'name',
                                          'custom-label': cloudCategories=>cloudCategories.name[language]
                                        }"
                                ></input-form>
                                <i @click="showEditCategory(false)" style="margin-top: -5.5rem;"
                                   class="float-right fas fa-times"></i>
                            </div>
                            <div class="col-12 col-md-6 col-lg-6" v-if="showTagClout === false">
                                <label
                                    class="form-control-label">{{
                                        $t('profile-clout.intereses_clout')
                                    }}</label>
                                <ul class="list-inline list-inline-skills">
                                    <li v-for="tags in tags" :key="tags.id" class="list-inline-item">
                                        <a href="#">{{ tags.name[language] }}</a></li>
                                </ul>
                                <i @click="showEditTag(true)" style="margin-top: -6.2rem;"
                                   class="float-right fas fa-pencil-alt"></i>
                            </div>
                            <div class="col-12 col-lg-6 col-md-6 profiling" v-show="showTagClout">
                                <input-form
                                    :label="$t('register-aspirant.seleccionar_tags_profiling')"
                                    id="txtTagsProfiling"
                                    :requiredMsg="$t('register-aspirant.requerido_selecc_tags_perfilacion')"
                                    :required="true"
                                    :modelo.sync="profiling.tagsProfiling"
                                    type="multiselect"
                                    selectLabel=""
                                    :multiselect="{ 'tag-placeholder' : '',
                                          // selectLabel   : $t('company.multiselect.select'),
                                          // selectedLabel : $t('company.multiselect.selected'),
                                          // deselectLabel : $t('company.multiselect.remove'),
                                          placeholder : $t('register-aspirant.selecciona'),
                                          label : 'name',
                                          'track-by' : 'id',
                                          options : optionsTagsProfiling,
                                          multiple : true,
                                          taggable : true,
                                          'custom-label': Cloudtags => Cloudtags.name[language]
                                        }"
                                    @tag="addTagProfiling"
                                ></input-form>
                                <i @click="showEditTag(false)" style="margin-top: -5.5rem;"
                                   class="float-right fas fa-times"></i>
                            </div>
                        </div>
                    </vs-collapse-item>
                </vs-collapse>
            </div>
        </div>
    </div>
</template>

<script>
import VuePhoneNumberInput from "vue-phone-number-input";
import "vue-phone-number-input/dist/vue-phone-number-input.css";

export default {
    name: "EditProfile",
    components: {
        VuePhoneNumberInput
    },
    data() {
        return {
            showPhoneCodeCountry: false,
            showSelectCountry: false,
            showCategoryClout: false,
            showTagClout: false,

            openTabInforPerson: true,
            categoryClout: null,
            language: window.lang,
            colorLoading: '#000000',
            /*Objeto de Usuarios*/
            user: {
                name: "",
                last_name: "",
                email: "",
                data_birth: "",
                document_num: null,
                address: "",
                valueCountry: null,
                valueCity: null,
                phoneI: "",
                phoneSend: "",
                password: "",
                password_confirmation: ""
            },
            /*Objeto de Perfilamiento*/
            profiling: {
                categoryProfiling: null,
                tagsProfiling: null,
                musicProfiling: null
            },
            tags: [],

            optionsCategoryProfiling: [],
            optionsTagsProfiling: [],

            country: null,
            optionsCountries: [],
            optionsCities: []
        }
    },
    methods: {
        getDataUser() {
            axios.get('/api/get-user-profile-clout').then(resp => {
                this.user.name = resp.data.data.name
                this.user.last_name = resp.data.data.last_name
                this.categoryClout = resp.data.data.clouts[0].categories.name[this.language]
                this.user.phone = resp.data.data.phone
                this.user.email = resp.data.data.email
                this.country = resp.data.data.cities.countries.canonical_name
                this.tags = resp.data.data.clouts[0].tag
                this.$vs.loading.close()
            }).catch(err => {

            })
        },

        getCloudCountries() {
            axios
                .get('/api/register/get-cloud-countries')
                .then(res => {
                    this.optionsCountries = res.data.data
                    this.$vs.loading.close()
                })
                .catch(err => {
                    this.$toast.error({
                        title: 'Error',
                        message: this.$t('register-aspirant.error_cargar_mensaje_cloud_countries'),
                        showDuration: 1000,
                        hideDuration: 5000,
                        position: 'top right',
                    })
                })
        },

        getCloudCategories() {
            axios
                .get('/api/register/get-cloud-categories')
                .then(res => {
                    this.optionsCategoryProfiling = res.data.data
                })
                .catch(err => {
                    this.$toast.error({
                        title: 'Error',
                        message: this.$t('register-aspirant.error_cargar_mensaje_cloud_categorias'),
                        showDuration: 1000,
                        hideDuration: 5000,
                        position: 'top right',
                    })
                })
        },

        getCloudTags() {
            axios
                .get('/api/register/get-cloud-tags')
                .then(res => {
                    this.optionsTagsProfiling = res.data.data
                })
                .catch(err => {
                    this.$toast.error({
                        title: 'Error',
                        message: this.$t('register-aspirant.error_cargar_mensaje_cloud_tags'),
                        showDuration: 1000,
                        hideDuration: 5000,
                        position: 'top right',
                    })
                })
        },
        addTagProfiling(newTag) {
            const tag = {
                name: newTag,
                code: newTag.substring(0, 2) + Math.floor(Math.random() * 10000000)
            };
            this.options.push(tag);
            this.value.push(tag);
        },
        getCloudCities(countryCode) {

            if (countryCode === null) {
                this.optionsCities = [];
                this.user.valueCity = null;
            } else {
                this.$vs.loading({color: this.colorLoading})
                axios
                    .get('/api/register/get-cloud-cities/' + countryCode.alpha2Code)
                    .then(res => {
                        this.optionsCities = res.data.data
                        this.$vs.loading.close()
                    })
                    .catch(err => {
                        this.$toast.error({
                            title: 'Error',
                            message: this.$t('register-aspirant.error_cargar_mensaje_cloud_countries'),
                            showDuration: 1000,
                            hideDuration: 5000,
                            position: 'top right',
                        })
                    })
            }
        },

        showEditPhone(value) {

            this.showPhoneCodeCountry = value
            this.user.phoneI = ""
            this.user.phoneSend = ""

        },

        showEditCountry(value) {
            this.openTabInforPerson = false
            this.$vs.loading({color: this.colorLoading})
            this.showSelectCountry = value
            if (value === true) {
                this.getCloudCountries();
                this.openTabInforPerson = true
            }
            if (value === false) {
                this.optionsCountries = []
                this.optionsCities = []
                this.user.valueCountry = null
                this.user.valueCity = null
                this.openTabInforPerson = true
            }
            setTimeout(() => {
                this.$vs.loading.close()
            }, 1000)
        },


        showEditCategory(value) {
            this.$vs.loading({color: this.colorLoading})
            this.showCategoryClout = value

            if (value === true) {
                this.getCloudCategories();
            }
            if(value === false){
                this.profiling.categoryProfiling = null
            }
            setTimeout(() => {
                this.$vs.loading.close()
            }, 1000)
        },

        showEditTag(value) {
            this.$vs.loading({color: this.colorLoading})
            this.showTagClout = value
            if (value === true) {
                this.getCloudTags()
            }
            if (value === false){
                this.profiling.tagsProfiling = null
            }
            setTimeout(() => {
                this.$vs.loading.close()
            }, 100)
        }
    },
    mounted() {
        this.$vs.loading({color: this.colorLoading})
        this.getDataUser();

    }
}
</script>

<style scoped>

</style>
