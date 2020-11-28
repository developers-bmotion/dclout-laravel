<template>
    <div>
        <form method="post">
            <form-wizard
                color="#000000"
                subtitle=""
                title
                class="register-wizard"
                :finishButtonText="$t('register-aspirant.btn_registar')"
                :nextButtonText="$t('register-aspirant.btn_siguiente')"
                :backButtonText="$t('register-aspirant.btn_atras')"
                shape="tab"
                error-color="#ff4949"
                @on-complete="createNewProjectSubmit()"
                @on-change="cambioPagina"
                ref="wizard"
            >
                <!--=====================================
		            TAB 1 REGISTROS
                ======================================-->
                <tab-content
                    :title="`${ $t('register-aspirant.informacion_personal')}`"
                    :beforeChange='validarTab'
                    :isLastStep=true
                >
                    <section class="pb-5" style="width: 100%; height: 100%">
                        <div class="row">
                            <div class="col-12 col-lg-6 col-md-6">
                                <input-form
                                    id="txtNames"
                                    :label="$t('register-aspirant.nombres')"
                                    pattern="alf"
                                    :errorMsg="$t('register-aspirant.error_name')"
                                    :requiredMsg="$t('register-aspirant.requerido_name')"
                                    :modelo.sync="user.name"
                                    :required="true"
                                    :msgServer.sync="errors.name"
                                ></input-form>
                            </div>
                            <div class="col-12 col-lg-6 col-md-6">
                                <input-form
                                    id="txtLastName"
                                    :label="$t('register-aspirant.apellidos')"
                                    pattern="alf"
                                    :errorMsg="$t('register-aspirant.error_last_name')"
                                    :requiredMsg="$t('register-aspirant.requerido_last_name')"
                                    :modelo.sync="user.last_name"
                                    :required="true"
                                    :msgServer.sync="errors.last_name"
                                ></input-form>
                            </div>
                            <div class="col-12 col-lg-6 col-md-6">
                                <input-form
                                    id="txtEmail"
                                    :label="$t('register-aspirant.correo')"
                                    pattern="email"
                                    :errorMsg="$t('register-aspirant.error_email')"
                                    :requiredMsg="$t('register-aspirant.requerido_email')"
                                    :modelo.sync="user.email"
                                    :required="true"
                                    :msgServer.sync="errors.email"
                                ></input-form>
                            </div>
                            <div class="col-12 col-lg-6 col-md-6">
                                <label class="form-control-label label-selects">{{
                                        $t('register-aspirant.selecciona_pais')
                                    }} <span class="text-danger">*</span></label>
                                <input-form
                                    class="input-label-register"
                                    label=""
                                    id="txtCountry"
                                    errorMsg
                                    :requiredMsg="$t('register-aspirant.requerido_seleccionar_pais')"
                                    :required="true"
                                    :modelo.sync="user.valueCountry"
                                    :msgServer.sync="errors.valueCountry"
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
                            </div>
                            <div class="col-12 col-lg-6 col-md-6">
                                <label class="form-control-label label-selects">{{
                                        $t('register-aspirant.selecciona_ciudad')
                                    }} <span class="text-danger">*</span></label>
                                <input-form
                                    class="input-label-register"
                                    label=""
                                    id="txtCity"
                                    errorMsg
                                    :requiredMsg="$t('register-aspirant.requerido_seleccionar_ciudad')"
                                    :required="true"
                                    :modelo.sync="user.valueCity"
                                    :msgServer.sync="errors.valueCity"
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
                            <div class="col-12 col-lg-6 col-md-6">
                                <input-form
                                    :label="$t('register-aspirant.fecha_nacimiento')"
                                    id="txtFechaNacimiento"
                                    pattern="all"
                                    :errorMsg="$t('register-aspirant.error_fecha_nacimiento')"
                                    :requiredMsg="$t('register-aspirant.requerido_fecha_nacimiento')"
                                    :required="true"
                                    :modelo.sync="user.data_birth"
                                    :msgServer.sync="errors.data_birth"
                                    type="date"
                                    :datepicker="{'clear-button': false,
                                                  'bootstrap-styling':true
                                                }"
                                ></input-form>
                            </div>
                            <div class="col-12 col-lg-6 col-md-6">
                                <input-form
                                    id="txtPhone"
                                    :label="$t('register-aspirant.telefono')"
                                    pattern="num"
                                    :errorMsg="$t('register-aspirant.error_telefono')"
                                    :requiredMsg="$t('register-aspirant.requerido_telefono')"
                                    :modelo.sync="user.phone"
                                    :required="false"
                                    :msgServer.sync="errors.phone"
                                ></input-form>
                            </div>

                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-12 col-lg-12 col-md-6">
                                {{ $t('register-aspirant.mensaje_creador_contenido') }}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-lg-6 col-md-6">
                                <input-form
                                    label=""
                                    id="txtCreator"
                                    errorMsg
                                    requiredMsg=""
                                    :required="false"
                                    :modelo.sync="valueCreator"
                                    :msgServer.sync="errors.valueCreator"
                                    type="multiselect"
                                    selectLabel="Busca tu ciudad"
                                    :multiselect="{ options: optionsCreator,
                                          // selectLabel:$t('company.multiselect.select'),
                                          // selectedLabel:$t('company.multiselect.selected'),
                                          // deselectLabel:$t('company.multiselect.remove'),
                                          placeholder:$t('register-aspirant.selecciona'),
                                          taggable : true,
                                          'track-by':'id',
                                          label: 'name',
                                          'custom-label': countries=>countries.name
                                        }"
                                ></input-form>
                            </div>
                        </div>
                    </section>
                </tab-content>

                <!--=====================================
		            TAB 2 DE PERFILACIÓN
                ======================================-->
                <tab-content v-if="valueCreator.id == 1"
                             :title="`${$t('register-aspirant.perfilacion')}`"
                             :beforeChange="validarTab"
                >
                    <section class="pb-5" style="width: 100%; height: 100%" v-if="currentTab===1">
                        <div class="row">
                            <div class="col-12 col-lg-6 col-md-6 profiling">
                                <label>{{ $t('register-aspirant.seleccionar_categoria_profiling') }} <span
                                    class="text-danger">*</span></label>
                                <input-form
                                    label=""
                                    id="txtCategoryProfiling"
                                    errorMsg
                                    :requiredMsg="$t('register-aspirant.requerido_selecc_categoria_perfilacion')"
                                    :required="true"
                                    :modelo.sync="profiling.categoryProfiling"
                                    :msgServer.sync="errors.categoryProfiling"
                                    type="multiselect"
                                    selectLabel="Busca tu categoría"
                                    :multiselect="{ options: optionsCategoryProfiling.data,
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
                            </div>
                            <div class="col-12 col-lg-6 col-md-6 profiling">
                                <label>{{ $t('register-aspirant.seleccionar_tags_profiling') }} <span
                                    class="text-danger">*</span></label>
                                <input-form
                                    label=""
                                    id="txtTagsProfiling"
                                    :requiredMsg="$t('register-aspirant.requerido_selecc_tags_perfilacion')"
                                    :required="true"
                                    :modelo.sync="profiling.tagsProfiling"
                                    :msgServer.sync="errors.tagsProfiling"
                                    type="multiselect"
                                    selectLabel=""
                                    :multiselect="{ 'tag-placeholder' : '',
                                          // selectLabel   : $t('company.multiselect.select'),
                                          // selectedLabel : $t('company.multiselect.selected'),
                                          // deselectLabel : $t('company.multiselect.remove'),
                                          placeholder : $t('register-aspirant.selecciona'),
                                          label : 'name',
                                          'track-by' : 'id',
                                          options : optionsTagsProfiling.data,
                                          multiple : true,
                                          taggable : true,
                                          'custom-label': Cloudtags => Cloudtags.name[language]
                                        }"
                                    @tag="addTagProfiling"
                                ></input-form>
                            </div>
                            <div class="col-12 col-lg-6 col-md-6 profiling">
                                <label>{{ $t('register-aspirant.seleccionar_music_profiling') }} <span
                                    class="text-danger">*</span></label>
                                <input-form
                                    label=""
                                    id="txtMusicProfiling"
                                    :requiredMsg="$t('register-aspirant.requerido_selecc_music_perfilacion')"
                                    :required="true"
                                    :modelo.sync="profiling.musicProfiling"
                                    :msgServer.sync="errors.musicProfiling"
                                    type="multiselect"
                                    selectLabel=""
                                    :multiselect="{ 'tag-placeholder' : '',
                                          // selectLabel   : $t('company.multiselect.select'),
                                          // selectedLabel : $t('company.multiselect.selected'),
                                          // deselectLabel : $t('company.multiselect.remove'),
                                          placeholder : $t('register-aspirant.selecciona'),
                                          label : 'name',
                                          'track-by' : 'id',
                                          options : optionsMusicProfiling.data,
                                          multiple : true,
                                          taggable : true,
                                          'custom-label': music => music.name[language]
                                        }"
                                    @tag="addTagMusic"
                                ></input-form>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-12 col-lg-12 col-md-6">
                                {{ $t('register-aspirant.mensaje_desea_enviar_proyecto') }}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-lg-6 col-md-6">
                                <input-form
                                    label=""
                                    id="txtCreatorProject"
                                    errorMsg
                                    requiredMsg=""
                                    :required="false"
                                    :modelo.sync="valueCreateProject"
                                    :msgServer.sync="errors.valueCreator"
                                    type="multiselect"
                                    selectLabel="Busca tu ciudad"
                                    :multiselect="{ options: optionsCreateProject,
                                          // selectLabel:$t('company.multiselect.select'),
                                          // selectedLabel:$t('company.multiselect.selected'),
                                          // deselectLabel:$t('company.multiselect.remove'),
                                          placeholder:$t('register-aspirant.selecciona'),
                                          taggable : true,
                                          'track-by':'id',
                                          label: 'name',
                                          'custom-label': countries=>countries.name
                                        }"
                                ></input-form>
                            </div>
                        </div>
                    </section>
                </tab-content>
                <!--=====================================
		            TAB 3 ENVIAR PROYECTO
                ======================================-->
                <tab-content v-if="valueCreateProject.id == 1"
                             :title="`${$t('register-aspirant.presenta_proyecto')}`"
                             :beforeChange="validarTab"
                >
                    <section class="pb-5" style="width: 100%; height: 100%" v-if="currentTab===2">
                        <div class="row">
                            <div class="col-12 col-lg-6 col-md-6 profiling">
                                <label>{{ $t('register-aspirant.select_redes_sociales') }} <span
                                    class="text-danger">*</span></label>
                                <input-form
                                    label=""
                                    id="txtSocialNetworks"
                                    :requiredMsg="$t('register-aspirant.requerido_select_redes_sociales')"
                                    :required="true"
                                    :modelo.sync="objectSocialNetworks"
                                    :msgServer.sync="errors.objectSocialNetworks"
                                    type="multiselect"
                                    selectLabel=""
                                    :multiselect="{ 'tag-placeholder' : '',
                                          // selectLabel   : $t('company.multiselect.select'),
                                          // selectedLabel : $t('company.multiselect.selected'),
                                          // deselectLabel : $t('company.multiselect.remove'),
                                          placeholder : $t('register-aspirant.selecciona'),
                                          label : 'social',
                                          'track-by' : 'id',
                                          options : listSocialNetworks,
                                          multiple : true,
                                          taggable : true,
                                          'custom-label': obj => obj.social
                                        }"
                                    @tag="addTagSocialInputs"
                                ></input-form>
                            </div>
                        </div>
                        <div class="row">
                            <div
                                v-for="inputsSocial in objectSocialNetworks"
                                :key="inputsSocial.id"
                                class="col-md-4 col-lg-4 col-12"
                            >
                                <input-form
                                    :label="'Url '+inputsSocial.social"
                                    :id="'txt'+inputsSocial+'Artist'"
                                    pattern="url"
                                    :placeholder="inputsSocial.social+'url'"
                                    :errorMsg="$t('register-aspirant.error_msg_url')"
                                    :requiredMsg="$t('register-aspirant.requerido_msg_url')"
                                    :required="true"
                                    :modelo.sync="inputsSocial.model"
                                ></input-form>
                            </div>
                        </div>
                        <div class="row" v-if="objectSocialNetworks.length > 0">
                            <div class="col-12">
                                <input-form
                                    id="txtUrl"
                                    :label="$t('register-aspirant.url_proyecto')"
                                    pattern="url"
                                    :errorMsg="$t('register-aspirant.error_url')"
                                    :requiredMsg="$t('register-aspirant.requerido_url')"
                                    :modelo.sync="urlProject"
                                    :required="true"
                                    :msgServer.sync="errors.urlProject"
                                ></input-form>
                            </div>
                        </div>
                        <div class="row" v-if="objectSocialNetworks.length > 0">
                            <div class="col-12">
                                <input-form
                                    :label="$t('register-aspirant.descripcion_proyecto')"
                                    id="releaseDate"
                                    pattern="all"
                                    disabled
                                    :errorMsg="$t('register-aspirant.error_descripcion_proyecto')"
                                    :requiredMsg="$t('register-aspirant.requerido_descripcion_proyecto')"
                                    :required="true"
                                    :modelo.sync="descriptionProject"
                                    :msgServer.sync="errors.descriptionProject"
                                    type="textarea"
                                    :options="{
                                        rows: 4
                                    }"
                                ></input-form>
                                <span class="limiter">{{ charactersLeft }}</span>
                            </div>
                        </div>
                    </section>
                </tab-content>

                <template slot="footer" slot-scope="props">
                    <div class="wizard-footer-left">
                        <wizard-button v-if="props.activeTabIndex > 0" @click.native="props.prevTab()"
                                       :style="props.fillButtonStyle">{{ $t('register-aspirant.btn_atras') }}
                        </wizard-button>
                    </div>
                    <div class="wizard-footer-right">
                        <wizard-button v-if="!props.isLastStep" @click.native="props.nextTab()"
                                       class="wizard-footer-right" :style="props.fillButtonStyle">
                            {{ $t('register-aspirant.btn_siguiente') }}
                        </wizard-button>

                        <wizard-button :disabled="descriptionProject.length > 500 ? true:false" v-else
                                       @click.native="createNewProjectSubmit()"
                                       class="wizard-footer-right finish-button" :style="props.fillButtonStyle">
                            {{
                                props.isLastStep ? $t('register-aspirant.btn_registar') :
                                    $t('register-aspirant.btn_siguiente')
                            }}
                        </wizard-button>
                    </div>
                </template>
            </form-wizard>
        </form>
    </div>
</template>

<script>
import Multiselect from 'vue-multiselect'
import ClassicEditor from "@ckeditor/ckeditor5-build-classic";
// import WordCount from '@ckeditor/ckeditor5-word-count/src/wordcount';
import "@ckeditor/ckeditor5-build-classic/build/translations/es.js";
import Datepicker from 'vuejs-datepicker';
import {en, es} from "vuejs-datepicker/dist/locale";

require("moment/min/locales.min");

export default {
    name: "SubmitProject",
    components: {
        Multiselect,
        Datepicker,
        ClassicEditor,
        // WordCount
    },
    data() {
        return {
            dataP: null,
            language: window.lang,
            colorLoading: '#000000',
            value: false,
            valueCreator: "",
            valueCreateProject: "",
            optionsCreator: [
                {
                    id: 1,
                    name: `${this.$t('register-aspirant.si')}` //SI
                },
                {
                    id: 2,
                    name: `${this.$t('register-aspirant.no')}` //NO
                }

            ],
            optionsCreateProject: [
                {
                    id: 1,
                    name: `${this.$t('register-aspirant.si')}` //SI
                },
                {
                    id: 2,
                    name: `${this.$t('register-aspirant.no')}` //NO
                }
            ],
            optionsCountries: [],
            optionsCities: [],
            optionsCategoryProfiling: [],
            optionsTagsProfiling: [],
            optionsMusicProfiling: [],

            /*Objeto de Usuarios*/
            user: {
                name: "Mao",
                last_name: "Guti",
                email: "si@mc.com",
                data_birth: 2020 - 11 - 10,
                document_num: null,
                address: "",
                valueCountry: null,
                valueCity: null,
                phone: null
            },
            /*Objeto de Perfilamiento*/
            profiling: {
                categoryProfiling: null,
                tagsProfiling: null,
                musicProfiling: null
            },

            urlProject: null,
            descriptionProject: "",

            /*Links y redes sociales*/

            objectSocialNetworks: [],

            listSocialNetworks: [
                {social: "YouTube", model: "", id: 1},
                {social: "Facebook", model: "", id: 2},
                {social: "Instagram", model: "", id: 3},
                {social: "Spotify", model: "", id: 4},
                {social: "Apple Music", model: "", id: 5},
                // { social: 'Dezeer', model:'', id: 6 },
                // { social: 'Tiktok', model:'', id: 7 },
                {social: "Snapchat", model: "", id: 6},
                {social: "Website", model: "", id: 7}
            ],

            errors: {},
            currentTab: 0,
            editor: ClassicEditor,

            en: en,
            es: es,
        }
    },
    methods: {
        createNewProjectSubmit() {
            eventBus.$emit("validarFormulario");
            setTimeout(() => {
                let resp = this;
                /***  VALIDANDO LOS ERRORES Y MOSTRANDO UNA ALERTA  ***/
                if (document.querySelectorAll(".is-invalid").length > 0) {
                    alert('Llenar todos lo campos');
                    return;
                } else if (this.descriptionProject.length > 5) {
                    alert('Maximo 500 palabras bien chick');
                    return;
                }
                alert('Enviar datos');
            }, 200);

        },

        validarTab() {
            eventBus.$emit("validarFormulario");
            setTimeout(() => {
                const validated = document.querySelectorAll(".is-invalid")
                    .length < 1;

                if (validated) {
                    this.$refs.wizard.tabs[this.currentTab].validationError = null;
                    this.$refs.wizard.changeTab(this.currentTab, this.currentTab + 1);
                }
            }, 200);
            return false;
        },
        validarTabSend() {
            eventBus.$emit("validarFormulario");
            alert('tabSend')
            setTimeout(() => {
                const validated = document.querySelectorAll(".is-invalid")
                    .length < 1;

                // if (validated && this.descriptionProject.length < 5) {
                //     this.$refs.wizard.tabs[this.currentTab].validationError = null;
                //     this.$refs.wizard.changeTab(this.currentTab, this.currentTab + 1);
                // }
            }, 200);
            return false;
        },
        cambioPagina(prevIndex, nextIndex) {
            this.currentTab = nextIndex;
        },

        getCloudCategories() {
            axios
                .get('/api/register/get-cloud-categories')
                .then(res => {
                    this.optionsCategoryProfiling = res.data
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
                    this.optionsTagsProfiling = res.data
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
        getCloudMusic() {
            axios
                .get('/api/register/get-cloud-music')
                .then(res => {
                    this.optionsMusicProfiling = res.data
                })
                .catch(err => {
                    this.$toast.error({
                        title: 'Error',
                        message: this.$t('register-aspirant.error_cargar_mensaje_cloud_music'),
                        showDuration: 1000,
                        hideDuration: 5000,
                        position: 'top right',
                    })
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

        getCloudCities(countryCode) {

            if (countryCode === null) {
                console.log('entra o no entra')
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

        addTagSocialInputs(newTag) {
            const tag = {
                name: newTag,
                code: newTag.substring(0, 2) + Math.floor(Math.random() * 10000000)
            };
            this.options.push(tag);
            this.value.push(tag);
        },
        addTagProfiling(newTag) {
            const tag = {
                name: newTag,
                code: newTag.substring(0, 2) + Math.floor(Math.random() * 10000000)
            };
            this.options.push(tag);
            this.value.push(tag);
        },
        addTagMusic(newTag) {
            const tag = {
                name: newTag,
                code: newTag.substring(0, 2) + Math.floor(Math.random() * 10000000)
            };
            this.options.push(tag);
            this.value.push(tag);
        },
    },
    computed: {
        charactersLeft() {
            var char = this.descriptionProject.length,
                limit = 500;
            var operation = limit - char;
            if (operation < 0) {
                operation = 0
                this.$toast.error({
                    title: 'Error',
                    message: this.$t('register-aspirant.error_maximo_caracteres'),
                    showDuration: 1000,
                    hideDuration: 6000,
                    position: 'top right',
                })
            }

            return operation + " / " + limit + ' ' + this.$t('register-aspirant.caracteres_restantes');
        }
    },
    mounted() {
        this.$vs.loading({color: this.colorLoading})
        this.getCloudCategories();
        this.getCloudTags();
        this.getCloudMusic();
        this.getCloudCountries();
    }
}
</script>

<style>
#step-Personalinformation0 .wizard-icon-container {
    display: none !important;
}

#step-Profiling2 .wizard-icon-container {
    display: none !important;
}

#step-Personalinformation0 {
    display: none !important;
}

#step-Profiling2 {
    display: none !important;
}

#step-Informaciónpersonal0 .wizard-icon-container {
    display: none !important;
}

#step-Perfilación2 .wizard-icon-container {
    display: none !important;
}

#step-Projectinformation2 {
    display: none !important;
}

#step-Personalinformation2 {
    display: none !important;
}

#step-Informaciónpersonal0 {
    display: none !important;
}

#step-Perfilación2 {
    display: none !important;
}

.wizard-progress-with-circle {
    display: none !important;
}

.tab1Informacion .active a {
    border-right: black 0.15rem solid;
}

#step-Presentatuproyecto4 {
    display: none;
}

#step-Presentatuproyecto4 .wizard-icon-container {
    display: none !important;
}

#step-Presentyourproject4 {
    display: none;
}

#step-Presentyourproject4 .wizard-icon-container {
    display: none !important;
}

.input-label-register {
    margin-top: 0.2rem !important
}

.label-selects {
    color: #000000 !important;
    font-weight: 500 !important;
    margin-top: 1.1rem !important;
}

.register-wizard .wizard-nav{
    position: sticky !important;
    top: 0px !important;
    background-color: white !important;
    padding: 2vh 0 !important;
}

</style>
