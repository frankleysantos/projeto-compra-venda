<template lang="">
    <!-- a mensagem:
        quem criou a oferta_id Oferta -> user_id
        quem faz a oferta -> Auth::user()->id -->
    <div>
        negociação: {{oferta_id}}
        <div class="row">
            <div class="col-md">
                
            </div>
        </div>
        <div class="row">
            <div class="col-md">
                
            </div>
        </div>
        <div class="row">
            <div class="col-md d-flex justify-content-end">
                <b-button v-b-toggle.sidebar-1 variant="info">Mensagem</b-button>
            </div>
        </div>


        <!-- sidebar de chat -->
        <b-sidebar id="sidebar-1" title="Meu Chat" shadow>
            <div class="px-3 py-2">
                <div class="row form-group">
                    <div class="col-md">
                        as mensagens
                    </div>
                </div>
                <b-form-textarea
                    id="textarea"
                    v-model="text"
                    placeholder="Envie sua mensagem"
                    rows="3"
                    max-rows="6"
                    >
                </b-form-textarea>
            </div>
        </b-sidebar>
    </div>
</template>
<script>
export default {
    props: ['oferta_id']
}
</script>
<style lang="">
    
</style>