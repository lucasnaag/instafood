novoPost(this);
function novoPost(obj) {

        document.getElementById('novaReceita').style.display="none";  
       switch (obj.id) {
          case 'mostraReceita':
          document.getElementById('novaReceita').style.display="block";
       }
    }