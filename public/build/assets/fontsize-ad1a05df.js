let e=parseFloat(localStorage.getItem("fontSize"))||14;document.documentElement.style.fontSize=e+"px";var c=document.querySelector(".increase-font"),l=document.querySelector(".decrease-font");c.addEventListener("click",a);l.addEventListener("click",s);function a(){e<20&&(e+=2,document.documentElement.style.fontSize=e+"px",localStorage.setItem("fontSize",e))}function s(){e>14&&(e-=2,document.documentElement.style.fontSize=e+"px",localStorage.setItem("fontSize",e))}let n=document.querySelectorAll(".arrow");for(var t=0;t<n.length;t++)n[t].addEventListener("click",r=>{r.target.parentElement.parentElement.classList.toggle("showMenu")});let d=document.querySelector(".sidebar"),o=document.querySelector(".bx-menu");console.log(o);o.addEventListener("click",()=>{d.classList.toggle("close")});
