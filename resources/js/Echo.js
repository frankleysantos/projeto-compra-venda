
import store from './store/store';

Echo.join('chat')
        .here(users => {
            // console.log(users)
        })
        .joining(user => {
            // console.log(user)
        })
        .leaving(user => {
            // console.log(user);
        })
        .listen('ChatMessagemEnviada', e => {
            // console.log(dados);
            store.commit('STORE_MENSAGEM', e)
        })