require('./bootstrap');
window.Vue = require('vue');
Vue.component('message', require('./components/MessageComponent.vue'));
Vue.component('sent-message', require('./components/SentComponent.vue'));
const app = new Vue({
    el: '#app',
    data: {
        messages : []
    },
    mounted()
    {
        this.fetchMessages();
        Echo.private('chat')
            .listen('MessageSentEvent',(e) => {
                this.messages.push({
                    message:e.message.message,
                    user : e.user
                })
            })
    },
    methods:{
        addMessage(message){
            this.messages.push(message)
            axios.post('/messages',message).then(response =>{
                //console.log(response)
            })
        },
        fetchMessages(){
            axios.get('/messages').then(response => {
                this.messages = response.data
            })
        }
    }
});
