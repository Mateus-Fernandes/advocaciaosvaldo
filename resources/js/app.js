
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
window.Vue = require('vue');
import { ServerTable } from 'vue-tables-2';
window.moment = require('moment');
window.daterangepicker = require('daterangepicker');




Vue.config.productionTip = false

Vue.use(ServerTable);

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

//Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('ex-clientes', require('./components/MyVuetable.vue').default);
Vue.component('contratos-c', require('./components/Contratos.vue').default);
Vue.component('contratos-t', require('./components/Contratost.vue').default);
Vue.component('processo-v', require('./components/Processos.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app'
});







$('#formularioAjax').on('submit', function(e){
    e.preventDefault();

    $.ajax({
        type: "post",
        url: '/admin/cliente/'+$('#idcliente').val()+'/proprietariosadd',
        beforeSend: function(xhr){xhr.setRequestHeader('X-CSRF-TOKEN', $("#metakey").attr('content'));},      
        data: {
            nome: $('#nomeid').val(),
            cpf: $('#cpfid').val(),
            rg: $('#rgid').val(),
            id_cliente: $('#idcliente').val(),
            participacao: $('#participacaoid').val(),
            nacionalidade: $('#nacionalidadeid').val(),
            estado_civil: $('#estadocid').val(),
            profissao: $('#profid').val(),
            _token: $('#tokens').val()
        },
        datatype: 'html',

        success: function(response){
            console.log(response);
            $("#success").html(response);
            $("#mensagemsuc").show();
            $("#mensagemsuc").text("Proprietário adicionado com sucesso! ");
        },
        error: function (data, textStatus, errorThrown) {
            console.log(data);

            console.log();
    
        },        
    });
    
});      

$(document).ready(function(){
    $('.contrato_c input').change(function () {
      

      var lg = this.files.length; // get length
      var items = this.files;
      if (lg > 0) {
        for (var i = 0; i < lg; i++) {
            var fileName = items[i].name;
            $('.contrato_c p').text(fileName + " arquivo selecionado");
        }
      }      

    });
    $('.contrato input').change(function () {
      

        var lg = this.files.length; // get length
        var items = this.files;
        if (lg > 0) {
          for (var i = 0; i < lg; i++) {
              var fileName = items[i].name;
              $('.contrato p').text(fileName + " arquivo selecionado");
          }
        }      
  
      });
      $('.procuracao input').change(function () {
      

        var lg = this.files.length; // get length
        var items = this.files;
        if (lg > 0) {
          for (var i = 0; i < lg; i++) {
              var fileName = items[i].name;
              $('.procuracao p').text(fileName + " arquivo selecionado");
          }
        }      
  
      });
      $('.entrevista input').change(function () {
      

        var lg = this.files.length; // get length
        var items = this.files;
        if (lg > 0) {
          for (var i = 0; i < lg; i++) {
              var fileName = items[i].name;
              $('.entrevista p').text(fileName + " arquivo selecionado");
          }
        }      
  
      });              
  });



