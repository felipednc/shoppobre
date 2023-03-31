const popoverTriggerList = document.querySelectorAll('[data-bs-toggle="popover"]')
const popoverList = [...popoverTriggerList].map(popoverTriggerEl => new bootstrap.Popover(popoverTriggerEl))

const toastTrigger = document.getElementById('liveToastBtn')
const toastLiveExample = document.getElementById('liveToast')

if (toastTrigger) {
  const toastBootstrap = bootstrap.Toast.getOrCreateInstance(toastLiveExample)
  toastTrigger.addEventListener('click', () => {
    toastBootstrap.show()
  })
}

(() => {



  'use strict'


  const forms = document.querySelectorAll('.needs-validation')


  Array.from(forms).forEach(form => {
    form.addEventListener('submit', event => {
      if (!form.checkValidity()) {
        event.preventDefault()
        event.stopPropagation()
      }

      form.classList.add('was-validated')
    }, false)
  })
})()



'user strict';
  const preencherForm = (endereco) => {
    document.getElementById('endereco').value = endereco.logradouro;
    document.getElementById('bairro').value = endereco.bairro;
    document.getElementById('cidade').value = endereco.localidade;
    document.getElementById('estado').value = endereco.uf;
  
  }              


// Implementação de API para Endereço

const pesquisarCEP = async() => {
  const cep = document.getElementById('cep').value;
  const url = `https://viacep.com.br/ws/${cep}/json/`
  const dados = await fetch(url);
  const endereco = await dados.json();
  if(endereco.hasOwnProperty('erro')){
    alert("Cep não encontrado")
  }else {
    preencherForm(endereco)
  }

  preencherForm(endereco);
}

document.getElementById('cep')
        .addEventListener('focusout', pesquisarCEP);

// FIM ENDEREÇO