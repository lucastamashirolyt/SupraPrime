// FILE: JS/script.js

// Inicializa o carrinho a partir do localStorage ou como array vazio
let cart = JSON.parse(localStorage.getItem('cart')) || [];

// Função para exibir alertas
function mostrarAlerta(mensagem, tipo) {
    const alerta = obterAlerta();
    alerta.className = `alert alert-${tipo}`;
    alerta.textContent = mensagem;
    alerta.classList.remove('d-none');

    setTimeout(() => {
        alerta.classList.add('d-none');
    }, 3000);
}

function obterAlerta() {
    let alerta = document.getElementById('alerta');
    if (!alerta) {
        alerta = document.createElement('div');
        alerta.id = 'alerta';
        alerta.className = `alert d-none`;
        alerta.setAttribute('role', 'alert');
        document.body.appendChild(alerta);
    }
    return alerta;
}

// Função para alternar o menu
function menutoggle() {
    const menuItems = document.getElementById('MenuItems');
    const menuIcon = document.querySelector('.menu-icon');
    if (menuItems.style.maxHeight === '0px' || menuItems.style.maxHeight === '') {
        menuItems.style.maxHeight = '200px'; // Ajuste conforme necessário
        menuItems.classList.add('active');
        menuIcon.classList.add('change');
    } else {
        menuItems.style.maxHeight = '0px';
        menuItems.classList.remove('active');
        menuIcon.classList.remove('change');
    }
}

// Inicializa o estado do menu
document.addEventListener('DOMContentLoaded', function () {
    const menuItems = document.getElementById('MenuItems');
    if (menuItems) {
        menuItems.style.maxHeight = '0px';
    }
});

// Função para adicionar produto ao carrinho
function adicionarAoCarrinho(id) {
    fetch(`../backend/api/getProductsById.php?id=${id}`)
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                const produto = data.produto;
                const existe = cart.find(item => item.id === produto.id);
                if (existe) {
                    mostrarAlerta('Produto já está no carrinho.', 'warning');
                } else {
                    cart.push(produto);
                    mostrarAlerta('Produto adicionado ao carrinho!', 'success');
                    atualizarCarrinho();
                }
            } else {
                mostrarAlerta(data.message || 'Erro ao adicionar produto ao carrinho.', 'danger');
            }
        })
        .catch(error => {
            console.error('Erro:', error);
            mostrarAlerta('Erro ao adicionar produto ao carrinho.', 'danger');
        });
}

// Função para atualizar o carrinho na Sidebar
function atualizarCarrinho() {
    const cartItems = document.getElementById('cartItems');
    if (cartItems) {
        cartItems.innerHTML = '';
        cart.forEach(produto => {
            const div = document.createElement('div');
            div.classList.add('cart-item', 'd-flex', 'align-items-center', 'mb-2');

            const img = document.createElement('img');
            img.src = produto.imagem;
            img.alt = produto.nome;
            img.width = 50;
            img.classList.add('mr-2');
            div.appendChild(img);

            const span = document.createElement('span');
            span.textContent = produto.nome;
            span.classList.add('mr-auto');
            div.appendChild(span);

            const preco = document.createElement('span');
            preco.textContent = `R$ ${produto.preco.toFixed(2)}`;
            preco.classList.add('mr-2');
            div.appendChild(preco);

            const btnRemover = document.createElement('button');
            btnRemover.textContent = 'Remover';
            btnRemover.classList.add('btn', 'btn-danger', 'btn-sm');
            btnRemover.onclick = () => removerDoCarrinho(produto.id);
            div.appendChild(btnRemover);

            cartItems.appendChild(div);
        });
    }
    // Salva o carrinho no localStorage
    localStorage.setItem('cart', JSON.stringify(cart));
}

// Função para remover produto do carrinho
function removerDoCarrinho(id) {
    cart = cart.filter(produto => produto.id !== id);
    atualizarCarrinho();
    mostrarAlerta('Produto removido do carrinho.', 'success');
}

// Função para finalizar compra
function checkout() {
    if (cart.length === 0) {
        mostrarAlerta('Seu carrinho está vazio.', 'warning');
        return;
    }
    // Implementar a lógica de finalização de compra (ex: redirecionar para pagamento)
    mostrarAlerta('Compra finalizada com sucesso!', 'success');
    cart = [];
    atualizarCarrinho();
    toggleCart();
}

// Função para alternar o carrinho Sidebar
function toggleCart() {
    const cartSidebar = document.getElementById("cartSidebar");
    const overlay = document.getElementById("overlay");
    if (cartSidebar && overlay) {
        if (cartSidebar.style.right === "-300px" || cartSidebar.style.right === "") {
            cartSidebar.style.right = "0px";
            overlay.style.display = "block";
        } else {
            cartSidebar.style.right = "-300px";
            overlay.style.display = "none";
        }
    }
}

// LOGIN
document.addEventListener('DOMContentLoaded', function () {
    const loginForm = document.getElementById('loginForm');
    if (loginForm) {
        loginForm.addEventListener('submit', function (event) {
            event.preventDefault();
            const email = document.getElementById('email').value;
            const password = document.getElementById('password').value;

            fetch('../backend/api/loginAPI.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                },
                body: `email=${encodeURIComponent(email)}&password=${encodeURIComponent(password)}`
            })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        mostrarAlerta('Login realizado com sucesso!', 'success');
                        setTimeout(() => {
                            window.location.href = data.role === 'admin' ? 'dashboard.php' : '../index.php';
                        }, 2000); // Redireciona após 2 segundos
                    } else {
                        mostrarAlerta(data.message, 'danger');
                    }
                })
                .catch(error => {
                    console.error('Erro:', error);
                    mostrarAlerta('Erro ao tentar fazer login.', 'danger');
                });
        });
    }
});

// CADASTRO
document.addEventListener('DOMContentLoaded', function () {
    const registerForm = document.getElementById('registerForm');
    if (registerForm) {
        registerForm.addEventListener('submit', function (event) {
            event.preventDefault();
            const formData = new FormData(registerForm);
            const data = {};
            formData.forEach((value, key) => {
                data[key] = value;
            });

            fetch('../backend/api/register.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(data)
            })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        mostrarAlerta('Usuário cadastrado com sucesso!', 'success');
                        setTimeout(() => {
                            window.location.href = 'login.php'; // Redirecionar para a página de login
                        }, 2000); // Redireciona após 2 segundos
                    } else {
                        mostrarAlerta(data.message, 'danger');
                    }
                })
                .catch(error => {
                    console.error('Erro:', error);
                    mostrarAlerta('Erro ao tentar registrar.', 'danger');
                });
        });
    }
});

// Função para atualizar a lista de produtos (Admin)
function atualizarListaProdutos() {
    fetch('../backend/api/getProducts.php')
        .then(response => response.json())
        .then(data => {
            console.log('Resposta do servidor:', data); // Log para depuração
            if(data.success){
                const listaProdutos = document.getElementById('listaProdutos').querySelector('tbody');
                listaProdutos.innerHTML = '';
                data.produtos.forEach(produto => {
                    const preco = parseFloat(produto.preco); // Converte para número
                    const tr = document.createElement('tr');
                    tr.innerHTML = `
                        <td>${produto.id}</td>
                        <td>${produto.nome}</td>
                        <td>R$${preco.toFixed(2)}</td>
                        <td><img src="${produto.imagem}" alt="${produto.nome}" width="50"></td>
                        <td>
                            <button onclick="editarProduto(${produto.id}, '${produto.nome}', ${preco}, '${produto.imagem}')">Editar</button>
                            <button onclick="removerProduto(${produto.id})">Remover</button>
                        </td>
                    `;
                    listaProdutos.appendChild(tr);
                });
            } else {
                mostrarAlerta(data.message || 'Erro ao carregar produtos.', 'danger');
            }
        })
        .catch(error => {
            console.error('Erro:', error);
            mostrarAlerta('Erro ao carregar produtos.', 'danger');
        });
}

// Função para remover produto (Admin)
function removerProduto(id) {
    if (confirm('Tem certeza que deseja deletar este produto?')) {
        fetch(`../backend/api/deleteProduct.php?id=${id}`, {
            method: 'DELETE'
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                mostrarAlerta('Produto removido com sucesso!', 'success');
                atualizarListaProdutos();
            } else {
                mostrarAlerta('Erro ao remover produto.', 'danger');
            }
        })
        .catch(error => {
            console.error('Erro:', error);
            mostrarAlerta('Erro ao remover produto.', 'danger');
        });
    }
}

// Função para deletar produtos selecionados (Admin)
function deletarProdutosSelecionados() {
    const checkboxes = document.querySelectorAll('.product-checkbox:checked');
    const ids = Array.from(checkboxes).map(cb => cb.getAttribute('data-product-id'));

    if (ids.length === 0) {
        mostrarAlerta('Nenhum produto selecionado para deletar.', 'warning');
        return;
    }

    if (confirm(`Tem certeza que deseja deletar ${ids.length} produto(s)?`)) {
        fetch(`../backend/api/deleteMultipleProducts.php`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ ids })
        })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    atualizarListaProdutos();
                    mostrarAlerta(`${ids.length} produto(s) removido(s) com sucesso!`, 'success');
                    document.getElementById('deleteSelected').disabled = true;
                } else {
                    mostrarAlerta(data.message, 'danger');
                }
            })
            .catch(error => {
                console.error('Erro:', error);
                mostrarAlerta('Erro ao deletar os produtos selecionados.', 'danger');
            });
    }
}

// Função para habilitar/desabilitar o botão de deletar selecionados (Admin)
function toggleDeleteButton() {
    const checkboxes = document.querySelectorAll('.product-checkbox:checked');
    const deleteSelectedButton = document.getElementById('deleteSelected');
    if (deleteSelectedButton) {
        deleteSelectedButton.disabled = checkboxes.length === 0;
    }

    // Atualizar o estado do checkbox "Selecionar Todos"
    const selectAllCheckbox = document.getElementById('selectAll');
    if (selectAllCheckbox) {
        const totalCheckboxes = document.querySelectorAll('.product-checkbox').length;
        const checkedCheckboxes = checkboxes.length;
        selectAllCheckbox.checked = totalCheckboxes > 0 && checkedCheckboxes === totalCheckboxes;
    }
}

// Função para abrir o modal de edição (Admin)
function abrirModalEdicao(produto) {
    document.getElementById('updateId').value = produto.id;
    document.getElementById('updateNome').value = produto.nome;
    document.getElementById('updatePreco').value = produto.preco;
    document.getElementById('updateImagem').value = produto.imagem;

    // Abrir o modal
    $('#updateModal').modal('show');
}

// Função para alternar a visibilidade dos links de login/cadastro e perfil/logout (Index)
function verificarAutenticacao() {
    const profileLink = document.getElementById('profileLink');
    const logoutLink = document.getElementById('logoutLink');
    const loginLink = document.getElementById('loginLink');
    const cadastroLink = document.getElementById('cadastroLink');

    const isLoggedInStatus = verificarSessao();

    if (isLoggedInStatus) {
        profileLink.style.display = 'block';
        logoutLink.style.display = 'block';
        loginLink.style.display = 'none';
        cadastroLink.style.display = 'none';
    } else {
        profileLink.style.display = 'none';
        logoutLink.style.display = 'none';
        loginLink.style.display = 'block';
        cadastroLink.style.display = 'block';
    }
}

// FUNCTION TO HANDLE CREATE PRODUCT (ADMIN)
function criarProduto(dados) {
    fetch('../backend/api/createProduct.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(dados) // 'descricao' is not included
    })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                mostrarAlerta(data.message, 'success');
                formProduto.reset();
                atualizarListaProdutos();
            } else {
                mostrarAlerta(data.message, 'danger');
            }
        })
        .catch(error => {
            console.error('Erro:', error);
            mostrarAlerta('Erro ao adicionar produto.', 'danger');
        });
}

// Manipulador de submissão do formulário de Atualização de Produto (Admin)
const updateForm = document.getElementById('updateForm');
if (updateForm) {
    updateForm.addEventListener('submit', function (e) {
        e.preventDefault();
        const id = document.getElementById('updateId').value;
        const nome = document.getElementById('updateNome').value.trim();
        const preco = parseFloat(document.getElementById('updatePreco').value);
        const imagem = document.getElementById('updateImagem').value.trim();

        if (!nome || isNaN(preco) || !imagem) {
            mostrarAlerta('Por favor, preencha todos os campos corretamente.', 'danger');
            return;
        }

        const dados = { id, nome, preco, imagem };

        fetch('../backend/api/updateProduct.php', {
            method: 'PUT',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(dados) // 'descricao' is not included
        })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    mostrarAlerta(data.message, 'success');
                    updateForm.reset();
                    atualizarListaProdutos();
                    $('#updateModal').modal('hide');
                } else {
                    mostrarAlerta(data.message, 'danger');
                }
            })
            .catch(error => {
                console.error('Erro:', error);
                mostrarAlerta('Erro ao atualizar o produto.', 'danger');
            });
    });
}

// Event Listener para checkbox "Selecionar Todos" (Admin)
const selectAllCheckbox = document.getElementById('selectAll');
if (selectAllCheckbox) {
    selectAllCheckbox.addEventListener('change', function () {
        const checkboxes = document.querySelectorAll('.product-checkbox');
        checkboxes.forEach(cb => cb.checked = this.checked);
        toggleDeleteButton();
    });
}

// Event Listener para checkboxes individuais (Admin)
document.body.addEventListener('change', function (event) {
    if (event.target.classList.contains('product-checkbox')) {
        toggleDeleteButton();
    }
});

// Event Listener para Botão Deletar Selecionados (Admin)
const deleteSelectedButton = document.getElementById('deleteSelected');
if (deleteSelectedButton) {
    deleteSelectedButton.addEventListener('click', deletarProdutosSelecionados);
}

// Event Listener para Botões de Adicionar ao Carrinho (Index)
const addToCartButtons = document.querySelectorAll('.add-to-cart');
addToCartButtons.forEach(button => {
    button.addEventListener('click', function () {
        const productId = this.getAttribute('data-product-id');
        adicionarAoCarrinho(productId);
    });
});

// Initialize the cart display on page load
document.addEventListener('DOMContentLoaded', function() {
    const cartItems = document.getElementById('cartItems');
    if (cartItems) {
        atualizarCarrinho();
    }

    // Hide error message on login/register forms
    var errorMessage = document.getElementById('error-message');
    if (errorMessage) {
        errorMessage.style.display = 'none';
    }
});
