let cart = JSON.parse(localStorage.getItem('cart')) || [];

const updateCartDisplay = () => {
  const itemsDiv = document.getElementById('cart-items');
  const countSpan = document.getElementById('cart-count');
  const totalSpan = document.getElementById('cart-total');

  itemsDiv.innerHTML = '';
  let total = 0;

  cart.forEach(item => {
    total += item.price * item.qty;
    itemsDiv.innerHTML += `
      <div class="item">
        <span>${item.name}</span>
        <input type="number" value="${item.qty}" min="1" class="qty" data-id="${item.id}">
        <span>$${(item.price * item.qty).toFixed(2)}</span>
        <button class="remove" data-id="${item.id}">❌</button>
      </div>
    `;
  });

  totalSpan.textContent = total.toFixed(2);
  countSpan.textContent = cart.reduce((sum, i) => sum + i.qty, 0);
  localStorage.setItem('cart', JSON.stringify(cart));
};

document.querySelectorAll('.add-to-cart').forEach(btn => {
  btn.addEventListener('click', e => {
    const id = e.target.dataset.id;
    const name = e.target.parentElement.querySelector('h3').innerText;
    const price = parseFloat(e.target.parentElement.querySelector('p').innerText.replace('$', ''));

    const existing = cart.find(i => i.id === id);
    if (existing) existing.qty++;
    else cart.push({ id, name, price, qty: 1 });

    updateCartDisplay();
  });
});

document.addEventListener('click', e => {
  if (e.target.classList.contains('remove')) {
    cart = cart.filter(i => i.id !== e.target.dataset.id);
    updateCartDisplay();
  }
});

document.addEventListener('change', e => {
  if (e.target.classList.contains('qty')) {
    const id = e.target.dataset.id;
    const item = cart.find(i => i.id === id);
    const newQty = parseInt(e.target.value);
    if (newQty > 0) {
      item.qty = newQty;
      updateCartDisplay();
    }
  }
});

updateCartDisplay();

