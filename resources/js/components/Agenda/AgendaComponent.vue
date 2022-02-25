<template>
<div>
  <b-row>
    <b-col md="auto">
      <b-calendar v-model="data" locale="pt-BR" @context="agendaData"></b-calendar>
    </b-col>
    <b-col>
      <b-row>
        <b-col>
                <b-form-group
                label-for="filter-input"
                class="mb-0"
                >
                <b-input-group size="sm">
                    <b-form-input
                    id="filter-input"
                    v-model="filter"
                    type="search"
                    placeholder="Filtrar por nome"
                    ></b-form-input>

                    <b-input-group-append>
                    <b-button :disabled="!filter" @click="filter = ''">Limpar</b-button>
                    </b-input-group-append>
                </b-input-group>
                </b-form-group>
        </b-col>
        <b-col>
                <b-form-group
                label="Por página"
                label-for="per-page-select"
                label-cols-md="4"
                label-align-sm="right"
                label-size="sm"
                class="mb-0"
                >
                <b-form-select
                    id="per-page-select"
                    v-model="perPage"
                    :options="pageOptions"
                    size="sm"
                ></b-form-select>
                </b-form-group>
        </b-col>

        <b-col>
                <b-pagination
                v-model="currentPage"
                :total-rows="totalRows"
                :per-page="perPage"
                align="fill"
                size="sm"
                >
                </b-pagination>
        </b-col>
      </b-row>
      <b-table striped hover :items="agendados" :fields="fields" :current-page="currentPage" :per-page="perPage" :filter="filter">
        <template #cell(status)="row">
               <div v-if="row.item.status == 'agendado'">
                 <div v-if="
                        moment(row.item.data).format('DD') == moment().format('DD')
                        && moment(row.item.data).format('MM') == moment().format('MM')
                        && moment(row.item.data).format('YYYY') == moment().format('YYYY')
                ">
                <div v-if="user.perfil === 'veterinario' && user.status === 'ativado' && row.item.executado_por === 'veterinario'">
                  <b-link variant="outline-info" size="sm" :href="'/pets/public/historico/show/'+row.item.pet_id+'/'+row.item.agenda_id">Atender</b-link>
                </div>
                </div>
                <div v-else>Ajuste [Cancelar / Faltante]</div>
                 
               </div>
               <div v-else-if="row.item.status == 'cancelado'">
                 <b-badge show variant="danger" s>Cancelado</b-badge>
               </div>
               <div v-else-if="row.item.status == 'faltante'">
                 <b-badge show variant="warning">faltante</b-badge>
               </div>
               <div v-else-if="row.item.status == 'atendido'">
                 <b-badge show variant="success">atendido</b-badge>
               </div>
        </template>
      </b-table>
    </b-col>
  </b-row>
</div>
</template>

<script>
import moment from 'moment';
  export default {
    created() {
      this.user.perfil = this.perfil
      this.user.status = this.status

      console.log(this.perfil);
    },
    components: { moment },
    data() {
      return {
        user: {
          perfil: null,
          status: null
        },
        data: '',
        agendados: [],
        filter: null,
        filterOn: [],
        totalRows: 0,
        currentPage: 1,
        perPage: 5,
        pageOptions: [5, 25, 50, { value: 100, text: "Mostrar Todos" }],
        fields:[
            {
                label: 'Pet',
                key: "pet",
                sortable: true
            },
            {
                label: 'Serviço',
                key: "servico",
                sortable: true
            },
            {
                label: 'Hora',
                key: "hora",
                sortable: true
            },
            {
                label: 'Observação',
                key: "observacao",
                sortable: true
            },
            {
              label: 'Status',
              key: 'status',
            }
        ],
      }
    },
    methods: {
        agendaData: function() {
          
          if(this.data == ''){
            this.data = moment().format('YYYY-MM-DD');
          }
          return this.$store.dispatch('showAgenda', this.data)
                      .then((e) => {
                        this.agendados = this.$store.state.agenda.agendados;
                        // console.log(this.agendados);
                        this.totalRows = this.agendados.length;
                      })
        }
    },
    props: { 
      perfil: {
        default: 'atendente',
      }, 
      status: {
        default: 'ativado',
      }
    }
  }
</script>