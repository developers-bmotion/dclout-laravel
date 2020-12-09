<template>
    <div class="container pd-x-0 pd-lg-x-10 pd-xl-x-0">
        <div class="media d-block d-lg-flex">
            <div class="profile-sidebar pd-lg-r-25">
                <div class="row">
                    <div class="col-sm-12 col-md-12" style="text-align: -webkit-center;">
                        <div class="avatar avatar-xxl avatar-online"><img src="https://via.placeholder.com/500"
                                                                          class="rounded-circle" alt=""></div>
                    </div><!-- col -->
                    <div class="col-sm-12 col-md-12 mg-t-20 mg-sm-t-0 mg-lg-t-25" style="text-align: -webkit-center;">
                        <h5 class="mg-b-2 tx-spacing--1">{{ name }} {{ last_name }}</h5>
                        <p class="tx-color-03 mg-b-25">{{ categoryClout }}</p>
                    </div><!-- col -->
                    <div class="col-sm-12 col-md-12  mg-t-1">
                        <label
                            class="tx-sans tx-10 tx-semibold tx-uppercase tx-color-01 tx-spacing-1 mg-b-15">{{
                                $t('profile-clout.intereses_clout')
                            }}</label>
                        <ul class="list-inline list-inline-skills">
                            <li v-for="tags in tags" :key="tags.id" class="list-inline-item">
                                <a href="#">{{ tags.name[language] }}</a></li>
                        </ul>
                    </div><!-- col -->
                    <div class="col-sm-12 col-md-12  mg-t-1">
                        <label
                            class="tx-sans tx-10 tx-semibold tx-uppercase tx-color-01 tx-spacing-1 mg-b-15">{{
                                $t('profile-clout.generos_musicales')
                            }}</label>
                        <ul class="list-inline list-inline-skills">
                            <li v-for="music in musics" :key="music.id" class="list-inline-item">
                                <a href="#">{{ music.name[language] }}</a></li>
                        </ul>
                    </div><!-- col -->
                    <div class="col-sm-6 col-md-5 col-lg mg-t-1">
                        <label class="tx-sans tx-10 tx-semibold tx-uppercase tx-color-01 tx-spacing-1 mg-b-15">{{
                                $t('profile-clout.web_redes_sociales')
                            }}</label>
                        <ul class="list-unstyled profile-info-list">
                            <li v-if="url_website"><i class="fas fa-globe"></i><a class="ml-1"
                                                                                  style="margin-left: 0.8rem !important;"
                                                                                  :href="url_website">Web Site</a></li>
                            <li v-if="url_youtube"><i class="fab fa-youtube"></i> <a class="ml-1"
                                                                                     style="margin-left: 0.7rem !important;"
                                                                                     target="_blank"
                                                                                     :href="url_youtube">YouTube</a>
                            </li>
                            <li v-if="url_facebook"><i class="fab fa-facebook-f"></i><a class="ml-1"
                                                                                        style="margin-left: 1.2rem !important;"
                                                                                        target="_blank"
                                                                                        :href="url_facebook">Facebook</a>
                            </li>
                            <li v-if="url_instagram"><i class="fab fa-instagram"></i><a class="ml-1"
                                                                                        style="margin-left: 0.9rem !important;"
                                                                                        target="_blank"
                                                                                        :href="url_instagram">Instagram</a>
                            </li>
                            <li v-if="url_spotify"><i class="fab fa-spotify"></i><a class="ml-1"
                                                                                    style="margin-left: 0.9rem !important;"
                                                                                    target="_blank" :href="url_spotify">Spotify</a>
                            </li>
                            <li v-if="url_tiktok"><img src="/images/tiktok.png" alt="" style="width: 1.1rem;"><a
                                class="ml-1" style="margin-left: 0.7rem !important;" target="_blank" :href="url_tiktok">Tiktok</a>
                            </li>
                            <li v-if="url_twitch"><i class="fab fa-twitch"></i><a class="ml-1"
                                                                                  style="margin-left: 1.1rem !important;"
                                                                                  target="_blank" :href="url_twitch">Twitch</a>
                            </li>
                            <li v-if="url_twitter"><i class="fab fa-twitter"></i><a class="ml-1"
                                                                                    style="margin-left: 1rem !important;"
                                                                                    target="_blank" :href="url_twitter">Twitter</a>
                            </li>
                            <li v-if="url_apple_music"><i class="fab fa-apple"></i><a class="ml-1"
                                                                                      style="margin-left: 1.2rem !important;"
                                                                                      target="_blank"
                                                                                      :href="url_apple_music">Apple
                                Music</a></li>
                        </ul>
                    </div><!-- col -->
                    <div class="col-sm-6 col-md-5 col-lg mg-t-1">
                        <label class="tx-sans tx-10 tx-semibold tx-uppercase tx-color-01 tx-spacing-1 mg-b-15">{{
                                $t('profile-clout.informacion_contacto')
                            }}</label>
                        <ul class="list-unstyled profile-info-list">
                            <li><img :src="flag" alt="" style="width: 1.3rem"> <span
                                class="tx-color-03" style="margin-left: 0.8rem;">{{ nameCountry }}</span></li>
                            <li><i class="fas fa-home"></i> <span style="margin-left: 1.1rem;"
                                                                  class="tx-color-03">{{ city }}</span></li>
                            <li><i class="fas fa-mobile-alt"></i><a style="margin-left: 1.2rem;" href="#">{{
                                    phone
                                }}</a></li>
                            <li><i class="fas fa-envelope-open"></i> <a href="#"
                                                                        style="margin-left: 1.1rem;">{{ email }}</a>
                            </li>
                        </ul>
                    </div><!-- col -->
                </div><!-- row -->

            </div><!-- profile-sidebar -->
            <div class="media-body mg-t-40 mg-lg-t-0 pd-lg-x-10 pb-5">
                <vs-tabs :value="valueTabPosition" color="#000000" alignment="fixed">
                    <vs-tab @click="skeletonValue = 1" :label="$t('profile-clout.proyectos_presentados')">
                        <div>
                            <h1 class="pb-3">{{ $t('profile-clout.proyectos_presentados') }}</h1>
                            <div class="row">
                                <div class="col-12">
                                    <vue-good-table
                                        compactMode
                                        :columns="columns"
                                        :rows="projects"
                                    >
                                        <template slot="table-row" slot-scope="props">
                                            <div v-if="props.column.field == 'state'">
                                                <span v-if="props.row.state == 1"
                                                      class="badge text-center badge-pill badge-light">{{
                                                        $t('profile-clout.revision_estado_tabla')
                                                    }}</span>
                                                <span v-if="props.row.state == 2"
                                                      class="badge text-center badge-pill badge-primary">{{
                                                        $t('profile-clout.publicado_estado_tabla')
                                                    }}</span>
                                                <span v-if="props.row.state == 3"
                                                      class="badge text-center badge-pill badge-success">{{
                                                        $t('profile-clout.aceptado_estado_tabla')
                                                    }}</span>
                                                <span v-if="props.row.state == 4"
                                                      class="badge text-center badge-pill badge-danger">{{
                                                        $t('profile-clout.rechazado_estado_tabla')
                                                    }}</span>
                                            </div>
                                            <div v-else-if="props.column.field === 'created_at'">
                                                <p>{{ moment(props.row.created_at).locale(language).format("LL") }}</p>
                                            </div>
                                            <div v-else-if="props.column.field === 'description_short'">
                                                <p style="cursor: pointer" @click="onCellTable(props.row)">
                                                    {{ $t('profile-clout.mas_informacion_tabla') }}</p>
                                            </div>
                                            <div v-else-if="props.column.field === 'link'">
                                                <a :href="props.row.link" target="_blank"
                                                   class="btn btn btn-outline-secondary">Link</a>
                                            </div>
                                        </template>
                                    </vue-good-table>
                                </div>
                            </div>
                            <vs-popup class="holamundo" :title="nameProject" :active.sync="popupActivoProfile">
                                <p>{{ description_short }}</p>
                            </vs-popup>
                        </div>
                    </vs-tab>
                    <vs-tab @click="loadProjectsAprovad" :label="$t('profile-clout.proyectos_aprobados')">
                        <div v-if="skeletonValue == 1">
                            <h1 class="pb-3">{{ $t('profile-clout.proyectos_aprobados') }}</h1>
                            <div class="row">
                                <div class="col-12 col-md-6 col-lg-6" v-for="skele in 6">
                                    <SkeletonCard
                                        primary="#fafafa"
                                        structure="7013"
                                        borderRadius="0px"
                                        animTimingFunction="ease-in"/>
                                </div>
                            </div>
                        </div>
                        <div v-else>
                            <p class="text-center">{{ $t('profile-clout.msg_no_proyectos_presentados') }}</p>
                        </div>
                    </vs-tab>
                    <vs-tab @click="skeletonValue = 1" :label="$t('profile-clout.configuracion_profile_clout')">
                        <div class="tabConfiguration">
                            <edit-profile></edit-profile>
                        </div>
                    </vs-tab>
                </vs-tabs>
            </div><!-- media-body -->
        </div><!-- media -->
    </div><!-- container -->
</template>

<script>
require("moment/min/locales.min");
export default {
    name: "ProfileClout",
    data() {
        return {
            popupActivoProfile: false,
            valueTabPosition: 0,
            colorLoading: '#000000',
            skeletonValue: 1,
            columns: [
                {
                    label: this.$t('profile-clout.nombre_proyecto_tabla'),
                    field: 'name_initial',
                },
                {
                    label: this.$t('profile-clout.estado_proyecto_tabla'),
                    field: 'state',
                },
                {
                    label: this.$t('profile-clout.fecha_registro_tabla'),
                    field: 'created_at',
                },
                {
                    label: this.$t('profile-clout.descripcion_tabla'),
                    field: 'description_short',
                },
                {
                    label: 'Link',
                    field: 'link',
                },
            ],
            rows: [
                {
                    id: 2,
                    name: "Jane",
                    estado: 24,
                    field: '2011-10-31',
                    link: 'https://dclout-laravel.test/api/get-user-profile-clout'
                },
            ],


            language: window.lang,
            name: "",
            last_name: "",
            email: "",
            phone: "",
            url_facebook: "",
            url_youtube: "",
            url_instagram: "",
            url_tiktok: "",
            url_twitch: "",
            url_twitter: "",
            url_spotify: "",
            url_apple_music: "",
            url_website: "",
            web_site: "",
            flag: "",
            nameCountry: "",
            city: null,
            country: null,
            categoryClout: null,
            tags: [],
            musics: [],

            projects: [],
            description_short: "",
            nameProject: ""
        }
    },
    methods: {
        getDataUser() {
            axios.get('/api/get-user-profile-clout').then(resp => {
                this.name = resp.data.data.name
                this.last_name = resp.data.data.last_name
                this.phone = resp.data.data.phone
                this.email = resp.data.data.email
                this.categoryClout = resp.data.data.clouts[0].categories.name[this.language]
                this.tags = resp.data.data.clouts[0].tag
                this.musics = resp.data.data.clouts[0].musical_genres
                this.city = resp.data.data.cities.name
                this.country = resp.data.data.cities.countries
                this.flag = this.country.flag
                this.nameCountry = this.country.name

                this.url_facebook = resp.data.data.url_facebook
                this.url_apple_music = resp.data.data.url_apple_music
                this.url_instagram = resp.data.data.url_instagram
                this.url_twitch = resp.data.data.url_twitch
                this.url_twitter = resp.data.data.url_twitter
                this.url_youtube = resp.data.data.url_youtube
                this.url_tiktok = resp.data.data.url_tiktok
                this.url_spotify = resp.data.data.url_spotify
                this.url_website = resp.data.data.url_website

                this.projects = resp.data.data.projects
                this.$vs.loading.close()
            }).catch(err => {

            })
        },
        onCellTable(params) {
            console.log(params)
            this.$vs.loading({color: this.colorLoading})

            this.description_short = ""
            this.nameProject = ""
            this.nameProject = params.name_initial
            this.description_short = params.description_short
            this.popupActivoProfile = true

            setTimeout(() => {
                this.$vs.loading.close()
            }, 1000)

        },
        loadProjectsAprovad() {
            setTimeout(() => {
                this.skeletonValue = 0
            }, 1500)
        },

        indexTabLoad() {
            let resp = this;
            let indexTab = window.localStorage.getItem('indexTab')
            if (indexTab) {
                this.valueTabPosition = indexTab
                window.localStorage.removeItem('indexTab');
                setTimeout(() => {
                    resp.skeletonValue = 0
                }, 1500)
            }

            if (indexTab == 2) {
                // alert('hola');
                // $('html,body').animate({
                //         scrollTop: $(".tabConfiguration").offset().top},
                //     'slow');
            }

        }
    },
    mounted() {
        this.getDataUser();
        this.$vs.loading({color: this.colorLoading})
        this.indexTabLoad();
    }

}
</script>

<style scoped>

</style>
