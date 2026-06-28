const products=[
  {name:'Linen Tote Bag',price:1299,cat:'Bags',tag:'Bestseller',tc:'badge-accent',img:'🛍️',desc:'Natural linen, reinforced handles'},
  {name:'Ceramic Mug Set',price:849,cat:'Kitchen',tag:'New',tc:'badge-success',img:'☕',desc:'Set of 4, dishwasher safe'},
  {name:'Wool Throw Blanket',price:2499,cat:'Home',tag:'Limited',tc:'badge-warning',img:'🧶',desc:'100% Merino wool'},
  {name:'Bamboo Notebook',price:499,cat:'Stationery',tag:'Sale',tc:'badge-danger',img:'📔',desc:'A5 size, 160 pages'},
  {name:'Cotton Tshirt',price:699,cat:'Apparel',tag:'New',tc:'badge-success',img:'👕',desc:'Organic cotton, unisex'},
  {name:'Glass Water Bottle',price:599,cat:'Kitchen',tag:'Popular',tc:'badge-accent',img:'🍶',desc:'1L, BPA-free borosilicate'},
  {name:'Jute Cushion Cover',price:399,cat:'Home',tag:'Sale',tc:'badge-danger',img:'🛋️',desc:'45×45cm, handwoven'},
  {name:'Leather Wallet',price:1599,cat:'Bags',tag:'Premium',tc:'badge-gray',img:'👜',desc:'Full-grain leather, 6 slots'},
];
let cartCount=2;
let filtered=products;

function renderProducts(list){
  const g=document.getElementById('prod-grid');
  g.innerHTML=list.map(p=>`
  <div class="card" style="cursor:pointer;transition:border-color 0.15s" onmouseover="this.style.borderColor='var(--border-accent)'" onmouseout="this.style.borderColor='var(--border)'">
    <div style="background:var(--surface-1);border-radius:8px;height:90px;display:flex;align-items:center;justify-content:center;font-size:34px;margin-bottom:10px">${p.img}</div>
    <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:3px">
      <span style="font-size:10px;color:var(--text-muted)">${p.cat}</span>
      <span class="badge ${p.tc}" style="font-size:9px;padding:2px 6px">${p.tag}</span>
    </div>
    <div style="font-size:13px;font-weight:500;margin-bottom:2px">${p.name}</div>
    <div style="font-size:11px;color:var(--text-muted);margin-bottom:6px">${p.desc}</div>
    <div style="display:flex;align-items:center;justify-content:space-between">
      <span style="font-size:14px;color:var(--text-accent);font-weight:500">₹${p.price.toLocaleString()}</span>
      <button class="btn btn-primary btn-sm" onclick="addToCart()"><i class="ti ti-plus" aria-hidden="true"></i> Add</button>
    </div>
  </div>`).join('');
}
renderProducts(products);

function filterProducts(q){
  filtered=products.filter(p=>p.name.toLowerCase().includes(q.toLowerCase())||p.cat.toLowerCase().includes(q.toLowerCase()));
  renderProducts(filtered);
}
function filterCat(c){
  filtered=c?products.filter(p=>p.cat===c):products;
  renderProducts(filtered);
}
function addToCart(){
  cartCount++;
  document.getElementById('cart-count').textContent=cartCount;
  const el=document.getElementById('cart-count');
  el.style.transform='scale(1.4)';
  setTimeout(()=>el.style.transform='scale(1)',200);
}
function showPage(id){
  document.querySelectorAll('.page').forEach(p=>p.classList.remove('active'));
  document.querySelectorAll('.nav-btn').forEach(b=>b.classList.remove('active'));
  document.getElementById('page-'+id).classList.add('active');
  const map={home:0,products:1,orders:2,admin:3,cart:-1};
  const btns=document.querySelectorAll('.nav-btn');
  if(map[id]>=0) btns[map[id]].classList.add('active');
}
function placeOrder(){
  showPage('orders');
  const el=document.querySelector('#page-orders');
  el.insertAdjacentHTML('afterbegin',`<div style="background:var(--bg-success);color:var(--text-success);padding:10px 1.5rem;font-size:13px;display:flex;align-items:center;gap:6px"><i class="ti ti-circle-check"></i> Order placed! You'll get a confirmation email shortly.</div>`);
  setTimeout(()=>el.querySelector('div').remove(),4000);
}
function showOrderDetail(id){
  const d=document.getElementById('order-detail');
  document.getElementById('order-detail-id').textContent='Order '+id;
  d.style.display='block';
  d.scrollIntoView({behavior:'smooth'});
}
