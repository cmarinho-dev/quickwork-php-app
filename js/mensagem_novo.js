document.addEventListener("DOMContentLoaded", () => {
  _valida_sessao();
});

document.getElementById("enviar").addEventListener("click", () => {
  novo();
});

async function novo() {
  var remetente = document.getElementById("remetente").value;
  var destinatario = document.getElementById("destinatario").value;
  var conteudo = document.getElementById("conteudo").value;

  const fd = new FormData();
  fd.append("remetente", remetente);
  fd.append("destinatario", destinatario);
  fd.append("conteudo", conteudo);

  const retorno = await fetch("../php/mensagem_novo.php", {
    method: "POST",
    body: fd,
  });
  const resposta = await retorno.json();
  if (resposta.status == "ok") {
    alert("SUCESSO: " + resposta.mensagem);
    window.location.href = "../mensagem/";
  } else {
    alert("ERRO: " + resposta.mensagem);
  }
}
