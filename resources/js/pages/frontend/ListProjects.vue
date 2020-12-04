<template>
    <div class="pt-5">
        <div v-if="skeletonValue == 1">
            <div class="row">
                <div class="col-6 col-md-4 col-lg-4" v-for="skele in 6">
                    <SkeletonCard
                        primary="#fafafa"
                        structure="7013"
                        borderRadius="0px"
                        animTimingFunction="ease-in"/>
                </div>
            </div>
<!--            <div class="row">-->
<!--                <div class="col-4">-->
<!--                    <div class="card">-->
<!--                        <img src="https://dynamic-media-cdn.tripadvisor.com/media/photo-o/18/a6/fc/41/casa-el-paraiso.jpg?w=600&h=300&s=1" class="card-img-top" alt="">-->
<!--                        <div class="card-body">-->
<!--                            <h5 class="card-title pl-3">Crea Sonidos Pacifico</h5>-->
<!--                            <h6 class="card-subtitle mb-2 text-muted pl-3">Musica</h6>-->

<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
        </div>
        <div class="row" v-if="skeletonValue == 0">
            <div v-for="card in data.data" :key="card.id" class="col-6 col-md-4 col-lg-4 pb-4">
                <div class="card">
                    <img src="https://dynamic-media-cdn.tripadvisor.com/media/photo-o/18/a6/fc/41/casa-el-paraiso.jpg?w=600&h=300&s=1" class="card-img-top" alt="">
                    <div class="card-body">
                        <h5 class="card-title pl-3">Crea Sonidos Pacifico</h5>
                        <h6 class="card-subtitle mb-2 text-muted pl-3">Musica</h6>

                    </div>
                </div>
            </div>
        </div>

    </div>
</template>

<script>
export default {
    name: "ListProjects",

    data() {
        return {
            data: [],
            skeletonValue: 1,
        }
    },

    methods: {
        getListProjects() {
            axios
                .get('/api/projects/get-list-projects')
                .then(res => {
                    setTimeout(() => {
                        this.skeletonValue = 0
                    }, 1000)
                    this.data = res.data

                })
                .catch(err => {
                    this.$toast.error({
                        title: 'Error',
                        message: err,
                        showDuration: 1000,
                        hideDuration: 5000,
                        position: 'top right',
                    })
                })

        }
    },
    mounted() {
        this.getListProjects();
    }

}
</script>

<style scoped>

</style>
