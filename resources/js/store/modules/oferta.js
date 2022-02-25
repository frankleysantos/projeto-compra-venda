import Axios from "axios"

export default {

    state: {
        ofertas: []
    },

    mutations:{
       SHOW_OFERTAS(state, show_ofertas){
            state.ofertas = show_ofertas;
       },
       NOVA_OFERTA(state, nova_oferta){
        state.ofertas.push(nova_oferta);  
       },
    //    UPDATE_AGENDADO(state, agenda) {
    //     //    console.log(agenda.agenda_id);
    //        let index = state.agendados.findIndex(ag => ag.id == agenda.agenda_id)
    //        if(index == -1) {
    //            var count = 0
    //            state.agendados.map((item) => {
    //             if(item.agenda_id === agenda.agenda_id){
    //                 state.agendados[count].status = agenda.status;
    //             }
    //             count++;
    //            })
    //        }
    //    }
    },

    actions:{
        storeOferta(context, parametros){
            return Axios.post('oferta/store', parametros)
                        .then(response => context.commit('NOVA_OFERTA',response.data));
        },
        // editPaciente(context,id){
        //     return Axios.get('paciente/edit/'+id)
        //                 .then(response => context.commit('GET_PACIENTE',response.data));
        // },
        minhasOfertas(context){
            return Axios.get('oferta/show/')
                        .then(response=> context.commit('SHOW_OFERTAS', response.data))
        },
        showAgendamentosPet(context, parametro){
            return Axios.get('agenda/pet/'+parametro)
                        .then(response=> context.commit('SHOW_AGENDADOS', response.data))
        },
        alterarStatusAgenda(context, parametros){
            return Axios.post('agenda/update/status', parametros)
                        .then(response => context.commit('UPDATE_AGENDADO', response.data))
        },
        // deletePaciente(context,id, state){
        //     return Axios.get('paciente/delete/'+id)
        //                 .then(() => context.commit('DEL_PACIENTE', id));
        // },
    },

    getters:{
       
    }
}