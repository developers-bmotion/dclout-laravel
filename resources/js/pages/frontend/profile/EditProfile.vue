<template>
    <div>
        <h1>{{ $t('profile-clout.configuracion_profile_clout') }}</h1>
        <div class="row">
            <div class="col-12">
                <vs-collapse type="margin" class="pb-5">
                    <vs-collapse-item :open="openTabInforPerson" >
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
                                <i @click="showEditPhone(true)" style="margin-top: -5rem;" class="float-right fas fa-pencil-alt"></i>
                            </div>
                            <div class="col-12 col-md-4 col-lg-4" style="top: -1.2rem;" v-if="showPhoneCodeCountry === true">
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
                                <i @click="showEditPhone(false)" style="margin-top: -4rem;" class="float-right fas fa-times"></i>
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
                                <i @click="showEditCountry(true)" style="margin-top: -5rem;" class="float-right fas fa-pencil-alt"></i>
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
                                <i @click="showEditCountry(false)" style="margin-top: -5.5rem;" class="float-right fas fa-times"></i>
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
                    <!--                    <vs-collapse-item>-->
                    <!--                        <div slot="header">-->
                    <!--                            Collapse item-->
                    <!--                        </div>-->

                    <!--                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque rhoncus eros tortor, non-->
                    <!--                        fringilla lectus cursus et. Fusce vel nisi ante. Aliquam sit amet lectus pharetra, luctus mi-->
                    <!--                        sed, aliquet felis. Mauris a tortor viverra, ornare tellus in, consectetur leo.-->
                    <!--                        <br><br>-->
                    <!--                        Etiam nec nunc nec nisl luctus tincidunt efficitur vitae elit. Vestibulum iaculis nibh commodo-->
                    <!--                        neque ultrices lobortis. Cras magna massa, pretium vitae mattis varius, pharetra nec massa.-->
                    <!--                        Aliquam ac ex enim. Quisque consequat dui libero, vel blandit lorem porttitor sit amet.-->
                    <!--                        Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nullam-->
                    <!--                        sed lobortis nisl, quis eleifend metus.-->
                    <!--                    </vs-collapse-item>-->
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
            colorLoading: '#000000',
            openTabInforPerson: true,
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
                this.user.phone = resp.data.data.phone
                this.user.email = resp.data.data.email
                this.country = resp.data.data.cities.countries.canonical_name
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

        showEditPhone(value){

            this.showPhoneCodeCountry = value
            this.user.phoneI = ""
            this.user.phoneSend = ""

        },

        showEditCountry(value){
            this.openTabInforPerson = false
            this.$vs.loading({color: this.colorLoading})
            this.showSelectCountry = value
            if (value === true){
                this.getCloudCountries();
                this.openTabInforPerson = true
            }
            if (value === false){
                this.optionsCountries = []
                this.optionsCities = []
                this.user.valueCountry = null
                this.user.valueCity = null
                this.openTabInforPerson = true
            }
            setTimeout(() => {
                this.$vs.loading.close()
            }, 1000)
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
