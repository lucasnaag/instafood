 mostrar_abas(this);
function mostrar_abas(obj) {
    
         document.getElementById('configUm').style.display="none";
          document.getElementById('configDois').style.display="none";
          document.getElementById('configTres').style.display="none";
    
       switch (obj.id) {
          case 'mostra_aba1':
          document.getElementById('configUm').style.display="block";
          break
          case 'mostra_aba2':
          document.getElementById('configDois').style.display="block";
          break
          case 'mostra_aba3':
          document.getElementById('configTres').style.display="block";
          break

       }
    }