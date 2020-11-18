<template>
    <div>
        <form-wizard title=""
                     subtitle=""
                     color="#000000"
        >
            <tab-content class="tab1Informacion" title="Información Personal"
                         icon="ti-user">
                <div class="row">
                    <div class="col-12 col-lg-6 col-md-6">
                        <div class="form-group input-material">
                            <input type="text" class="form-control"  required>
                            <label for="name">Name</label>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 col-md-6">
                        <div class="form-group input-material">
                            <input type="text" class="form-control" required>
                            <label for="name">Last Name</label>
                        </div>
                    </div>
                </div>

            </tab-content>
            <tab-content title="Información Proyecto"
                         icon="ti-settings">
                My second tab content
            </tab-content>
        </form-wizard>
    </div>
</template>

<script>
export default {
name: "submit-project"
}
</script>

<style>
#step-InformaciónPersonal0 .wizard-icon-container{
    display: none !important;
}
#step-InformaciónPersonal0{
    display: none !important;
}
#step-InformaciónProyecto2 .wizard-icon-container{
    display: none !important;
}
#step-InformaciónProyecto2{
    display: none !important;
}
.wizard-progress-with-circle{
    display: none !important;
}
.tab1Informacion .active a{
    border-right: black 0.15rem solid;
}


</style>
