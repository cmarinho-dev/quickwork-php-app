document.addEventListener("DOMContentLoaded", () => {
  _valida_sessao();
});

document.getElementById("enviar").addEventListener("click", () => {
  novo();
});

async function novo() {
  var nome = document.getElementById("nome").value;
  var especialidade = document.getElementById("especialidade").value;
  var disponibilidade = document.getElementById("disponibilidade").value;

  const fd = new FormData();
  fd.append("nome", nome);
  fd.append("especialidade", especialidade);
  fd.append("disponibilidade", disponibilidade);

  const retorno = await fetch("../php/prestador_novo.php", {
    method: "POST",
    body: fd,
  });
  const resposta = await retorno.json();
  if (resposta.status == "ok") {
    alert("SUCESSO: " + resposta.mensagem);
    window.location.href = "../prestador/";
  } else {
    alert("ERRO: " + resposta.mensagem);
  }
}
