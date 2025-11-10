document.addEventListener("DOMContentLoaded", () => {
  _valida_sessao();
  const url = new URLSearchParams(window.location.search);
  const id = url.get("id");
  buscar(id);
});

async function buscar(id) {
  const retorno = await fetch("../php/categoria_get.php?id=" + id);
  const resposta = await retorno.json();
  if (resposta.status == "ok") {
    var registro = resposta.data[0];
    document.getElementById("nome").value = registro.nome;
    document.getElementById("descricao").value = registro.descricao;
    document.getElementById("id").value = id;
  } else {
    alert("ERRO:" + resposta.mensagem);
    window.location.href = "../categoria/";
  }
}

document.getElementById("enviar").addEventListener("click", () => {
  alterar();
});

async function alterar() {
  var nome = document.getElementById("nome").value;
  var descricao = document.getElementById("descricao").value;
  var id = document.getElementById("id").value;

  const fd = new FormData();
  fd.append("nome", nome);
  fd.append("descricao", descricao);

  const retorno = await fetch("../php/categoria_alterar.php?id=" + id, {
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
