document.addEventListener("DOMContentLoaded", () => {
  _valida_sessao();
});

document.getElementById("enviar").addEventListener("click", () => {
  novo();
});

async function novo() {
  var nome = document.getElementById("nome").value;
  var descricao = document.getElementById("descricao").value;

  const fd = new FormData();
  fd.append("nome", nome);
  fd.append("descricao", descricao);

  const retorno = await fetch("../php/categoria_novo.php", {
    method: "POST",
    body: fd,
  });
  const resposta = await retorno.json();
  if (resposta.status == "ok") {
    alert("SUCESSO: " + resposta.mensagem);
    window.location.href = "../categoria/";
  } else {
    alert("ERRO: " + resposta.mensagem);
  }
}
