import Axios from "axios"

export default {

    state: {
        users: []
    },

    mutations:{
        SHOW_USERS(state, show_users){
            state.users = show_users;
       },
    },

    actions:{
        usuariosOnline(context, parametro){
            return Axios.post("../../../users/show", parametro)
                        .then(response=> context.commit('SHOW_USERS', response.data))
        },

    },
}