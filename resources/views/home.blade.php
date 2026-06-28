
<style>
*{margin:0;padding:0;box-sizing:border-box}
body{font-family:'Inter',sans-serif;background:#0a0a0f;color:#e2e8f0;overflow-x:hidden}
#canvas-bg{position:fixed;top:0;left:0;width:100%;height:100%;z-index:0;pointer-events:none}
.section{position:relative;z-index:1}
nav{position:fixed;top:0;width:100%;z-index:100;padding:1rem 2rem;display:flex;justify-content:space-between;align-items:center;transition:all .4s ease;backdrop-filter:blur(0px)}
nav.scrolled{background:rgba(10,10,20,.85);backdrop-filter:blur(20px);border-bottom:1px solid rgba(255,255,255,.06);box-shadow:0 4px 30px rgba(0,0,0,.3)}
.nav-logo{font-size:1.4rem;font-weight:700;background:linear-gradient(135deg,#a78bfa,#60a5fa,#34d399);-webkit-background-clip:text;-webkit-text-fill-color:transparent}
.nav-links{display:flex;gap:2rem}
.nav-links a{color:rgba(226,232,240,.7);text-decoration:none;font-size:.9rem;letter-spacing:.05em;transition:color .3s;position:relative}
.nav-links a::after{content:'';position:absolute;bottom:-4px;left:0;width:0;height:1px;background:linear-gradient(90deg,#a78bfa,#60a5fa);transition:width .3s}
.nav-links a:hover{color:#fff}
.nav-links a:hover::after{width:100%}
#hero{min-height:100vh;display:flex;align-items:center;padding:6rem 2rem 2rem;position:relative}
.hero-content{max-width:1100px;margin:0 auto;width:100%;display:flex;align-items:center;gap:4rem}
.hero-text{flex:1}
.hero-greeting{font-size:.95rem;letter-spacing:.2em;color:#a78bfa;text-transform:uppercase;margin-bottom:.8rem;opacity:0;transform:translateY(20px);transition:all .8s ease .2s}
.hero-name{font-size:clamp(2.5rem,6vw,4.5rem);font-weight:800;line-height:1.1;margin-bottom:.8rem;background:linear-gradient(135deg,#fff 0%,#c4b5fd 50%,#60a5fa 100%);-webkit-background-clip:text;-webkit-text-fill-color:transparent;opacity:0;transform:translateY(20px);transition:all .8s ease .4s}
.hero-role{font-size:1.4rem;color:#60a5fa;margin-bottom:1.2rem;opacity:0;transform:translateY(20px);transition:all .8s ease .6s}
.hero-bio{color:rgba(226,232,240,.65);line-height:1.8;margin-bottom:2rem;max-width:500px;opacity:0;transform:translateY(20px);transition:all .8s ease .8s}
.btn-primary{display:inline-flex;align-items:center;gap:.6rem;padding:.85rem 2rem;background:linear-gradient(135deg,#7c3aed,#2563eb);border:none;border-radius:12px;color:#fff;font-size:.95rem;font-weight:600;cursor:pointer;text-decoration:none;transition:all .3s;position:relative;overflow:hidden;opacity:0;transform:translateY(20px);transition:all .8s ease 1s}
.btn-primary::before{content:'';position:absolute;inset:0;background:linear-gradient(135deg,#6d28d9,#1d4ed8);opacity:0;transition:opacity .3s}
.btn-primary:hover::before{opacity:1}
.btn-primary:hover{transform:translateY(-2px);box-shadow:0 8px 25px rgba(124,58,237,.4)}
.hero-avatar{flex:0 0 300px;position:relative;opacity:0;transition:all 1s ease 1.2s}
.avatar-ring{width:300px;height:300px;border-radius:50%;background:linear-gradient(135deg,#7c3aed,#2563eb,#059669);padding:3px;animation:spin 8s linear infinite}
.avatar-img{width:100%;height:100%;border-radius:50%;background:linear-gradient(135deg,#1e1b4b,#0f172a);border:3px solid #0a0a0f;display:flex;align-items:center;justify-content:center;font-size:4rem;color:#a78bfa;overflow:hidden}
.avatar-img img{width:100%;height:100%;object-fit:cover;border-radius:50%}
.avatar-glow{position:absolute;top:50%;left:50%;transform:translate(-50%,-50%);width:340px;height:340px;border-radius:50%;background:radial-gradient(circle,rgba(124,58,237,.3) 0%,transparent 70%);filter:blur(20px);animation:pulse-glow 3s ease-in-out infinite}
@keyframes spin{to{transform:rotate(360deg)}}
@keyframes pulse-glow{0%,100%{transform:translate(-50%,-50%) scale(1);opacity:.6}50%{transform:translate(-50%,-50%) scale(1.1);opacity:1}}
.section-heading{text-align:center;margin-bottom:3rem}
.section-heading h2{font-size:2.2rem;font-weight:700;background:linear-gradient(135deg,#fff,#c4b5fd);-webkit-background-clip:text;-webkit-text-fill-color:transparent}
.section-heading p{color:rgba(226,232,240,.5);margin-top:.5rem;font-size:.95rem}
.divider{width:60px;height:3px;background:linear-gradient(90deg,#7c3aed,#2563eb);border-radius:2px;margin:.8rem auto 0}
#about{padding:6rem 2rem;background:rgba(255,255,255,.01)}
.about-card{max-width:800px;margin:0 auto;background:rgba(255,255,255,.04);border:1px solid rgba(255,255,255,.08);border-radius:24px;padding:2.5rem;backdrop-filter:blur(10px);text-align:center;color:rgba(226,232,240,.75);line-height:1.9;font-size:1.05rem}
#skills{padding:6rem 2rem;background:rgba(124,58,237,.03)}
.skills-grid{max-width:900px;margin:0 auto;display:grid;grid-template-columns:1fr 1fr;gap:1.5rem}
.skill-item{background:rgba(255,255,255,.04);border:1px solid rgba(255,255,255,.08);border-radius:16px;padding:1.2rem 1.5rem;transition:all .3s}
.skill-item:hover{border-color:rgba(124,58,237,.5);background:rgba(124,58,237,.08)}
.skill-name{display:flex;justify-content:space-between;margin-bottom:.8rem;font-size:.9rem}
.skill-label{color:rgba(226,232,240,.85);font-weight:500}
.skill-pct{color:#a78bfa;font-weight:600}
.skill-bar{height:6px;background:rgba(255,255,255,.08);border-radius:3px;overflow:hidden}
.skill-fill{height:100%;background:linear-gradient(90deg,#7c3aed,#2563eb,#059669);border-radius:3px;width:0;transition:width 1.2s cubic-bezier(.4,0,.2,1)}
#services{padding:6rem 2rem}
.services-grid{max-width:1100px;margin:0 auto;display:grid;grid-template-columns:repeat(auto-fit,minmax(260px,1fr));gap:1.5rem}
.service-card{background:rgba(255,255,255,.04);border:1px solid rgba(255,255,255,.06);border-radius:20px;padding:2rem;transition:all .4s;position:relative;overflow:hidden;cursor:default}
.service-card::before{content:'';position:absolute;inset:0;background:linear-gradient(135deg,rgba(124,58,237,.15),rgba(37,99,235,.1));opacity:0;transition:opacity .4s}
.service-card:hover{transform:translateY(-6px);border-color:rgba(124,58,237,.4);box-shadow:0 20px 40px rgba(0,0,0,.3)}
.service-card:hover::before{opacity:1}
.service-icon{width:50px;height:50px;border-radius:14px;background:linear-gradient(135deg,rgba(124,58,237,.3),rgba(37,99,235,.3));display:flex;align-items:center;justify-content:center;margin-bottom:1.2rem;font-size:1.4rem}
.service-card h3{font-size:1.1rem;font-weight:600;margin-bottom:.7rem;color:#fff}
.service-card p{color:rgba(226,232,240,.55);font-size:.9rem;line-height:1.7}
#portfolio{padding:6rem 2rem;background:rgba(255,255,255,.01)}
.projects-grid{max-width:1100px;margin:0 auto;display:grid;grid-template-columns:repeat(auto-fit,minmax(300px,1fr));gap:1.8rem}
.project-card{background:rgba(255,255,255,.04);border:1px solid rgba(255,255,255,.06);border-radius:20px;overflow:hidden;transition:all .4s;position:relative}
.project-card:hover{transform:translateY(-8px);box-shadow:0 25px 50px rgba(0,0,0,.4);border-color:rgba(96,165,250,.4)}
.project-img{width:100%;height:180px;background:linear-gradient(135deg,#1e1b4b,#172554,#064e3b);display:flex;align-items:center;justify-content:center;font-size:3rem;position:relative;overflow:hidden}
.project-img-overlay{position:absolute;inset:0;background:linear-gradient(to bottom,transparent 60%,rgba(0,0,0,.8));opacity:0;transition:opacity .3s}
.project-card:hover .project-img-overlay{opacity:1}
.project-body{padding:1.5rem}
.project-body h4{font-size:1rem;font-weight:600;margin-bottom:.5rem;color:#fff}
.project-body p{color:rgba(226,232,240,.55);font-size:.85rem;line-height:1.6;margin-bottom:1rem}
.btn-outline{display:inline-flex;align-items:center;gap:.4rem;padding:.5rem 1.2rem;border:1px solid rgba(255,255,255,.2);border-radius:8px;color:rgba(226,232,240,.8);font-size:.85rem;text-decoration:none;transition:all .3s}
.btn-outline:hover{background:rgba(255,255,255,.08);border-color:#60a5fa;color:#60a5fa}
#experience{padding:6rem 2rem}
.timeline{max-width:800px;margin:0 auto;position:relative;padding-left:2rem}
.timeline::before{content:'';position:absolute;left:0;top:0;bottom:0;width:2px;background:linear-gradient(to bottom,#7c3aed,#2563eb,transparent)}
.exp-item{position:relative;padding:1.5rem 1.5rem 1.5rem 2rem;margin-bottom:1.5rem;background:rgba(255,255,255,.04);border:1px solid rgba(255,255,255,.06);border-radius:16px;transition:all .3s}
.exp-item:hover{border-color:rgba(124,58,237,.4);background:rgba(124,58,237,.06)}
.exp-item::before{content:'';position:absolute;left:-2.6rem;top:1.8rem;width:12px;height:12px;border-radius:50%;background:linear-gradient(135deg,#7c3aed,#2563eb);box-shadow:0 0 0 4px rgba(124,58,237,.2)}
.exp-role{font-size:1.05rem;font-weight:600;color:#fff;margin-bottom:.3rem}
.exp-company{font-size:.9rem;color:#60a5fa;margin-bottom:.3rem}
.exp-duration{font-size:.8rem;color:rgba(226,232,240,.4);margin-bottom:.7rem}
.exp-desc{color:rgba(226,232,240,.6);font-size:.9rem;line-height:1.7}
#contact{padding:6rem 2rem;background:rgba(124,58,237,.03)}
.contact-form{max-width:650px;margin:0 auto;background:rgba(255,255,255,.04);border:1px solid rgba(255,255,255,.08);border-radius:24px;padding:2.5rem;backdrop-filter:blur(10px)}
.form-row{display:grid;grid-template-columns:1fr 1fr;gap:1rem;margin-bottom:1rem}
.form-input{width:100%;background:rgba(255,255,255,.06);border:1px solid rgba(255,255,255,.1);border-radius:10px;padding:.85rem 1.1rem;color:#e2e8f0;font-size:.95rem;transition:all .3s;margin-bottom:1rem}
.form-input::placeholder{color:rgba(226,232,240,.3)}
.form-input:focus{outline:none;border-color:#7c3aed;background:rgba(124,58,237,.08);box-shadow:0 0 0 3px rgba(124,58,237,.15)}
textarea.form-input{min-height:140px;resize:vertical}
.btn-send{width:100%;padding:1rem;background:linear-gradient(135deg,#7c3aed,#2563eb);border:none;border-radius:12px;color:#fff;font-size:1rem;font-weight:600;cursor:pointer;transition:all .3s;position:relative;overflow:hidden}
.btn-send:hover{transform:translateY(-2px);box-shadow:0 8px 25px rgba(124,58,237,.5)}
.btn-send:active{transform:scale(.98)}
footer{padding:2rem;text-align:center;border-top:1px solid rgba(255,255,255,.06);color:rgba(226,232,240,.3);font-size:.85rem}
.animate-in{opacity:0;transform:translateY(30px);transition:all .7s cubic-bezier(.4,0,.2,1)}
.animate-in.visible{opacity:1;transform:translateY(0)}
.floating{animation:float 6s ease-in-out infinite}
@keyframes float{0%,100%{transform:translateY(0)}50%{transform:translateY(-12px)}}
.tag{display:inline-block;padding:.25rem .75rem;background:rgba(124,58,237,.2);border:1px solid rgba(124,58,237,.3);border-radius:20px;font-size:.75rem;color:#c4b5fd;margin:.2rem}
</style>

<canvas id="canvas-bg"></canvas>

<nav id="navbar">
  <div class="nav-logo">ST</div>
  <div class="nav-links">
    <a href="#hero">Home</a>
    <a href="#about">About</a>
    <a href="#skills">Skills</a>
    <a href="#services">Services</a>
    <a href="#portfolio">Work</a>
    <a href="#experience">Experience</a>
    <a href="#contact">Contact</a>
    {{-- if authenticate or logged in thn show dashboard --}}
    @auth
            <a href="{{ url('admin/dashboard') }}">
                Dashboard
            </a>
        @endauth
  </div>
</nav>

<section id="hero" class="section">
  <div class="hero-content">
    <div class="hero-text">
      <div class="hero-greeting" id="h-greet">Hello, I'm</div>
      <div class="hero-name" id="h-name">{{ $setting?->name ?? 'Sunil Thakur' }}</div>
      <div class="hero-role" id="h-role">{{ $setting->designation ?? 'Full Stack Developer' }}</div>
      <div class="hero-bio" id="h-bio">{{ $setting->about ?? 'Crafting exceptional digital experiences with modern technologies. Passionate about clean code, elegant design, and innovative solutions.' }}</div>
      <div style="display:flex;gap:1rem;flex-wrap:wrap">
        <a href="#" class="btn-primary" id="h-btn">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 15v4a2 2 0 01-2 2H5a2 2 0 01-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" y1="15" x2="12" y2="3"/></svg>
          Download Resume
        </a>
        <a href="#contact" class="btn-outline" style="opacity:0;transform:translateY(20px);transition:all .8s ease 1.1s" id="h-btn2">Let's Talk →</a>
      </div>
    </div>
    <div class="hero-avatar floating" id="h-avatar">
      <div class="avatar-glow"></div>
      <div class="avatar-ring">
        <div class="avatar-img">
          <img src="{{ asset('uploads/' . $setting->profile_image) }}" alt="Profile" onerror="this.parentElement.innerHTML='ST'">
        </div>
      </div>
    </div>
  </div>
</section>

<section id="about" class="section animate-in">
  <div style="max-width:1100px;margin:0 auto;padding:0 2rem">
    <div class="section-heading">
      <h2>About Me</h2>
      <div class="divider"></div>
      <p>A little bit about who I am</p>
    </div>
    <div class="about-card">
      {{ $setting->about ?? 'I\'m a passionate developer who loves turning complex problems into simple, beautiful, and intuitive solutions. With expertise across the full stack, I build digital experiences that make a difference.' }}
    </div>
  </div>
</section>

<section id="skills" class="section animate-in">
  <div style="max-width:1100px;margin:0 auto;padding:0 2rem">
    <div class="section-heading">
      <h2>Skills</h2>
      <div class="divider"></div>
      <p>Technologies I work with</p>
    </div>
    <div class="skills-grid">
      @foreach ($skills as $skill)
      <div class="skill-item">
        <div class="skill-name">
          <span class="skill-label">{{ $skill->name }}</span>
          <span class="skill-pct">{{ $skill->percentage }}%</span>
        </div>
        <div class="skill-bar">
          <div class="skill-fill" data-width="{{ $skill->percentage }}"></div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>

<section id="services" class="section animate-in">
  <div style="max-width:1100px;margin:0 auto;padding:0 2rem">
    <div class="section-heading">
      <h2>Services</h2>
      <div class="divider"></div>
      <p>What I can do for you</p>
    </div>
    <div class="services-grid">
      @foreach ($services as $service)
      <div class="service-card">
        <div class="service-icon">🚀</div>
        <h3>{{ $service->title }}</h3>
        <p>{{ $service->description }}</p>
      </div>
      @endforeach
    </div>
  </div>
</section>

<section id="portfolio" class="section animate-in">
  <div style="max-width:1100px;margin:0 auto;padding:0 2rem">
    <div class="section-heading">
      <h2>Latest Projects</h2>
      <div class="divider"></div>
      <p>A showcase of my recent work</p>
    </div>
    <div class="projects-grid">
      @foreach ($projects as $project)
      <div class="project-card">
        <div class="project-img">
          <img src="{{ asset('uploads/projects/' . $project->image) }}" style="width:100%;height:100%;object-fit:cover;position:absolute;inset:0" onerror="this.style.display='none'">
          <div class="project-img-overlay"></div>
          <span style="position:relative;z-index:1">💻</span>
        </div>
        <div class="project-body">
          <h4>{{ $project->title }}</h4>
          <p>{{ Str::limit($project->description, 100) }}</p>
          <a href="{{ route('project.show', $project->slug) }}" class="btn-outline">View Project →</a>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>

<section id="experience" class="section animate-in">
  <div style="max-width:1100px;margin:0 auto;padding:0 2rem">
    <div class="section-heading">
      <h2>Experience</h2>
      <div class="divider"></div>
      <p>My professional journey</p>
    </div>
    <div class="timeline">
      @foreach ($experiences as $experience)
      <div class="exp-item animate-in">
        <div class="exp-role">{{ $experience->designation }}</div>
        <div class="exp-company">{{ $experience->company }}</div>
        <div class="exp-duration">{{ $experience->duration }}</div>
        <div class="exp-desc">{{ $experience->description }}</div>
      </div>
      @endforeach
    </div>
  </div>
</section>

<section id="contact" class="section animate-in">
  <div style="max-width:1100px;margin:0 auto;padding:0 2rem">
    <div class="section-heading">
      <h2>Get In Touch</h2>
      <div class="divider"></div>
      <p>Have a project? Let's talk</p>
    </div>
    <div class="contact-form">
      <form action="{{ route('contact.store') }}" method="POST">
        @csrf
        <div class="form-row">
          <input type="text" name="name" class="form-input" placeholder="Your name" style="margin-bottom:0">
          <input type="email" name="email" class="form-input" placeholder="Your email" style="margin-bottom:0">
        </div>
        <input type="text" name="subject" class="form-input" placeholder="Subject">
        <textarea name="message" class="form-input" placeholder="Tell me about your project…"></textarea>
        <button type="submit" class="btn-send">Send Message ✦</button>
      </form>
    </div>
  </div>
</section>

<footer>
  <p>Built with ♥ by {{ $setting?->name ?? 'Sunil Thakur' }} · All rights reserved</p>
</footer>

<script>
const canvas = document.getElementById('canvas-bg');
const ctx = canvas.getContext('2d');
let W, H, particles = [], mouse = {x:null, y:null};

function resize(){
  W = canvas.width = window.innerWidth;
  H = canvas.height = window.innerHeight;
}
resize();
window.addEventListener('resize', resize);
window.addEventListener('mousemove', e => { mouse.x = e.clientX; mouse.y = e.clientY; });

const colors = ['rgba(124,58,237,', 'rgba(37,99,235,', 'rgba(5,150,105,', 'rgba(167,139,250,', 'rgba(96,165,250,'];

class Particle {
  constructor(){this.reset()}
  reset(){
    this.x = Math.random()*W;
    this.y = Math.random()*H;
    this.size = Math.random()*2+.5;
    this.speedX = (Math.random()-.5)*.4;
    this.speedY = (Math.random()-.5)*.4;
    this.color = colors[Math.floor(Math.random()*colors.length)];
    this.alpha = Math.random()*.6+.2;
    this.life = Math.random()*200+100;
    this.age = 0;
  }
  update(){
    this.age++;
    if(this.age>this.life){this.reset();return}
    if(mouse.x){
      const dx=this.x-mouse.x, dy=this.y-mouse.y;
      const dist=Math.sqrt(dx*dx+dy*dy);
      if(dist<120){this.x+=dx/dist*.8; this.y+=dy/dist*.8}
    }
    this.x+=this.speedX;
    this.y+=this.speedY;
    if(this.x<0||this.x>W)this.speedX*=-1;
    if(this.y<0||this.y>H)this.speedY*=-1;
  }
  draw(){
    ctx.beginPath();
    ctx.arc(this.x,this.y,this.size,0,Math.PI*2);
    ctx.fillStyle=this.color+this.alpha+')';
    ctx.fill();
  }
}

for(let i=0;i<120;i++) particles.push(new Particle());

function drawConnections(){
  for(let i=0;i<particles.length;i++){
    for(let j=i+1;j<particles.length;j++){
      const dx=particles[i].x-particles[j].x;
      const dy=particles[i].y-particles[j].y;
      const dist=Math.sqrt(dx*dx+dy*dy);
      if(dist<120){
        ctx.beginPath();
        ctx.strokeStyle=`rgba(124,58,237,${.15*(1-dist/120)})`;
        ctx.lineWidth=.5;
        ctx.moveTo(particles[i].x,particles[i].y);
        ctx.lineTo(particles[j].x,particles[j].y);
        ctx.stroke();
      }
    }
  }
}

let hue=240;
function drawNebula(){
  const t=Date.now()*.0005;
  const grd=ctx.createRadialGradient(W*.3+Math.sin(t)*W*.1,H*.4+Math.cos(t*.7)*H*.1,0,W*.5,H*.5,W*.7);
  grd.addColorStop(0,'rgba(124,58,237,.06)');
  grd.addColorStop(.4,'rgba(37,99,235,.03)');
  grd.addColorStop(.7,'rgba(5,150,105,.02)');
  grd.addColorStop(1,'transparent');
  ctx.fillStyle=grd;
  ctx.fillRect(0,0,W,H);
}

function animate(){
  ctx.clearRect(0,0,W,H);
  drawNebula();
  drawConnections();
  particles.forEach(p=>{p.update();p.draw()});
  requestAnimationFrame(animate);
}
animate();

window.addEventListener('scroll', ()=>{
  const nav=document.getElementById('navbar');
  nav.classList.toggle('scrolled', window.scrollY>50);
});

document.querySelectorAll('a[href^="#"]').forEach(a=>{
  a.addEventListener('click',e=>{
    e.preventDefault();
    const el=document.querySelector(a.getAttribute('href'));
    if(el) el.scrollIntoView({behavior:'smooth'});
  });
});

const observer = new IntersectionObserver(entries=>{
  entries.forEach(entry=>{
    if(entry.isIntersecting){
      entry.target.classList.add('visible');
      if(entry.target.id==='skills'){
        setTimeout(()=>{
          document.querySelectorAll('.skill-fill').forEach(bar=>{
            bar.style.width=bar.dataset.width+'%';
          });
        },200);
      }
    }
  });
},{threshold:.15});

document.querySelectorAll('.animate-in').forEach(el=>observer.observe(el));

const els = ['h-greet','h-name','h-role','h-bio','h-btn','h-btn2','h-avatar'];
window.addEventListener('load', ()=>{
  setTimeout(()=>{
    els.forEach(id=>{
      const el=document.getElementById(id);
      if(el){el.style.opacity='1';el.style.transform='translateY(0)'}
    });
  },100);
});
</script>
