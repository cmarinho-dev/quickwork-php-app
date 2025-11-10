document.addEventListener("DOMContentLoaded", () => {
  _valida_sessao();
  const url = new URLSearchParams(window.location.search);
  const id = url.get("id");
  buscar(id);
});

async function buscar(id) {
  const retorno = await fetch("../php/pedido_get.php?id=" + id);
  const resposta = await retorno.json();
  if (resposta.status == "ok") {
    var registro = resposta.data[0];
    document.getElementById("items").value = registro.items;
    document.getElementById("status").value = registro.status;
    document.getElementById("valor").value = registro.valor;
    document.getElementById("data").value = registro.datapedido;
    document.getElementById("id").value = id;
  } else {
    alert("ERRO:" + resposta.mensagem);
    window.location.href = "../pedido/";
  }
}

document.getElementById("enviar").addEventListener("click", () => {
  alterar();
});

async function alterar() {
  var items = document.getElementById("items").value;
  var status = document.getElementById("status").value;
  var valor = document.getElementById("valor").value;
  var data = document.getElementById("data").value;
  var id = document.getElementById("id").value;

  const fd = new FormData();
  fd.append("items", items);
  fd.append("status", status);
  fd.append("valor", valor);
  fd.append("data", data);

  const retorno = await fetch("../php/pedido_alterar.php?id=" + id, {
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
