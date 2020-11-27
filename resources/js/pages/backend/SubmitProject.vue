<template>
    <div>
        <form method="post">
            <form-wizard
                color="#000000"
                subtitle=""
                title
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
                                <input-form
                                    label=""
                                    id="txtCountry"
                                    errorMsg
                                    :requiredMsg="$t('register-aspirant.requerido_seleccionar_pais')"
                                    :required="true"
                                    :modelo.sync="user.valueCountry"
                                    :msgServer.sync="errors.valueCountry"
                                    type="multiselect"
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
                                <input-form
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
                        <div class="row pb-3">
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
                                    :multiselect="{ options: optionsCategoryProfiling,
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
                                          options : optionsTagsProfiling,
                                          multiple : true,
                                          taggable : true,
                                          'custom-label': tags => tags.name
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
                                          options : optionsMusicProfiling,
                                          multiple : true,
                                          taggable : true,
                                          'custom-label': music => music.name
                                        }"
                                    @tag="addTagMusic"
                                ></input-form>
                            </div>
                        </div>
                        <hr>
                        <div class="row pb-3">
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

                        <wizard-button :disabled="descriptionProject.length > 5 ? true:false" v-else
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
            language: window.lang,
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
            optionsCountries: [
                {
                    id: 1,
                    name: "Colombia"
                },
                {
                    id: 2,
                    name: "Ecuador"
                },
                {
                    id: 3,
                    name: "Estados Unidos"
                }
            ],
            optionsCities: [
                {
                    id: 1,
                    name: "Bogotá"
                },
                {
                    id: 2,
                    name: "Quito"
                },
                {
                    id: 3,
                    name: "New York"
                }
            ],
            optionsCategoryProfiling: [
                {
                    id: 1,
                    name: "Actor"
                },
                {
                    id: 2,
                    name: "Arquitecto"
                },
                {
                    id: 3,
                    name: "Atleta"
                }
            ],
            optionsTagsProfiling: [
                {
                    id: 1,
                    name: "Aire libre"
                },
                {
                    id: 2,
                    name: "Actuación"
                },
                {
                    id: 3,
                    name: "Arte"
                },
                {
                    id: 4,
                    name: "Anime"
                },
                {
                    id: 5,
                    name: "Baile"
                },
                {
                    id: 6,
                    name: "Coaching"
                },

            ],
            optionsMusicProfiling: [
                {
                    id: 1,
                    name: "Afro"
                },
                {
                    id: 2,
                    name: "Caribe"
                },
                {
                    id: 3,
                    name: "Cumbia"
                },
                {
                    id: 4,
                    name: "Cristiana"
                },
                {
                    id: 5,
                    name: "Dance / Electrónica"
                },
                {
                    id: 6,
                    name: "Hip Hop"
                },

            ],

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
            // plugin:WordCount,
            editorData: "<p>Content of the editor.</p>",
            editorConfig: {
                language: "es",
                // wordcount: {
                //
                //     // Whether or not you want to show the Word Count
                //     showWordCount: true,
                //
                //     // Whether or not you want to show the Char Count
                //     showCharCount: false,
                //
                //     // Maximum allowed Word Count
                //     maxWordCount: 4,
                //
                //     // Maximum allowed Char Count
                //     maxCharCount: 10
                // },
            },

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
                limit = 5;
            var operation = limit - char;
            if (operation < 0) {
                operation = 0
            }
            return operation + " / " + limit + "characters remaining";
        }
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


</style>
