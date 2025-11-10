document.addEventListener("DOMContentLoaded", () => {
  _valida_sessao();
});

document.getElementById("enviar").addEventListener("click", () => {
  novo();
});

async function novo() {
  var items = document.getElementById("items").value;
  var status = document.getElementById("status").value;
  var valor = document.getElementById("valor").value;
  var datapedido = document.getElementById("datapedido").value;

  const fd = new FormData();
  fd.append("items", items);
  fd.append("status", status);
  fd.append("valor", valor);
  fd.append("datapedido", datapedido);

  const retorno = await fetch("../php/pedido_novo.php", {
    method: "POST",
    body: fd,
  });
  const resposta = await retorno.json();
  if (resposta.status == "ok") {
    alert("SUCESSO: " + resposta.mensagem);
    window.location.href = "../pedido/";
  } else {
    alert("ERRO: " + resposta.mensagem);
  }
}
