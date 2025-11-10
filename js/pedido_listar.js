document.addEventListener("DOMContentLoaded", () => {
  _valida_sessao();
  buscar();
});

document.getElementById("novo").addEventListener("click", () => {
  window.location.href = "pedido_novo.html";
});

document.getElementById("logoff").addEventListener("click", () => {
  logoff();
});

async function logoff() {
  const retorno = await fetch("../php/_cliente_logoff.php");
  const resposta = await retorno.json();
  if (resposta.status == "ok") {
    window.location.href = "../";
  }
}
async function buscar() {
  const retorno = await fetch("../php/pedido_get.php");
  const resposta = await retorno.json();
  if (resposta.status == "ok") {
    preencherTabela(resposta.data);
  }
}

async function excluir(id) {
  const retorno = await fetch("../php/pedido_excluir.php?id=" + id);
  const resposta = await retorno.json();
  if (resposta.status == "ok") {
    alert(resposta.mensagem);
    window.location.reload();
  } else {
    alert(resposta.mensagem);
  }
}

function preencherTabela(tabela) {
  var html = `
        <table class="table table-striped">
            <tr class="table-dark">
                <th> # </th>
                <th> Items </th>
                <th> Status </th>
                <th> Valor </th>
                <th> Data </th>
                <th> </th>
            </tr>`;
  for (var i = 0; i < tabela.length; i++) {
    html += `
            <tr>
                <td>${i + 1}</td>
                <td>${tabela[i].items}</td>
                <td>${tabela[i].status}</td>
                <td>${tabela[i].valor}</td>
                <td>${tabela[i].datapedido}</td>
                <td>
                    <a class="btn btn-primary" href='pedido_alterar.html?id=${
                      tabela[i].id
                    }'>Alterar</a>
                    <a class="btn btn-danger" href='#' onclick='excluir(${
                      tabela[i].id
                    })'>Excluir</a>
                </td>
            </tr>
        `;
  }
  html += "</table>";
  document.getElementById("lista").innerHTML = html;
}
