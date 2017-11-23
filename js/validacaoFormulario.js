
function validar() {

  if (formCadastro.nome.value == "") {
  alert('Nome não preenchido');
  document.formCadastro.nome.focus();
  return false;
  }
  if (formCadastro.sobrenome.value == "") {
    alert('Sobrenome não preenchido');
    document.formCadastro.sobrenome.focus();
    return false;
    }
  if (formCadastro.nascimento.value == "") {
      alert('Data de nascimento não preenchida');
      document.formCadastro.nascimento.focus();
      return false;
      }
    if (document.formCadastro.sexo[0].checked  == false && document.formCadastro.sexo[1].checked == false && document.formCadastro.sexo[2].checked == false)  {
      alert('Selecione o seu sexo');
      return false;
      }
      if (formCadastro.telefone.value == "") {
        alert('Telefone não preenchido');
        document.formCadastro.telefone.focus();
        return false;
        }
    if (formCadastro.email.value == "") {
      alert('Email não preenchido');
      document.formCadastro.email.focus();
      return false;
      }
    if (formCadastro.password.value == "") {
      alert('Senha não preenchida');
      document.formCadastro.password.focus();
      return false;
      }
    if (document.formCadastro.termos.checked == false) {
      alert('É necessário concordar com os termos de uso para realização do cadastro!');
      document.formCadastro.termos.focus();
      return false;
        }
}
