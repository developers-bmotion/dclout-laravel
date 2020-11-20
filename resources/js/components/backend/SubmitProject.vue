<template>
    <div>
        <form-wizard title=""
                     subtitle=""
                     color="#000000"
        >
            <tab-content id="tab1" class="tab1Informacion" :title="`${ $t('project.informacion_personal')}`"
                         icon="ti-user">
                <div class="row">
                    <div class="col-12 col-lg-6 col-md-6">
                        <div class="form-group input-material">
                            <input type="text" class="form-control" required>
                            <label for="name"></label>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 col-md-6">
                        <div class="form-group input-material">
                            <input type="text" class="form-control" required>
                            <label for="name">Apellidos</label>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 col-md-6">
                        <div class="form-group input-material">
                            <input type="email" class="form-control" required>
                            <label for="name">Email</label>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 col-md-6 pt-5">
                        <div class="form-group">
                            <multiselect placeholder ="Pais" v-model="valuePais" :options="optionsPais"></multiselect>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 col-md-6 pt-5">
                        <div class="form-group">
                            <multiselect placeholder ="Ciudad" v-model="valueCiudad" :options="optionsCiudad"></multiselect>
                        </div>
                    </div>
                </div>

            </tab-content>
            <tab-content :title="`${$t('project.informacion_proyecto')}`"
                         icon="ti-settings">
                My second tab content
            </tab-content>
        </form-wizard>
    </div>
</template>

<script>
import Multiselect from 'vue-multiselect'

import Datepicker from 'vuejs-datepicker';
import { en, es } from "vuejs-datepicker/dist/locale";

export default {
    name: "SubmitProject",
    components: {
        Multiselect,
        Datepicker
    },
    data() {
        return {
            valuePais: null,
            optionsPais: ['Colombia', 'Ecuador', 'Estados Unidos'],
            valueCiudad: null,
            optionsCiudad: ['Bogotá', 'Quito', 'New York'],
        }
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
