<template>
    <div>
        <!--        <form-wizard title=""-->
        <!--                     subtitle=""-->
        <!--                     color="#000000"-->
        <!--        >-->
        <!--            <tab-content id="tab1" class="tab1Informacion" :title="`${ $t('project.informacion_personal')}`"-->
        <!--                         icon="ti-user">-->
        <!--                <div class="row">-->
        <!--                    <div class="col-12 col-lg-6 col-md-6">-->
        <!--                        <div class="form-group input-material">-->
        <!--                            <input type="text" class="form-control" required>-->
        <!--                            <label for="name"></label>-->
        <!--                        </div>-->
        <!--                    </div>-->
        <!--                    <div class="col-12 col-lg-6 col-md-6">-->
        <!--                        <div class="form-group input-material">-->
        <!--                            <input type="text" class="form-control" required>-->
        <!--                            <label for="name">Apellidos</label>-->
        <!--                        </div>-->
        <!--                    </div>-->
        <!--                    <div class="col-12 col-lg-6 col-md-6">-->
        <!--                        <div class="form-group input-material">-->
        <!--                            <input type="email" class="form-control" required>-->
        <!--                            <label for="name">Email</label>-->
        <!--                        </div>-->
        <!--                    </div>-->
        <!--                    <div class="col-12 col-lg-6 col-md-6 pt-5">-->
        <!--                        <div class="form-group">-->
        <!--                            <multiselect placeholder="Pais" v-model="valuePais" :options="optionsPais"></multiselect>-->
        <!--                        </div>-->
        <!--                    </div>-->
        <!--                    <div class="col-12 col-lg-6 col-md-6 pt-5">-->
        <!--                        <div class="form-group">-->
        <!--                            <multiselect placeholder="Ciudad" v-model="valueCiudad"-->
        <!--                                         :options="optionsCiudad"></multiselect>-->
        <!--                        </div>-->
        <!--                    </div>-->
        <!--                    <div class="col-12 col-lg-6 col-md-6 pt-4">-->
        <!--                        <div class="form-group">-->
        <!--                            <input-form-->
        <!--                                label="Fecha Nacimiento"-->
        <!--                                id="txtFechaNacimiento"-->
        <!--                                pattern="all"-->
        <!--                                errorMsg="Ingrese una fecha de nacimiento válida"-->
        <!--                                requiredMsg="La fecha de nacimiento es requerida"-->
        <!--                                :required="true"-->
        <!--                                :modelo.sync="user.data_birth"-->
        <!--                                :msgServer.sync="errors.data_birth"-->
        <!--                                type="date"-->
        <!--                                :datepicker="{'clear-button': false,-->
        <!--                                          'bootstrap-styling':true-->
        <!--                                        }"-->
        <!--                            ></input-form>-->
        <!--                        </div>-->
        <!--                    </div>-->
        <!--                </div>-->

        <!--            </tab-content>-->
        <!--            <tab-content :title="`${$t('project.informacion_proyecto')}`"-->
        <!--                         icon="ti-settings">-->
        <!--                My second tab content-->
        <!--            </tab-content>-->
        <!--        </form-wizard>-->

        <form method="post">
            <form-wizard
                color="#000000"
                subtitle=""
                title
                finishButtonText="Enviar datos"
                nextButtonText="Siguiente"
                backButtonText="Atrás"
                shape="tab"
                error-color="#ff4949"
                @on-complete="createNewProjectSubmit()"
                @on-change="cambioPagina"
                ref="wizard"
            >
                <tab-content
                    :title="`${ $t('project.informacion_personal')}`"
                    :beforeChange="validarTab"
                >
                    <section class="pb-5" style="width: 100%; height: 100%">
                        <div class="row">
                            <div class="col-12 col-lg-6 col-md-6">
                                <input-form
                                    id="txtNames"
                                    label="Nombres"
                                    pattern="alf"
                                    errorMsg="Ingrese un nombre valido"
                                    requiredMsg="El nombre es requerdo"
                                    :modelo.sync="user.name"
                                    :required="true"
                                    :msgServer.sync="errors.name"
                                ></input-form>
                            </div>
                            <div class="col-12 col-lg-6 col-md-6">
                                <input-form
                                    id="txtLastName"
                                    label="Apellidos"
                                    pattern="alf"
                                    errorMsg="Ingrese apellido valido"
                                    requiredMsg="El apellido es requerdo"
                                    :modelo.sync="user.last_name"
                                    :required="true"
                                    :msgServer.sync="errors.last_name"
                                ></input-form>
                            </div>
                            <div class="col-12 col-lg-6 col-md-6">
                                <input-form
                                    id="txtEmail"
                                    label="Email"
                                    pattern="email"
                                    errorMsg="Ingrese un email valido"
                                    requiredMsg="El email es requerdo"
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
                                    requiredMsg="Debe seleccionar tu pais"
                                    :required="true"
                                    :modelo.sync="user.valueCountry"
                                    :msgServer.sync="errors.valueCountry"
                                    type="multiselect"
                                    selectLabel="Busca tu país"
                                    :multiselect="{ options: optionsCountries,
                                          // selectLabel:$t('company.multiselect.select'),
                                          // selectedLabel:$t('company.multiselect.selected'),
                                          // deselectLabel:$t('company.multiselect.remove'),
                                          placeholder:'Selecciona tu país',
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
                                    requiredMsg="Debe seleccionar tu ciudad"
                                    :required="true"
                                    :modelo.sync="user.valueCity"
                                    :msgServer.sync="errors.valueCity"
                                    type="multiselect"
                                    selectLabel="Busca tu ciudad"
                                    :multiselect="{ options: optionsCities,
                                          // selectLabel:$t('company.multiselect.select'),
                                          // selectedLabel:$t('company.multiselect.selected'),
                                          // deselectLabel:$t('company.multiselect.remove'),
                                          placeholder:'Selecciona tu ciudad',
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
                                    id="txtFechaNacimiento"
                                    pattern="all"
                                    errorMsg="Ingrese una fecha de nacimiento válida"
                                    requiredMsg="La fecha de nacimiento es requerida"
                                    :required="true"
                                    :modelo.sync="user.data_birth"
                                    :msgServer.sync="errors.data_birth"
                                    type="date"
                                    :datepicker="{'clear-button': false,
                                                  'bootstrap-styling':true
                                                }"
                                ></input-form>
                            </div>
                        </div>
                    </section>
                </tab-content>
                <tab-content
                    :title="`${$t('project.informacion_proyecto')}`"
                    :beforeChange="validarTab"
                >
                    <section class="pb-5" style="width: 100%; height: 100%">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group input-material">
                                    <input type="text" class="form-control" required>
                                    <label for="name">Apellidos</label>

                                </div>
                            </div>
                        </div>
                    </section>
                </tab-content>
            </form-wizard>
        </form>
    </div>
</template>

<script>
import Multiselect from 'vue-multiselect'

import Datepicker from 'vuejs-datepicker';
import {en, es} from "vuejs-datepicker/dist/locale";

require("moment/min/locales.min");

export default {
    name: "SubmitProject",
    components: {
        Multiselect,
        Datepicker
    },
    data() {
        return {
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
            optionsCities:[
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

            user: {
                name: "",
                last_name: "",
                email:"",
                data_birth: null,
                document_num: null,
                address: "",
                valueCountry: null,
                valueCity: null,
                phone: null
            },

            errors: {},
            currentTab: 0,
        }
    },
    methods: {

        createNewProjectSubmit() {
            eventBus.$emit("validarFormulario");
            setTimeout(() => {
                let resp = this;
                /***  VALIDANDO LOS ERRORES Y MOSTRANDO UNA ALERTA  ***/
                if (document.querySelectorAll(".form-control.is-invalid").length > 0) {

                    return;
                }
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
        cambioPagina(prevIndex, nextIndex) {
            this.currentTab = nextIndex;
        },
    }
}
</script>

<style>
#step-Personalinformation0 .wizard-icon-container {
    display: none !important;
}

#step-Informaciónpersonal0 .wizard-icon-container {
    display: none !important;
}

#step-Personalinformation0 {
    display: none !important;
}

#step-Informaciónpersonal0 {
    display: none !important;
}

#step-Projectinformation2 .wizard-icon-container {
    display: none !important;
}

#step-Informaciónproyecto2 .wizard-icon-container {
    display: none !important;
}

#step-Projectinformation2 {
    display: none !important;
}

#step-Personalinformation2 {
    display: none !important;
}

#step-Informaciónpersonal2 {
    display: none !important;
}

#step-Informaciónproyecto2 {
    display: none !important;
}

.wizard-progress-with-circle {
    display: none !important;
}

.tab1Informacion .active a {
    border-right: black 0.15rem solid;
}


</style>
